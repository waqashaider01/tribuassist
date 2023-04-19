<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\Configuration;
use App\Models\SlideshowImage;
use Livewire\Component;

class Index extends Component
{
    public $appConfig;

    public $tribute;
    public $media_editable = true;

    protected $listeners = ['refreshImageComponent' => '$refresh'];

    public function mount($tribute)
    {
        $this->appConfig = Configuration::latest()->first();

        $this->tribute = $tribute;

        if ($tribute->status > 1) $this->media_editable = false;
    }

    public function render()
    {
        $thumbnail = SlideshowImage::where([
            'tribute_id' => $this->tribute->id,
            'is_thumbnail' => true,
        ])
            ->select('id', 'tribute_id', 'serial_number', 'is_thumbnail', 'path', 'comment')
            ->first();

        $images = SlideshowImage::where('tribute_id', $this->tribute->id)
            ->whereNot('is_thumbnail', true)
            ->select('id', 'tribute_id', 'serial_number', 'is_thumbnail', 'path', 'comment')
            ->orderBy('serial_number', 'asc')
            ->get();

        return view('livewire.slideshow.image.index', compact('thumbnail', 'images'));
    }
}
