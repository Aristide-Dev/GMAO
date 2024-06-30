<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\BonTravail;
use App\Models\Equipement;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class RequeteByEquipementType extends Component
{
    public $requeteByTypes = [];
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
        // Récupérer le nombre total de demandes d'intervention
        $this->total_bt = BonTravail::count();


        // Récupérer les requêtes groupées par type d'équipement
        $this->requeteByTypes = Equipement::withCount('bon_travails')
            ->get()
            ->groupBy('categorie')
            ->map(function ($group, $categorie) {
                return [
                    'categorie' => $categorie,
                    'count' => $group->sum('bon_travails_count'),
                ];
            })
            ->sortByDesc('count')
            ->take(10)
            ->values()
            ->all();
    }

    public function render()
    {


        $equipement = Equipement::all();
        $total_equipement = count($equipement);

        $columnChartModel = LivewireCharts::columnChartModel()
        ->setTitle('Demandes par Type d\'Équipement')
        ->setAnimated($this->firstRun)
        ->withOnColumnClickEventName('onColumnClick')
        ->setLegendVisibility(false)
        ->legendHorizontallyAlignedCenter()
        ->setDataLabelsEnabled($this->showDataLabels)
        ->setColumnWidth(70)
        ->withGrid();

    foreach ($this->requeteByTypes as $type) {
        $columnChartModel = $columnChartModel->addColumn($type['categorie'], $type['count'], StatusEnum::randomColor());
    }
        return view('livewire.requete-by-equipement-type', [
            'requeteByTypes' => $this->requeteByTypes,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
