<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteRegione;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteZone as SiteZoneModel;

class SiteRegions extends Component
{
    use WithPagination;

    public $search = '';
    public $canActions = false;
    public $zones = [];
    public $name = '';
    public $selectedRegionId = null;
    public $selectedZoneId = null;

    public $action_title = 'Ajouter Région';

    public function mount()
    {
        $this->canActions = in_array(Auth::user()?->role, ['super_admin', 'admin', 'maintenance']);
        $this->zones = SiteZoneModel::all();
    }


    public function render()
    {
        // Initialize query
        $query = SiteRegione::query()
                         ->where('name', 'like', '%' . $this->search . '%');

        // Execute the query and paginate the results
        $regions = $query->orderBy('name', 'asc')
                       ->paginate(50);
        return view('livewire.site-regions', ['regions' => $regions]);
    }

    public function save()
    {
        // Validate the input
        $this->validate([
            'name' => 'required|string|max:255',
            'zone_id' => 'required|exists:site_zones,id',
        ]);

        // Check if we are creating or updating
        if ($this->selectedRegionId) {
            // Update the existing region
            $region = SiteRegione::find($this->selectedRegionId);
            if ($region) {
                $region->name = $this->name;
                $region->save();
            }
            $this->selectedRegionId = null;
            $this->name = null;
        } else {
            // Create a new region
            SiteRegione::create([
                'name' => $this->name,
            ]);
        }

        // Reset the form fields
        $this->reset(['name', 'selectedRegionId']);

        // Close the modal
        $this->dispatch('close-modal');

        // Optionally: add a success message
        session()->flash('message', 'region saved successfully.');
    }

    public function edit($id)
    {
        $this->action_title = 'Modifier region';
        // Fetch the region to be edited
        $region = SiteRegione::find($id);
        if ($region) {
            $this->selectedRegionId = $region->id;
            $this->name = $region->name;
        }
    }

    public function delete($id)
    {
        // Fetch the region to be deleted
        $region = SiteRegione::find($id);
        if ($region) {
            $region->delete();
        }
    }

    public function resetForm($title = null)
    {
        $this->selectedRegionId = null;
        $this->name = null;
        $title ? $this->action_title = $title:'Ajouter region';
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class='row'>
            <div class="card col-12" aria-hidden="true">
                <div class="card-body animate-pulse">
                    <h5 class="card-title placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="placeholder col-7"></span>
                        <span class="placeholder col-4"></span>
                        <span class="placeholder col-4"></span>
                        <span class="placeholder col-6"></span>
                        <span class="placeholder col-8"></span>
                    </p>
                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                </div>
            </div>
        </div>
        HTML;
    }
}
