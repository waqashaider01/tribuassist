<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.show')->layout('layouts.admin');
    }
}
