<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.clients.show')->layout('layouts.admin');
    }
}
