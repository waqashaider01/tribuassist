<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\FuneralHome;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    public $qty = 12;

    public function render()
    {
        $clients = FuneralHome::when($this->keyword, function ($query, $keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })
            ->latest()
            ->paginate($this->qty);

        return view('livewire.admin.clients.index', compact('clients'))->layout('layouts.admin');
    }
}
