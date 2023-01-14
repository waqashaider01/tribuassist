<?php

namespace App\Http\Livewire\Admin\Samples;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.samples.index')->layout('layouts.admin');
    }
}
