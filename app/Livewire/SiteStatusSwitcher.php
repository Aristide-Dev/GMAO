<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;

class SiteStatusSwitcher extends Component
{
    public Site $site;

    public function mount(Site $site)
    {
        // Récupérer le site
        $this->site = $site;
    }

    public function switchStatus()
    {
        // Inverser le statut du site
        $this->site->actif = !$this->site->actif;
        $this->site->save();
    }

    public function render()
    {
        return view('livewire.site-status-switcher', ['site' => $this->site]);
    }
}
