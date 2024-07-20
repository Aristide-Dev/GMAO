<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\Site;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class CoutTotalMaintenanceBySite extends Component
{
    public $requeteBySite = [];
    public $firstRun = true;
    public $showDataLabels = false;
    public $periode = null;
    public $periode_text = null;

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
        // Gestion de la période personnalisée
        if ($this->periode) {
            $dates = explode(' to ', $this->periode);
            if (count($dates) == 2) {
                $startDate = date('Y-m-d', strtotime($dates[0]));
                $endDate = date('Y-m-d', strtotime($dates[1] . ' 23:59:59'));
                $this->periode_text = "Période du " . date('d F Y', strtotime($dates[0])) . " au " . date('d F Y', strtotime($dates[1]));
            } else {
                // Gestion des cas où la période n'est pas au format attendu
                $this->initPeriode();
                $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
                $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-31 23:59:59"));
            }
        } else {
            $this->initPeriode();
            $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
            $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-31 23:59:59"));
        }

        if ($this->registre_filter) {
            $this->requeteBySite = Site::where('registre', $this->registre_filter)
                ->get()
                ->map(function ($site) use ($startDate, $endDate) {
                    return [
                        'name' => $site->name,
                        'forfait_contrat' => $site->showForfaitContratForPeriod($this->year_filter, $this->month_filter),
                        'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                        'total_frais_maintenance' => $site->showForfaitContratForPeriod($this->year_filter, $this->month_filter)+$site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                    ];
                })
                ->toArray();
        } else {
            $this->requeteBySite = Site::all()
                ->map(function ($site) use ($startDate, $endDate) {
                    return [
                        'name' => $site->name,
                        'forfait_contrat' => $site->showForfaitContratForPeriod($this->year_filter, $this->month_filter),
                        'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                        'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                        'total_frais_maintenance' => $site->showForfaitContratForPeriod($this->year_filter, $this->month_filter)+$site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                    ];
                })
                ->toArray();
        }
    }

    public function mount()
    {
        $this->year_filter = date('Y');
        $this->month_filter = date('n');
        $this->registre_filter = '';
        $this->initPeriode();

        $this->loadData();
    }

    /**
     * Initializes the period based on the selected year and month filters.
     *
     * @return void
     */
    private function initPeriode()
    {
        $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
        $endDate = date('Y-m-t', strtotime("$this->year_filter-$this->month_filter")); // -t gives the last day of the month
        $this->periode = $startDate . ' to ' . $endDate;
        $this->periode_text = "Période du " . date('d F Y', strtotime($startDate)) . " au " . date('d F Y', strtotime($endDate));
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
    }

    public function updatedPeriode()
    {
        $this->loadData();
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            // ->setTitle('Coût Total de Maintenance par Site')
            ->setAnimated($this->firstRun)
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(50)
            ->setHorizontal(true) // Set columns to be horizontal
            ->withGrid();

        foreach ($this->requeteBySite as $site) {
            $columnChartModel = $columnChartModel->addColumn($site['name'], $site['total_frais_maintenance'], StatusEnum::randomColor());
        }

        return view('livewire.cout-total-maintenance-by-site', [
            'requeteBySite' => $this->requeteBySite,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
