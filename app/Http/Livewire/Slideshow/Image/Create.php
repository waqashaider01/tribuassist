<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $images = [];

    public function uploadImage()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->images as $image) {
            SlideshowImage::create([
                'path' => $image->store('slideshow/images'),
            ]);
        }

        $this->reset();
        $this->emitUp('refreshImageComponent');
    }

    public function render()
    {
        return view('livewire.slideshow.image.create');
    }
}
