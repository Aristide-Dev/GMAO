<?php

namespace App\Livewire;

use App\Models\Prestataire;
use Livewire\Component;
use Livewire\WithPagination;

class Prestataires extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        sleep(1);
        return view('livewire.prestataires', [
            'prestataires' => Prestataire::where('name', 'like', '%'.$this->search.'%')
                                            ->orwhere('slug', 'like', '%'.$this->search.'%')
                                            ->paginate(9),
        ]);
    }
}
