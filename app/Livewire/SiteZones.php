<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteZone;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class SiteZones extends Component
{
    use WithPagination;

    public $search = '';
    public $canActions = false;
    public $name = '';
    public $selectedZoneId = null;
    public $action_title = 'Ajouter Zone';

    public function mount()
    {
        $this->canActions = in_array(Auth::user()?->role, ['super_admin', 'admin', 'maintenance']);
    }

    public function render()
    {
        // Initialize query
        $query = SiteZone::query()
                         ->where('name', 'like', '%' . $this->search . '%');

        // Execute the query and paginate the results
        $zones = $query->orderBy('name', 'asc')
                       ->paginate(50);

        return view('livewire.site-zones', ['zones' => $zones]);
    }

    public function save()
    {
        // Validate the input
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // Check if we are creating or updating
        if ($this->selectedZoneId) {
            // Update the existing zone
            $zone = SiteZone::find($this->selectedZoneId);
            if ($zone) {
                $zone->name = $this->name;
                $zone->save();
            }
            $this->selectedZoneId = null;
            $this->name = null;
        } else {
            // Create a new zone
            SiteZone::create([
                'name' => $this->name,
            ]);
        }

        // Reset the form fields
        $this->reset(['name', 'selectedZoneId']);

        // Close the modal
        $this->dispatch('close-modal');

        // Optionally: add a success message
        session()->flash('message', 'Zone saved successfully.');
    }

    public function edit($id)
    {
        $this->action_title = 'Modifier Zone';
        // Fetch the zone to be edited
        $zone = SiteZone::find($id);
        if ($zone) {
            $this->selectedZoneId = $zone->id;
            $this->name = $zone->name;
        }
    }

    public function delete($id)
    {
        // Fetch the zone to be deleted
        $zone = SiteZone::find($id);
        if ($zone) {
            $zone->delete();
        }
    }

    public function resetForm($title = null)
    {
        $this->selectedZoneId = null;
        $this->name = null;
        $title ? $this->action_title = $title:'Ajouter Zone';
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
