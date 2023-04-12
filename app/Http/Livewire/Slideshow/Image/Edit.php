<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;

class Edit extends Component
{
    public $image;

    public function mount(SlideshowImage $image)
    {
        if (!session()->has('_tati_') || session('_tati_') != $image->tribute->record_id) {
            return redirect()->route('slideshow.edit');
        } else {
            $this->image = $image;
        }
    }

    public function render()
    {
        return view('livewire.slideshow.image.edit')->extends('layouts.customer');
    }
}
