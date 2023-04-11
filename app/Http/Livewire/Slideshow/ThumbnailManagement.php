<?php

namespace App\Http\Livewire\Slideshow;

use Livewire\Component;

class ThumbnailManagement extends Component
{
    public $tribute;
    public $thumbnail;
    public $media_editable = true;

    protected $listeners = ['refreshImageComponent' => '$refresh'];

    public function mount($tribute)
    {
        $this->tribute = $tribute;
        $this->thumbnail = $tribute->images()->where('is_thumbnail', 1)->first();

        if ($tribute->status > 1) $this->media_editable = false;
    }

    public function render()
    {
        return view('livewire.slideshow.thumbnail-management');
    }
}
