<?php

namespace App\Http\Livewire\Admin\Configurations;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.configurations.index')->layout('layouts.admin');
    }
}
