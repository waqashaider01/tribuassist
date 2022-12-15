<?php

namespace App\Http\Livewire\Slideshow\Image;

use Livewire\Component;

class Item extends Component
{
    public $comment;

    public function mount($image)
    {
        $this->image = $image;
        $this->comment = $image->comment;
    }

    public function updatedComment()
    {
        $this->image->comment = $this->comment;
        $this->image->save();
    }

    public function render()
    {
        return view('livewire.slideshow.image.item');
    }
}
