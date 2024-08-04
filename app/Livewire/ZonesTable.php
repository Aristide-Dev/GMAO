<?php

namespace App\Livewire;

use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class ZonesTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // Define priority mapping
        $priorityMap = [
            'prioritaire' => 3,
            'moyen' => 2,
            'faible' => 1,
        ];

        // Initialize query
        $query = Zone::query();

        // Check if the search term is in the priority mapping
        if (array_key_exists($this->search, $priorityMap)) {
            $query->where('priorite', 'like', '%' . $priorityMap[$this->search] . '%');
        } else {
            // Apply general search conditions
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('priorite', 'like', '%' . $this->search . '%')
                  ->orWhere('delais', 'like', '%' . $this->search . '%');
        }

        // Execute the query and paginate the results
        $zones = $query->orderby('name', 'asc')
                        ->paginate(50);

        return view('livewire.zones-table', ['zones' => $zones]);
    }
}
