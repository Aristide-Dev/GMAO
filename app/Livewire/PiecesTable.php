<?php

namespace App\Livewire;

use App\Models\Piece;
use Livewire\Component;
use Livewire\WithPagination;

class PiecesTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.pieces-table', [
            'pieces' => Piece::where('piece', 'like', '%'.$this->search.'%')
                                            ->orwhere('price', 'like', '%'.$this->search.'%')
                                            ->orwhere('quantite', 'like', '%'.$this->search.'%')
                                            ->orwhere('stock_min', 'like', '%'.$this->search.'%')
                                            ->paginate(20),
        ]);
    }
}
