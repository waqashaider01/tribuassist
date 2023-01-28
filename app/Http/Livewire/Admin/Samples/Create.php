<?php

namespace App\Http\Livewire\Admin\Samples;

use App\Models\SlideshowSample;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // SlideshowSample
    public $type = 1;
    public $title;
    public $file;

    public function save()
    {
        try {
            DB::beginTransaction();

            // Creating SlideshowSample
            $sample = SlideshowSample::create([
                'type' => $this->type,
                'title' => $this->title,
                'path' => $this->file->store('slideshow-samples/' . $this->type),
            ]);

            DB::commit();

            return redirect()->route('samples.show', $sample->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.samples.create')->layout('layouts.admin');
    }
}
