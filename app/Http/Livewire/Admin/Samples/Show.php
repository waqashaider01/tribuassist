<?php

namespace App\Http\Livewire\Admin\Samples;

use App\Models\SlideshowSample;
use Livewire\Component;

class Show extends Component
{
    public $sample;

    public function mount(SlideshowSample $sample)
    {
        // 
    }

    public function render()
    {
        return view('livewire.admin.samples.show')->layout('layouts.admin');
    }
}
