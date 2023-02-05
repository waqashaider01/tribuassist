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
            // 'images.*' => 'image|max:1024', // 1MB Max
            'images.*' => 'image',
        ]);

        $images = SlideshowImage::where('tribute_id', $this->tribute->id)->get();
        $imagesCount = $images->count();

        foreach ($this->images as $image) {
            // Image numeric name
            if ($imagesCount) {
                $newNumber = $imagesCount + 1;
                $availablePrefix = 3 - strlen($newNumber);
                for ($i = 0; $i < $availablePrefix; $i++) {
                    $newNumber = '0' . $newNumber;
                }
                $imageNumericName = $newNumber;
            } else {
                $imageNumericName = '001';
            }

            // Image extension
            $imageExtension = $image->getClientOriginalExtension();

            SlideshowImage::create([
                'tribute_id' => $this->tribute->id,
                'is_thumbnail' => !$imagesCount ? true : false,
                'serial_number' => $imagesCount + 1,
                'path' => $image->storeAs('slideshows/images/' . $this->tribute->id, $imageNumericName  . '.' . $imageExtension),
            ]);

            // Making .txt file
            $filePath = 'slideshows/images/' . $this->tribute->id . '/' . $imageNumericName . '.txt';
            $isThumbnail = !$imagesCount ? 'thumb' : '';
            Storage::put($filePath, $isThumbnail);

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
