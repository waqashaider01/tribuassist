<?php

namespace App\Http\Livewire\Admin\FuneralHomes;

use App\Models\City;
use App\Models\FuneralHome;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            $temporaryPassword = Str::random(8);
            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make($temporaryPassword),
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

            Mail::to($user->email)->send(new AccountCreated($user, $temporaryPassword));

            return redirect()->route('funeral_homes.show', $client->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        $states = State::where('active_state', true)->get();
        return view('livewire.admin.funeral_homes.create', compact('states'))->layout('layouts.admin');
    }
}
