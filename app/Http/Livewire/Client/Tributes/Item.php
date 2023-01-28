<?php

namespace App\Http\Livewire\Client\Tributes;

use Livewire\Component;

class Item extends Component
{
    public $tribute;

    public function mount($tribute)
    {
        $this->tribute = $tribute;
    }

    public function render()
    {
        return view('livewire.client.tributes.item');
    }
}
