<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.clients.index')->layout('layouts.admin');
    }
}
