<?php

namespace App\Http\Livewire\Admin\FuneralHomes;

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
        $funeral_homes = FuneralHome::withCount('tributes')
            ->when($this->keyword, function ($query, $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate($this->qty);

        return view('livewire.admin.funeral_homes.index', compact('funeral_homes'))->layout('layouts.admin');
    }
}
