<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use App\Models\Site;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class CoutTotalMaintenanceBySite extends Component
{
    public $requeteBySite = [];
    public $total_di = 0;
    public $firstRun = true;
    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        // Logique ou action spécifique lors du clic sur un point
    }

    public function handleOnSliceClick($slice)
    {
        // Logique ou action spécifique lors du clic sur une tranche
    }

    public function handleOnColumnClick($column)
    {
        // Logique ou action spécifique lors du clic sur une colonne
    }

    public function handleOnBlockClick($block)
    {
        // Logique ou action spécifique lors du clic sur un bloc
    }

    public function mount()
    {
        // Récupérer le nombre total de bons de travail
        $this->total_di = DemandeIntervention::count();

        // Récupérer les requêtes par site et supprimer les doublons
        $this->requeteBySite = Site::withCount('demande_interventions')
            ->get()
            ->groupBy('name')
            ->map(function ($group, $name) {
                // dd($group->first());
                return [
                    'name' => $name,
                    'count' => $group->first()->demande_interventions_count,
                ];
            })
            ->toArray();
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Bons de Travail par Type d\'Équipement')
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled($this->showDataLabels)
            ->setColumnWidth(20)
            ->withGrid();

        foreach ($this->requeteBySite as $site) {
            $columnChartModel = $columnChartModel->addColumn($site['name'], $site['count'], StatusEnum::randomColor());
        }

        return view('livewire.cout-total-maintenance-by-site', [
            'requeteBySite' => $this->requeteBySite,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
