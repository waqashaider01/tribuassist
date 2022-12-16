<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refreshImageComponent' => '$refresh'];

    public function render()
    {
        $images = SlideshowImage::select('id', 'is_thumbnail', 'path', 'comment')->get();
        return view('livewire.slideshow.image.index', compact('images'));
    }
}
