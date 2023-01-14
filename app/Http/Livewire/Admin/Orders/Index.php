<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.index')->layout('layouts.admin');
    }
}
