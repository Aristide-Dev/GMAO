<?php

namespace App\Livewire\Rapports;

use Livewire\Component;
use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;

class EvolutionRequetes extends Component
{
    public $firstRun = true;
    public $showDataLabels = false;
    public $total_demande = 0;
    public $status_list = [];

    public $year_filter;
    public $month_filter;

    private function between()
    {
        $startDate = Carbon::createFromDate($this->year_filter, $this->month_filter, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth()->endOfDay();
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

    private function loadData()
    {
        // Récupérer le nombre total de demandes d'intervention pour le mois et l'année sélectionnés
        $this->total_demande = DemandeIntervention::whereBetween('created_at', $this->between())->count();

        // Récupérer les requêtes groupées par type d'équipement pour le mois et l'année sélectionnés
        $this->status_list = DemandeIntervention::whereBetween('created_at', $this->between())
            ->get()
            ->groupBy('status')
            ->map(function ($group, $status) {
                return [
                    'name' => $status,
                    'count' => count($group),
                ];
            })
            ->sortByDesc('count')
            ->values()
            ->all();
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

    public function render()
    {
        $demandes = DemandeIntervention::whereBetween('created_at', $this->between())->get();

        $total = count($demandes);

        $columnChartModel = $demandes->groupBy('status')
            ->reduce(function ($columnChartModel, $data) {
                $status = $data->first()->status;
                $value = count($data);

                return $columnChartModel->addColumn($status, $value, StatusEnum::getColor($status));
            }, LivewireCharts::columnChartModel()
                ->setTitle('Demandes par Statut')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->legendHorizontallyAlignedCenter()
                ->withoutDataLabels()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColumnWidth(20)
                ->withGrid()
        );

        $pieChartModel = $demandes->groupBy('status')
            ->reduce(function ($pieChartModel, $data) use ($total) {
                $status = $data->first()->status;
                $value = (count($data) * 100) / $total;

                return $pieChartModel->addSlice($status, $value, StatusEnum::getColor($status));
            }, LivewireCharts::pieChartModel()
                ->setTitle('Taux')
                ->setAnimated($this->firstRun)
                ->setType('pie')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->setLegendVisibility(true)
                ->legendHorizontallyAlignedCenter()
                ->withoutDataLabels()
                ->setDataLabelsEnabled($this->showDataLabels)
        );

        $this->firstRun = false;

        return view('livewire.rapports.evolution-requetes', compact('columnChartModel', 'pieChartModel'));
    }
}
