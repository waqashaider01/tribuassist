<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function funeralHome()
    {
        return $this->belongsTo(FuneralHome::class);
    }
}
