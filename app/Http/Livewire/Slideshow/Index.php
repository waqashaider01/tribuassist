<?php

namespace App\Http\Livewire\Slideshow;

use App\Models\SlideshowPreference;
use App\Models\Tribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    public $can_logout = true;
    public $is_editable = false;
    public $is_submitable = false;

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
                $this->can_logout = false;

                if ($this->funeralHome->user_id == auth()->id()) {
                    $this->is_editable = true;
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/login');
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
        } elseif (session()->has('_tati_')) {
            $tribute_id = session('_tati_');
        }

        if ($tribute_id) {
            $this->tribute = Tribute::where('record_id', $tribute_id)->first();
            $this->funeralHome = $this->tribute?->funeralHome;
        }
    }

    public function authenticate()
    {
        $this->getTributeData();

        if ($this->tribute && Hash::check(strtoupper($this->password), $this->tribute->password)) {
            session()->put('_tati_', $this->tribute_id);

            return redirect(request()->fingerprint['path']);
        } else {
            return back()->with('warning', 'Credentials not matched!');
        }
    }

    public function logout()
    {
        session()->forget('_tati_');
        return back();
    }

    public function checkIfSubmitable()
    {
        $is_submitable = false;

        $preference = SlideshowPreference::where('tribute_id', $this->tribute->id)->first();
        if ($preference) {
            $style_id = $preference->style_id;
            $theme_id = $preference->theme_id;
            $music1_id = $preference->music1_id;
            $music2_id = $preference->music2_id;
            $music3_id = $preference->music3_id;
            $music4_id = $preference->music4_id;
            $music5_id = $preference->music5_id;
            $package_theme_id = $preference->package_theme_id;
        }

        $uploadedMusics = $this->tribute->uploadedMusics;
        if ($uploadedMusics) {
            foreach ($uploadedMusics as $music) {
                $musicId = 'music' . $music->selection_number . '_id';
                $$musicId = $music->selection_number;
            }
        }

        $videoStyle = false;
        $tributeTheme = false;
        $backgroundMusic = false;
        $dvdPackageTheme = false;
        $thumbnail = false;

        if ($style_id) $videoStyle = true;
        if ($theme_id) $tributeTheme = true;
        if ($music1_id && $music2_id && $music3_id && $music4_id && $music5_id) $backgroundMusic = true;
        if ($package_theme_id) $dvdPackageTheme = true;

        if ($this->tribute->images()->where('is_thumbnail', true)->exists()) {
            $thumbnail = true;
        }

        // Dispatch event
        if (
            $videoStyle
            && $tributeTheme
            && $backgroundMusic
            && $dvdPackageTheme
            && $thumbnail
        ) {
            // dd('Yes');
            $this->is_submitable = true;
        } else {
            // dd('No');
            $this->is_submitable = false;
        }
    }

    public function submit()
    {
        if ($this->is_submitable) {
            $this->tribute->status = 1;
            $this->tribute->increment('order_number');
            $this->tribute->save();

            return redirect(request()->fingerprint['path']);
        }
    }

    public function editAgain()
    {
        if ($this->tribute->status = 3) {
            $this->tribute->status = 0;
            $this->tribute->save();

            return redirect(request()->fingerprint['path']);
        }
    }

    public function render()
    {
        return view('livewire.slideshow.index')
            ->extends('layouts.customer');
    }
}
