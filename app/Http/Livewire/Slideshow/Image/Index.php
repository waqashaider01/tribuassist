<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refreshSelf' => '$refresh'];

    public function render()
    {
        $images = SlideshowImage::get();
        return view('livewire.slideshow.image.index', compact('images'));
    }
}
