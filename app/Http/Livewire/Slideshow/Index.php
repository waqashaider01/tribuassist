<?php

namespace App\Http\Livewire\Slideshow;

use App\Models\Tribute;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    public $tribute;
    public $funeralHome;

    public $tribute_id;
    public $password;

    public function mount()
    {
        $this->getTributeData();
    }

    public function getTributeData()
    {
        $tribute_id = null;

        if ($this->tribute_id) {
            $tribute_id = $this->tribute_id;
        } elseif (session('_tati_')) {
            $tribute_id = session('_tati_');
        }

        if ($tribute_id) {
            $this->tribute = Tribute::where('record_id', $tribute_id)->first();
            $this->funeralHome = $this->tribute->funeralHome;
        }
    }

    public function authenticate()
    {
        $this->getTributeData();

        if (Hash::check(strtoupper($this->password), $this->tribute->password)) {
            session()->put('_tati_', $this->tribute_id);
        }

        return back();
    }

    public function submit()
    {
        $this->tribute->is_ready = true;
        $this->tribute->save();
    }

    public function render()
    {
        return view('livewire.slideshow.index')
            ->extends('layouts.customer');
    }
}
