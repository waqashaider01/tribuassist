<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.clients.edit')->layout('layouts.admin');
    }
}
