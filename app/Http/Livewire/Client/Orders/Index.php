<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Tribute;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    public $status = 1;
    public $qty = 12;

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = Tribute::when($this->keyword, function ($query, $keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orwhere('last_name', 'like', '%' . $keyword . '%');
        })
            ->where('status', 1)
            ->latest()
            ->paginate($this->qty);

        return view('livewire.client.orders.index', compact('orders'))->layout('layouts.client');
    }
}
