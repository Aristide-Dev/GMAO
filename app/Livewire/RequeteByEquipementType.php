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

    public $year_filter;
    public $month_filter;

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
    

    private function loadData()
    {
        // Récupérer le nombre total de demandes d'intervention pour le mois et l'année sélectionnés
        $this->total_bt = BonTravail::whereBetween('created_at', $this->between())->count();

        // Récupérer les requêtes groupées par type d'équipement
        $this->requeteByTypes = Equipement::withcount(['bon_travails' => function($query) {
            $query->whereBetween('created_at', $this->between());
        }])
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

    private function between()
    {
        $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
        $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-31 23:59:59"));
        // $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-" . date('t', strtotime($startDate))));
        return [$startDate, $endDate];
    }
    
    public function mount()
    {
        // Initialiser les filtres avec l'année et le mois en cours
        $this->year_filter = date('Y');
        $this->month_filter = date('n');

        // Charger les données initiales
        $this->loadData();
    }

    public function updatedYearFilter()
    {
        $this->loadData();
    }

    public function updatedMonthFilter()
    {
        $this->loadData();
    }

    public function render()
    {


        $equipement = Equipement::whereBetween('created_at', $this->between())->get();
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
