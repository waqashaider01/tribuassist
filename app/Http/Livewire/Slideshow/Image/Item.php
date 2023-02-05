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

    public function mount($image)
    {
        $this->image = $image;
        $this->serial_number = $image->serial_number;
        $this->comment = $image->comment;
    }

    public function setAsThumbnail()
    {
        $thumbnail = !$this->image->is_thumbnail;

        if ($thumbnail) {
            $images = SlideshowImage::where('tribute_id', $this->image->tribute_id)
                ->whereNot('id', $this->image->id)
                ->select('id', 'is_thumbnail', 'path', 'comment')
                ->get();

            foreach ($images as $image) {
                // Read existing data
                $txtFilePath = explode('.', $image->path)[0] . '.txt';
                $contents = Storage::get($txtFilePath);
                $contents = "" . "\n" . $image->comment;
                Storage::put($txtFilePath, $contents);

                // Updating databse record
                $image->is_thumbnail = false;
                $image->save();
            }
        }

        // Read existing data
        $txtFilePath = explode('.', $this->image->path)[0] . '.txt';
        $contents = Storage::get($txtFilePath);
        $contents = "thumb" . "\n" . $this->image->comment;
        Storage::put($txtFilePath, $contents);

        $this->image->is_thumbnail = $thumbnail;
        $this->image->save();

        $this->emit('refreshImageItems');
    }

    public function updatedComment()
    {
        // Read existing data
        $txtFilePath = explode('.', $this->image->path)[0] . '.txt';
        $contents = Storage::get($txtFilePath);

        // First line
        $first_line = strtok($contents, "\n");

        // After first line
        strtok($contents, "\n");
        $after_first_line = strtok("\n");

        if ($first_line == 'thumb') {
            $contents = $first_line . "\n" . $this->comment;
            // $contents = str_replace("Hello World!", "Hello Laravel!", $contents);
        } else {
            $contents = "" . "\n" . $this->comment;
        }

        Storage::put($txtFilePath, $contents);

        $this->image->comment = $this->comment;
        $this->image->save();
    }

    public function updatedSerialNumber()
    {
        $images = SlideshowImage::where('tribute_id', $this->image->tribute_id)->get();
        $imagesCount = $images->count();

        if ($this->serial_number > 0 && $this->serial_number <= $imagesCount) {
            if ($this->serial_number > $this->image->serial_number) {
                $images = SlideshowImage::where('serial_number', '<=', $this->serial_number)
                    ->select('id', 'serial_number')
                    ->get();
                foreach ($images as $image) {
                    $image->serial_number -= 1;
                    $image->save();
                }
            } else {
                $images = SlideshowImage::where('serial_number', '<', $this->image->serial_number)
                    ->select('id', 'serial_number')
                    ->get();
                foreach ($images as $image) {
                    $image->serial_number += 1;
                    $image->save();
                }
            }

            $this->image->serial_number = $this->serial_number;
            $this->image->save();
        }

        $this->emit('refreshImageComponent');
    }

    public function delete()
    {
        // Delete image file
        Storage::delete($this->image->path);

        // Delete .txt file
        Storage::delete(explode('.', $this->image->path)[0] . '.txt');

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
