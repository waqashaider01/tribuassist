<?php

namespace App\Models;

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

        $active_state = false;
        if ($subscription && $subscription->valid_till >= now()->format('Y-m-d')) {
            $active_state = true;
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
