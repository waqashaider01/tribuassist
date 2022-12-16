<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Item extends Component
{
    public $image;
    public $comment;
    public $serial_number;

    protected $listeners = ['refreshImageItems' => '$refresh'];

    public function mount($image, $serial_number)
    {
        $this->image = $image;
        $this->comment = $image->comment;
        $this->serial_number = $serial_number;
    }

    public function setAsThumbnail()
    {
        $thumbnail = !$this->image->is_thumbnail;
        if ($thumbnail) {
            $images = SlideshowImage::where('slideshow_id', $this->image->slideshow_id)
                ->whereNot('id', $this->image->id)
                ->select('id', 'is_thumbnail')
                ->get();

            foreach ($images as $image) {
                $image->is_thumbnail = false;
                $image->save();
            }
        }

        $this->image->is_thumbnail = $thumbnail;
        $this->image->save();

        $this->emit('refreshImageItems');
    }

    public function updatedComment()
    {
        $this->image->comment = $this->comment;
        $this->image->save();
    }

    public function delete()
    {
        Storage::delete($this->image->path);
        $this->image->delete();

        $this->emit('refreshImageComponent');

        return back();
    }

    public function render()
    {
        $image = SlideshowImage::find($this->image->id);
        $is_thumbnail = $image ? $image->is_thumbnail : null;
        return view('livewire.slideshow.image.item', compact('is_thumbnail'));
    }
}
