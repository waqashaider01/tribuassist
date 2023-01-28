<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\City;
use App\Models\FuneralHome;
use App\Models\State;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $cities = [];
    public $client;
    public $funeral_home_name;

    public function mount(FuneralHome $client)
    {
        $this->client = $client;
        $this->cities = $client->state->cities;

        foreach ($client->toArray() as $key => $value) {
            if ($key != 'id') {
                $this->$key = $value;
            }
            if ($key === 'name') {
                $this->funeral_home_name = $value;
            }
        }
    }

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

            // Updating Funeral Home
            $this->client->update([
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

            return redirect()->route('clients.show', $this->client->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        $states = State::where('active_state', true)->get();
        return view('livewire.admin.clients.edit', compact('states'))->layout('layouts.admin');
    }
}
