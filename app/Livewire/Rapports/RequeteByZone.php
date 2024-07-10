<?php

namespace App\Livewire\Rapports;

use App\Enums\StatusEnum;
use App\Models\BonTravail;
use App\Models\MonthlyReport;
use App\Models\Zone;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Livewire\Component;

class RequeteByZone extends Component
{
    public MonthlyReport $monthlyReport;
    public $requeteByZone = [];
    public $total_bt = 0;
    public $firstRun = true;
    public $showDataLabels = false;

    public $year_filter;
    public $month_filter;


    private function loadData()
    {
        // Récupérer le nombre total de demandes d'intervention pour le mois et l'année sélectionnés
        $this->total_bt = BonTravail::whereBetween('created_at', $this->between())->count();

        // Récupérer les requêtes par zone et supprimer les doublons
        $this->requeteByZone = Zone::withcount(['bon_travails' => function($query) {
            $query->whereBetween('created_at', $this->between());
        }])
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

    private function between()
    {
        $startDate = Carbon::createFromDate($this->year_filter, $this->month_filter, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth()->endOfDay();
        return [$startDate, $endDate];
    }

    public function mount(MonthlyReport $monthlyReport)
    {
        // Initialiser les filtres avec l'année et le mois en cours
        $this->monthlyReport = $monthlyReport;
        $this->year_filter = $this->monthlyReport->year;
        $this->month_filter = $this->monthlyReport->month;

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
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Bons de Travail par Zone')
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

        return view('livewire.rapports.requete-by-zone', [
            'requeteByZone' => $this->requeteByZone,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
