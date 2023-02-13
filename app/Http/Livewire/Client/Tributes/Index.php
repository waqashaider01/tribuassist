<?php

namespace App\Http\Livewire\Client\Tributes;

use App\Models\Tribute;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    public $is_ready = 1;
    public $qty = 12;

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $tributes = Tribute::when($this->keyword, function ($query, $keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orwhere('last_name', 'like', '%' . $keyword . '%');
        })
            ->when($this->is_ready != '', function ($query) {
                $query->where('is_ready', $this->is_ready);
            })
            ->latest()
            ->paginate($this->qty);

        return view('livewire.client.tributes.index', compact('tributes'))->layout('layouts.client');
    }
}
