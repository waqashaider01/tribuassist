<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;

class Edit extends Component
{
    public function mount(SlideshowImage $image)
    {
        $this->image = $image;
    }

    public function render()
    {
        return view('livewire.slideshow.image.edit');
    }
}
