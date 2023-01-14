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
    public $doing_business_as;
    public $street;
    public $city;
    public $state;
    public $zip;
    public $phone;
    public $email;
    public $notification_email;
    public $website;
    public $services;

    public function updatedState()
    {
        $this->cities = City::where('state_id', $this->state)
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
                'password' => Hash::make('abcd1234'),
            ]);

            // Creating Funeral Home
            FuneralHome::create([
                'id' => rand(000001, 999999),
                'user_id' => $user->id,
                'doing_business_as' => $this->doing_business_as,
                'street' => $this->street,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
                'phone' => $this->phone,
                'email' => $this->email,
                'notification_email' => $this->notification_email,
                'website' => $this->website,
                'services' => $this->services,
            ]);

            DB::commit();
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
