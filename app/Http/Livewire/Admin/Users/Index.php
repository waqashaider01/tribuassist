<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    public $qty = 12;

    public function updatingKeyword()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::with('funeral_home')
            ->whereNot('role', 1)
            ->when($this->keyword, function ($query, $keyword) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate($this->qty);

        return view('livewire.admin.users.index', compact('users'))->layout('layouts.admin');
    }
}
