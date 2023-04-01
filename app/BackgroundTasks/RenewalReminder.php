<?php

namespace App\BackgroundTasks;

use App\Mail\SubscriptionRenewalReminder;
use App\Models\FuneralHome;
use Illuminate\Support\Facades\Mail;

class RenewalReminder
{
    public function __invoke()
    {
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $clientsExpiring = FuneralHome::select('id', 'user_id')
            ->with('owner:id,email')
            ->whereHas('subscription', function ($query) {
                $query->whereDate('valid_till', '>', date('Y-m-d'))
                    ->whereDate('valid_till', '<', now()->addDays(7)->format('Y-m-d'));
            })
            ->get();

        $clientsEmailAddresses = $clientsExpiring->pluck('owner.email');

        if ($clientsEmailAddresses) {
            Mail::to('')
                ->cc('jayedhasan232@gmail.com')
                ->bcc($clientsEmailAddresses)
                ->send(new SubscriptionRenewalReminder);
        }
    }
}
