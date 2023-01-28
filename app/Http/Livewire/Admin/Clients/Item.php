<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;

class Item extends Component
{
    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.admin.clients.item');
    }
}
