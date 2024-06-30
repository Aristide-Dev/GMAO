<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\BonTravail;
use App\Models\Zone;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class RequeteByZone extends Component
{
    public $requeteByZone = [];
    public $total_bt = 0;
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
        $this->total_bt = BonTravail::count();


        // Récupérer les requêtes par zone et supprimer les doublons
        $this->requeteByZone = Zone::withCount('bon_travails')
            ->get()
            ->unique('name')  // Suppression des doublons basés sur le nom de la zone
            ->groupBy('name')
            ->map(function ($group, $name) {
                // dd($group->first());
                return [
                    'name' => $name,
                    'count' => $group->first()->bon_travails_count,
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

        foreach ($this->requeteByZone as $zone) {
            $columnChartModel = $columnChartModel->addColumn($zone['name'], $zone['count'], StatusEnum::randomColor());
        }

        return view('livewire.requete-by-zone', [
            'requeteByZone' => $this->requeteByZone,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
