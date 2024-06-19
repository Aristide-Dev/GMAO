<?php

namespace App\Livewire;

use App\Models\Piece;
use Livewire\Component;
use Livewire\WithPagination;

class EditZone extends Component
{
    use WithPagination;

    public $zone;

    public function mount($zone)
    {
        $this->zone = $zone;
    }


    public function render()
    {
        return view('livewire.edit-zone');
    }
}
