<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.users.index')->layout('layouts.admin');
    }
}
