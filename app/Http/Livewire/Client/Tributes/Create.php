<?php

namespace App\Http\Livewire\Client\Tributes;

use App\Models\City;
use App\Models\FuneralHome;
use App\Models\State;
use App\Models\Tribute;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $first_name;
    public $last_name;
    public $dob;
    public $dod;
    public $contact_name;
    public $contact_email;

    public function save()
    {
        try {
            $funeral_home = auth()->user()->funeral_home;
            $tributes = $funeral_home->tributes->count();

            if ($tributes) {
                $newNumber = $tributes + 1;
                $availablePrefix = 4 - strlen($newNumber);
                for ($i = 0; $i < $availablePrefix; $i++) {
                    $newNumber = '0' . $newNumber;
                }
                $record_id = $funeral_home->id . '-' . $newNumber;
            } else {
                $record_id = $funeral_home->id . '-0001';
            }

            $password = substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1) . explode('-', $record_id)[1];

            DB::beginTransaction();

            $tribute = Tribute::create([
                'funeral_home_id' => $funeral_home->id,
                'record_id' => $record_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'dod' => $this->dod,
                'contact_name' => $this->contact_name,
                'contact_email' => $this->contact_email,
                'password' => Hash::make($password),
            ]);

            DB::commit();

            return redirect()->route('tributes.show', $tribute->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.client.tributes.create')->layout('layouts.client');
    }
}
