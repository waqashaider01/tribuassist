<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $image;

    public function uploadImage()
    {
        SlideshowImage::create([
            'path' => $this->image->store('slideshow/images'),
        ]);

        $this->emitUp('refreshSelf');
    }

    public function render()
    {
        return view('livewire.slideshow.image.create');
    }
}
