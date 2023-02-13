<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $tribute;

    public $images = [];

    public function mount($tribute)
    {
        $this->tribute = $tribute;
    }

    public function uploadImage()
    {
        $this->validate([
            'images.*' => 'image',
        ]);

        $imagesCount = SlideshowImage::where('tribute_id', $this->tribute->id)->count();

        foreach ($this->images as $image) {
            // Image numeric name
            if ($imagesCount) {
                $newNumber = $imagesCount;
                $availablePrefix = 3 - strlen($newNumber);
                for ($i = 0; $i < $availablePrefix; $i++) {
                    $newNumber = '0' . $newNumber;
                }
                $imageNumericName = $newNumber;
            } else {
                $imageNumericName = '002';
            }

            // Image extension
            $imageExtension = $image->getClientOriginalExtension();

            SlideshowImage::create([
                'tribute_id' => $this->tribute->id,
                'is_thumbnail' => false,
                'serial_number' => $imagesCount + 1,
                'path' => $image->storeAs('slideshows/images/' . $this->tribute->id, $imageNumericName  . '.' . $imageExtension),
            ]);

            $imagesCount += 1;
        }

        $this->images = [];
        $this->emitUp('refreshImageComponent');
    }

    public function render()
    {
        return view('livewire.slideshow.image.create');
    }
}
