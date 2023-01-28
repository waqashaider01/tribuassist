<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;

        foreach ($user->toArray() as $key => $value) {
            if ($key != 'id') {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        try {
            DB::beginTransaction();

            // Updating User
            $this->user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            DB::commit();

            return redirect()->route('users.show', $this->user->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.users.edit')->layout('layouts.admin');
    }
}
