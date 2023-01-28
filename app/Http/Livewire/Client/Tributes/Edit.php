<?php

namespace App\Http\Livewire\Client\Tributes;

use App\Models\Tribute;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $tribute;
    public $password;

    public function mount(Tribute $tribute)
    {
        $this->tribute = $tribute;

        foreach ($tribute->toArray() as $key => $value) {
            if ($key != 'id' && $key != 'password') {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        try {

            DB::beginTransaction();

            $this->tribute->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'dod' => $this->dod,
                'contact_name' => $this->contact_name,
                'contact_email' => $this->contact_email,
                'password' => Hash::make($this->password),
            ]);

            DB::commit();

            return redirect()->route('tributes.show', $this->tribute->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.client.tributes.edit')->layout('layouts.client');
    }
}
