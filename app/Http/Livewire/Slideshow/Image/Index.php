<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Livewire\Component;

class Index extends Component
{
    public $tribute;

    protected $listeners = ['refreshImageComponent' => '$refresh'];

    public function mount($tribute)
    {
        $this->tribute = $tribute;
    }

    public function render()
    {
        $images = SlideshowImage::where('tribute_id', $this->tribute->id)
            ->select('id', 'serial_number', 'is_thumbnail', 'path', 'comment')
            ->orderBy('serial_number', 'asc')
            ->get();

        return view('livewire.slideshow.image.index', compact('images'));
    }
}
