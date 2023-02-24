<?php

namespace App\Http\Livewire\Admin\FuneralHomes;

use App\Models\FuneralHome;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $funeral_home;

    public function mount(FuneralHome $funeral_home)
    {
        $this->funeral_home = $funeral_home;
    }

    public function extendSubscription($duration)
    {
        try {
            DB::beginTransaction();

            $currentActiveSubscription = Subscription::where("funeral_home_id", $this->funeral_home->id)
                ->whereDate("valid_till",  ">=", now()->format('Y-m-d'))
                ->first();

            if ($currentActiveSubscription) $currentActiveSubscription->delete();

            Subscription::create([
                "funeral_home_id" => $this->funeral_home->id,
                "for_months" => $duration,
                "valid_till" => now()->addMonths($duration - 1)->endOfMonth(),
            ]);

            DB::commit();

            return redirect()->route('funeral_homes.show', $this->funeral_home->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.funeral_homes.show')->layout('layouts.admin');
    }
}
