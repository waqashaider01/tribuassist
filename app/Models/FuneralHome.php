<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuneralHome extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function current_subscription()
    {
        return $this->hasOne(Subscription::class)->latestOfMany();
    }

    public function subscription_status()
    {
        $subscription = $this->current_subscription;

        if ($subscription && $subscription->valid_till >= now()->format('Y-m-d')) {
            $active_state = true;
        } elseif ($subscription && $subscription->valid_till->diffInDays(now()->format('Y-m-d')) <= 7) {
            $active_state = true;
        } else {
            $active_state = false;
        }

        return $active_state;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tributes()
    {
        return $this->hasMany(Tribute::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
