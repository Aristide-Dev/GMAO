<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class SiteTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.site-table', [
            'sites' => Site::where('name', 'like', '%'.$this->search.'%')
                                            ->orwhere('registre', 'like', '%'.$this->search.'%')
                                            ->paginate(20),
        ]);
    }
}
