<?php

namespace App\Http\Livewire\Admin\FuneralHomes;

use Livewire\Component;

class Item extends Component
{
    public $funeral_home;

    public function mount($funeral_home)
    {
        $this->funeral_home = $funeral_home;
    }

    public function render()
    {
        return view('livewire.admin.funeral_homes.item');
    }
}
