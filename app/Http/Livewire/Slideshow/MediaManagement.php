<?php

namespace App\Http\Livewire\Slideshow;

use Livewire\Component;

class MediaManagement extends Component
{
    public $tribute;

    public function mount($tribute)
    {
        $this->tribute = $tribute;
    }

    public function render()
    {
        return view('livewire.slideshow.media-management');
    }
}
