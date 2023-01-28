<?php

namespace App\Http\Livewire\Admin\Samples;

use Livewire\Component;

class Item extends Component
{
    public $sample;

    public function mount($sample)
    {
        $this->sample = $sample;
    }

    public function render()
    {
        return view('livewire.admin.samples.item');
    }
}
