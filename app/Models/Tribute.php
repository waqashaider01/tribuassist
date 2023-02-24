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

    public function images()
    {
        return $this->hasMany(SlideshowImage::class);
    }

    public function uploadedMusics()
    {
        return $this->hasMany(SlideshowMusic::class);
    }

    public function libraryMusics()
    {
        $preference = SlideshowPreference::where('tribute_id', $this->id)->first();

        $relationIds = [];

        if ($preference->music1_id) $relationIds[1] = $preference->music1_id;
        if ($preference->music2_id) $relationIds[2] = $preference->music2_id;
        if ($preference->music3_id) $relationIds[3] = $preference->music3_id;
        if ($preference->music4_id) $relationIds[4] = $preference->music4_id;
        if ($preference->music5_id) $relationIds[5] = $preference->music5_id;

        return $relationIds;
    }

    public function customMusics($selectionNumber)
    {
        return SlideshowMusic::where('tribute_id', $this->id)
            ->where('selection_number', $selectionNumber)
            ->first();
    }
}
