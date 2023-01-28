<?php

namespace App\Http\Livewire\Client\Tributes;

use App\Models\Tribute;
use Livewire\Component;

class Show extends Component
{
    public $tribute;

    public function mount(Tribute $tribute)
    {
        $this->tribute = $tribute;
    }

    public function render()
    {
        return view('livewire.client.tributes.show')->layout('layouts.client');
    }
}
