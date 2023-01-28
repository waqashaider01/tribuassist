<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class Item extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.users.item');
    }
}
