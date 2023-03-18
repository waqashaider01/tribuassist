<?php

namespace App\Http\Livewire\Admin\FuneralHomes;

use App\Models\City;
use App\Models\FuneralHome;
use App\Models\State;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $cities = [];
    public $funeral_home;
    public $funeral_home_name;

    public function mount(FuneralHome $funeral_home)
    {
        $this->funeral_home = $funeral_home;
        $this->cities = $funeral_home->state->cities;

        foreach ($funeral_home->toArray() as $key => $value) {
            if ($key != 'id') {
                $this->$key = $value;
            }
            if ($key == 'name') {
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
            $this->funeral_home->update([
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

            return redirect()->route('funeral_homes.show', $this->funeral_home->id);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function render()
    {
        $states = State::where('active_state', true)->get();
        return view('livewire.admin.funeral_homes.edit', compact('states'))->layout('layouts.admin');
    }
}
