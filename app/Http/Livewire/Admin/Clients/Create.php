<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\City;
use App\Models\FuneralHome;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $cities = [];

    // User (owner)
    public $first_name;
    public $last_name;

    // Funeral Home
    public $funeral_home_name;
    public $street;
    public $city_id;
    public $state_id;
    public $zip;
    public $phone;
    public $email;
    public $notification_email;
    public $website;
    public $services;

    public function updatedStateId()
    {
        $this->cities = City::where('state_id', $this->state_id)
            ->where('active_state', true)
            ->get();
    }

    public function save()
    {
        try {
            DB::beginTransaction();

            // Creating User
            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make('abcd1234'),
            ]);

            // Creating Funeral Home
            $client = FuneralHome::create([
                'user_id' => $user->id,
                'name' => $this->funeral_home_name,
                'street' => $this->street,
                'city_id' => $this->city_id,
                'state_id' => $this->state_id,
                'zip' => $this->zip,
                'phone' => $this->phone,
                'email' => $this->email,
                'notification_email' => $this->notification_email,
                'website' => $this->website,
                'services' => $this->services,
            ]);

            DB::commit();

            return redirect()->route('clients.show', $client->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        $states = State::where('active_state', true)->get();
        return view('livewire.admin.clients.create', compact('states'))->layout('layouts.admin');
    }
}
