<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Thumbnail extends Component
{
    use WithFileUploads;

    public $tribute;
    public $thumbnail;

    public function mount($tribute)
    {
        $this->tribute = $tribute;
    }

    public function uploadThumbnail()
    {
        $this->validate([
            'thumbnail' => 'image',
        ]);

        // Deleting old image
        $oldImage = SlideshowImage::where([
            'tribute_id' => $this->tribute->id,
            'is_thumbnail' => true
        ])->first();

        if ($oldImage) Storage::delete($oldImage->path);

        // Image extension
        $image = $this->thumbnail;
        $imageExtension = $image->getClientOriginalExtension();

        $thumbnail = SlideshowImage::where([
            'tribute_id' => $this->tribute->id,
            'is_thumbnail' => true
        ])->first();

        if ($thumbnail) {
            $thumbnail->update([
                'path' => $image->storeAs('slideshows/images/' . $this->tribute->id, 'thumbnail.' .  $imageExtension)
            ]);
        } else {
            SlideshowImage::create([
                'tribute_id' => $this->tribute->id,
                'is_thumbnail' => true,
                'serial_number' => 1,
                'path' => $image->storeAs('slideshows/images/' . $this->tribute->id, 'thumbnail.' .  $imageExtension)
            ]);
        }

        $this->emitUp('refreshImageComponent');
    }

    public function render()
    {
        return view('livewire.slideshow.image.thumbnail');
    }
}
