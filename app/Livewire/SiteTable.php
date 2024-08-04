<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class SiteTable extends Component
{
    use WithPagination;

    public $action = 'demandeur';
    public $search = '';

    public function mount($action = 'demandeur')
    {
        $this->action = $action;
    }

    public function render()
    {
        $url = $this->determineUrl($this->action);
        return view('livewire.site-table', [
            'url' => $url,
            'sites' => Site::where('name', 'like', '%'.$this->search.'%')
                                            ->orwhere('registre', 'like', '%'.$this->search.'%')
                                            ->orderby('name', 'asc')
                                            ->paginate(30),
        ]);
    }

    private function determineUrl($action)
    {
        switch ($action) {
            case 'admin':
                return 'admin';
            case 'demandeur':
                return 'demandeur';
            default:
                return 'demandeur';
        }
    }
}
