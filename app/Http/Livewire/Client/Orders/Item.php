<?php

namespace App\Http\Livewire\Client\Orders;

use Livewire\Component;

class Item extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.client.orders.item');
    }
}
