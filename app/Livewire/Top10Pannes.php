<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use App\Models\Site;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use Carbon\Carbon;

class Top10Pannes extends Component
{
    public $topSites = [];
    public $total_demande = 0;
    public $firstRun = true;
    public $showDataLabels = false;

    public $year_filter;
    public $month_filter;

    protected $listeners = [
        'onColumnClick' => 'handleOnColumnClick',
    ];

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

    private function between()
    {
        $startDate = Carbon::createFromDate($this->year_filter, $this->month_filter, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth()->endOfDay();
        return [$startDate, $endDate];
    }

    private function loadData()
    {
        // Récupérer le nombre total de demandes d'intervention pour le mois et l'année sélectionnés
        $this->total_demande = DemandeIntervention::whereBetween('created_at', $this->between())->count();

        // Récupérer les sites avec le plus de demandes d'intervention
        $this->topSites = Site::withCount(['demande_interventions' => function($query) {
            $query->whereBetween('created_at', $this->between());
        }])
        ->orderBy('demande_interventions_count', 'desc')
        ->take(10)
        ->get();
    }

    public function handleOnColumnClick($column)
    {
        // Logique ou action spécifique lors du clic sur une colonne
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('TOP 10 PANNES')
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled($this->showDataLabels)
            ->setColumnWidth(10)
            ->setHorizontal(true)
            ->withGrid();

        $pieChartModel = LivewireCharts::pieChartModel()
            ->setTitle('TOP 10 PANNES')
            ->setAnimated($this->firstRun)
            ->setType('pie')
            ->withOnSliceClickEvent('onSliceClick')
            ->legendPositionBottom()
            ->setLegendVisibility(true)
            ->legendHorizontallyAlignedCenter()
            ->withoutDataLabels()
            ->setDataLabelsEnabled($this->showDataLabels);

        foreach ($this->topSites as $site) {
            $columnChartModel = $columnChartModel->addColumn($site->name, $site->demande_interventions_count, StatusEnum::randomColor());
        }

        foreach ($this->topSites as $site) {
            $pieChartModel = $pieChartModel->addSlice($site->name, $site->demande_interventions_count, StatusEnum::randomColor());
        }

        return view('livewire.top10-pannes', [
            'topSites' => $this->topSites,
            'total_demande' => $this->total_demande,
            'pieChartModel' => $pieChartModel,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
