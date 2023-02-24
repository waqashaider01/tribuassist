<?php

namespace App\Http\Livewire\Admin\Configurations;

use App\Models\Configuration;
use Livewire\Component;

class Tribute extends Component
{
    public $configuration;
    public $tribute_media_limit = 1;

    public function mount()
    {
        $this->configuration = Configuration::latest()->first();
        $this->tribute_media_limit = $this->configuration->tribute_media_limit;
    }

    public function save()
    {
        $this->configuration->tribute_media_limit = $this->tribute_media_limit;
        $this->configuration->save();

        $this->emitSelf('saved');
    }

    public function render()
    {
        return view('livewire.admin.configurations.tribute');
    }
}
