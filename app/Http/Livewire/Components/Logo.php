<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Logo extends Component
{
    public $fillColor;

    public function mount($fillColor = "ffffff")
    {
        $this->fillColor = $fillColor;
    }
    public function render()
    {
        return view('livewire.components.logo');
    }
}
