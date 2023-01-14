<?php

namespace App\Http\Livewire\Layout;

use Livewire\Component;

class Header extends Component
{
    public $profileCompleted = 0;
    // public $progressbarBgColor;

    public function mount()
    {
        $user = auth()->user();
        $this->user = auth()->user();

        // Name (Shorcode)
        $name = explode(" ", $user->name);
        $this->name_shortcode = substr($name[0], 0, 1) . substr($name[count($name) - 1], 0, 1);

        // Avatar
        $this->avatar = $user->profile_photo_path ? (($user->google_id || $user->facebook_id) ? $user->profile_photo_path : asset('storage/' . $user->profile_photo_path)) : null;

        // Profile Completion Rate
        $this->calculateProfileCompletionRate();
    }

    public function calculateProfileCompletionRate()
    {
        $user = auth()->user();
        $fields = [
            'profile_photo_path',
            'about',
            'address',
            'city',
            'google_map_url',
            'phone_number',
            'whatsapp_number',
            'facebook',
            'twitter',
            'instagram',
            'youtube',
        ];
        $valuePerField = 100 / count($fields);

        foreach ($fields as $field) {
            if ($user->$field) $this->profileCompleted += $valuePerField;
        }

        // Progressbar color
        // if ($this->profileCompleted < 33.33) {
        //     $this->progressbarBgColor = 'red';
        // } elseif ($this->profileCompleted < 66.66) {
        //     $this->progressbarBgColor = 'green';
        // } elseif ($this->profileCompleted > 66.66) {
        //     $this->progressbarBgColor = 'blue';
        // }
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
