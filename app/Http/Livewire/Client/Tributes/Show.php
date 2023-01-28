<?php

namespace App\Http\Livewire\Client\Tributes;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.client.tributes.show')->layout('layouts.client');
    }
}
