<?php

namespace App\Http\Livewire\Admin\Samples;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.samples.show')->layout('layouts.admin');
    }
}
