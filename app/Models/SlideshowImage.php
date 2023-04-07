<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideshowImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tribute()
    {
        return $this->belongsTo(Tribute::class);
    }
}
