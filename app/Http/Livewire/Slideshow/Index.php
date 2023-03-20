<?php

namespace App\Http\Livewire\Slideshow;

use App\Models\Tribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    public $is_editable = false;

    public $tribute;
    public $funeralHome;

    public $tribute_id;
    public $password;

    public function mount(Request $request)
    {
        if ($request->tribute_id) {
            if (auth()->check() && auth()->user()->role == 2) {
                $this->tribute = Tribute::findOrFail($request->tribute_id);
                $this->funeralHome = $this->tribute->funeralHome;

                if ($this->funeralHome->user_id == auth()->id()) {
                    $this->is_editable = true;
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
        } else {
            $this->getTributeData();
        }
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
        $this->tribute->status = 1;
        $this->tribute->save();
    }

    public function render()
    {
        return view('livewire.slideshow.index')
            ->extends('layouts.customer');
    }
}
