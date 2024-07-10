<?php

namespace App\Livewire\Rapports;

use App\Enums\StatusEnum;
use App\Models\Site;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class CoutTotalMaintenance extends Component
{
    public $requeteBySite = [];
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
        $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
        $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-31 23:59:59"));

        if($this->registre_filter)
        {
            $this->requeteBySite = Site::where('registre', $this->registre_filter)
                ->get()
                ->map(function ($site) use ($startDate, $endDate) {
                    return [
                        'name' => $site->name,
                        'forfait_contrat' => $site->showForfaitContratForPeriod($this->year_filter, $this->month_filter),
                        'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
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
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Coût Total de Maintenance par Site')
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled($this->showDataLabels)
            ->setColumnWidth(20)
            ->withGrid();

        foreach ($this->requeteBySite as $site) {
            $columnChartModel = $columnChartModel->addColumn($site['name'], $site['cout_maintenance'], StatusEnum::randomColor());
        }

        return view('livewire.rapports.cout-total-maintenance', [
            'requeteBySite' => $this->requeteBySite,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
