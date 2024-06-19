<?php

namespace App\Livewire;

use App\Models\Piece;
use Livewire\Component;
use Livewire\WithPagination;

class EditPiece extends Component
{
    use WithPagination;

    public $piece;

    public function mount($piece)
    {
        $this->piece = $piece;
    }


    public function render()
    {
        return view('livewire.edit-piece');
    }
}
