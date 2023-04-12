<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Thumbnail extends Component
{
    use WithFileUploads;

    public $tribute;
    public $editable;
    public $thumbnail;

    public function mount($tribute, $editable = true)
    {
        $this->tribute = $tribute;
        $this->editable = $editable;
    }

    public function uploadThumbnail()
    {
        $this->validate([
            // 'thumbnail' => 'required|image|mimes:png,jpg,jpeg|dimensions:ratio=9/16',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if (!$this->isPortrait()) return back()->with('warning', 'Portrait thumbnail required.');

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
                'path' => $image->storeAs('slideshows/images/' . $this->tribute->id, 'thumbnail.' .  $imageExtension)
            ]);
        }

        return redirect(request()->fingerprint['path']);
    }

    public function isPortrait()
    {
        // Use Intervention Image to open the file and get its width and height
        $img = Image::make($this->thumbnail);
        $width = $img->width();
        $height = $img->height();

        $aspectRatio = $width / $height;

        if ($aspectRatio < 1) {
            return true;
        }
    }

    public function render()
    {
        return view('livewire.slideshow.image.thumbnail');
    }
}
