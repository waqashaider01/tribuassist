<?php

namespace App\Http\Livewire\Admin\Samples;

use App\Models\SlideshowSample;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    public $type;
    public $qty = 12;

    public function render()
    {
        $samples = SlideshowSample::when($this->keyword, function ($query, $keyword) {
            $query->where('title', 'like', '%' . $keyword . '%');
        })
            ->when($this->type,  function ($query, $type) {
                $query->where('type', $type);
            })
            ->orderBy('title')
            ->paginate($this->qty);

        return view('livewire.admin.samples.index', compact('samples'))->layout('layouts.admin');
    }
}
