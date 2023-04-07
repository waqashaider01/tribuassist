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
    public $editable;

    public $images = [];

    public function mount($tribute, $editable = true)
    {
        $this->tribute = $tribute;
        $this->editable = $editable;
    }

    public function uploadImage()
    {
        $this->validate([
            'images.*' => 'image',
        ]);

        $imagesCount = SlideshowImage::where('tribute_id', $this->tribute->id)
            ->where('is_thumbnail', false)
            ->count();

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
                $imageNumericName = '001';
            }

            SlideshowImage::create([
                'tribute_id' => $this->tribute->id,
                'is_thumbnail' => false,
                'serial_number' => $imagesCount + 1,
                'path' => $image->store('slideshows/images/' . $this->tribute->id),
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
