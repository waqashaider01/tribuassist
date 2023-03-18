<?php

namespace App\Http\Livewire\Slideshow\Image;

use App\Models\SlideshowImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Item extends Component
{
    public $image;
    public $serializable;
    public $serial_number;
    public $comment;

    protected $listeners = ['refreshImageItems' => '$refresh'];

    public function mount($image, $serializable = true)
    {
        $this->image = $image;
        $this->serializable = $serializable;
        $this->serial_number = $image->serial_number;
        $this->comment = $image->comment;
    }

    public function updatedSerialNumber()
    {
        $imagesCount = SlideshowImage::where('tribute_id', $this->image->tribute_id)->count();

        if ($this->serial_number <= $imagesCount) {

            if ($this->serial_number > $this->image->serial_number) {
                $images = SlideshowImage::where([
                    'tribute_id' => $this->image->tribute_id,
                    'is_thumbnail' => false,
                ])
                    ->whereNot('id', $this->image->id)
                    ->where('serial_number', '<=', $this->serial_number)
                    ->select('id', 'tribute_id', 'serial_number', 'path')
                    ->get();

                foreach ($images as $image) {
                    $serial_number = $image->serial_number - 1;
                    $image->serial_number = $serial_number;
                    $image->save();
                }
            } else {
                $images = SlideshowImage::where([
                    'tribute_id' => $this->image->tribute_id,
                    'is_thumbnail' => false,
                ])
                    ->where('serial_number', '<', $this->image->serial_number)
                    ->select('id', 'tribute_id', 'serial_number', 'path')
                    ->get();

                foreach ($images as $image) {
                    $serial_number = $image->serial_number + 1;
                    $image->serial_number = $serial_number;
                    $image->save();
                }
            }

            $this->image->serial_number = $this->serial_number;
            $this->image->save();
        }

        // return redirect()->route('slideshow.edit');

        $this->emit('refreshImageComponent');
    }

    public function updatedComment()
    {
        $this->image->comment = $this->comment;
        $this->image->save();
    }

    public function delete()
    {
        // Delete image file
        Storage::delete($this->image->path);

        $images = SlideshowImage::where([
            'tribute_id' => $this->image->tribute_id,
            'is_thumbnail' => false,
        ])
            ->whereNot('id', $this->image->id)
            ->where('serial_number', '>', $this->image->serial_number)
            ->select('id', 'tribute_id', 'serial_number', 'path')
            ->get();

        foreach ($images as $image) {
            $serial_number = $image->serial_number - 1;
            $image->serial_number = $serial_number;
            $image->save();
        }

        // Delete database record
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
