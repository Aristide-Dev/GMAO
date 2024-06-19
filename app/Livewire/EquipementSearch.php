<?php
namespace App\Livewire;

use App\Models\Equipement;
use Livewire\Component;
use Livewire\WithPagination;

class EquipementSearch extends Component
{
    use WithPagination;

    public $site;
    public $search = '';

    public function mount($site)
    {
        $this->site = $site;
    }

    public function resetSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $equipements = collect();

        if ($this->search) {
            $equipements = Equipement::where('site_id', $this->site->id)
                ->where(function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('categorie', 'like', '%'.$this->search.'%')
                        ->orWhere('numero_serie', 'like', '%'.$this->search.'%')
                        ->orWhere('forfait_contrat', 'like', '%'.$this->search.'%');
                })
                ->paginate(8);
        } else {
            // Create an empty paginator instance when search is empty
            $equipements = Equipement::where('id', -1)->paginate(8);
        }

        return view('livewire.equipement-search', [
            'equipements' => $equipements,
        ]);
    }
}
