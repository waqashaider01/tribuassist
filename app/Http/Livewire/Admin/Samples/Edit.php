<?php

namespace App\Http\Livewire\Admin\Samples;

use App\Models\SlideshowSample;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $sample;

    public function mount(SlideshowSample $sample)
    {
        $this->sample = $sample;

        foreach ($sample->toArray() as $key => $value) {
            if ($key != 'id' && $key != 'file') {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        try {
            DB::beginTransaction();

            // Updating SlideshowSample
            $this->sample->update([
                'type' => $this->type,
                'title' => $this->title,
            ]);

            if ($this->file) {
                Storage::delete($this->sample->path);

                $this->sample->update([
                    'path' => $this->file->store('slideshow-samples/' . $this->sample->type),
                ]);
            }

            DB::commit();

            return redirect()->route('samples.show', $this->sample->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.samples.edit')->layout('layouts.admin');
    }
}
