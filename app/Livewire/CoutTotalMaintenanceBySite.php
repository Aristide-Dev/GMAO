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

    public $year_filter;
    public $month_filter;
    public $registre_filter;

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
        $this->total_di = DemandeIntervention::whereBetween('created_at', $this->between())->count();

        if($this->registre_filter)
        {
            // Récupérer les requêtes par site et supprimer les doublons
            $this->requeteBySite = Site::whereBetween('created_at', $this->between())
                ->where('registre',$this->registre_filter)
                ->withCount('demande_interventions')
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
        }else{
            // Récupérer les requêtes par site et supprimer les doublons
            $this->requeteBySite = Site::whereBetween('created_at', $this->between())
                ->withCount('demande_interventions')
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
    }

    private function loadDataWithRegistreFilter()
    {

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
        $this->registre_filter = '';

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

    public function updatedRegistreFilter()
    {
        $this->loadData();
        // $this->loadDataWithRegistreFilter();
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
