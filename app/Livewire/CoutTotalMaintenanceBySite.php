<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\Site;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
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

    public $sortField = 'total_frais_maintenance'; // Default sort field
    public $sortDirection = 'desc'; // Default sort direction

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

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;

        $this->loadData();
    }

    private function loadData()
    {
        $this->requeteBySite = [];

        if ($this->periode) {
            $dates = explode(' to ', $this->periode);
            if (count($dates) == 2) {
                $startDate = Carbon::createFromFormat('Y-m-d', trim($dates[0]));
                $endDate = Carbon::createFromFormat('Y-m-d', trim($dates[1]))->endOfDay();

                $this->periode_text = "Période du " . $startDate->translatedFormat('d F Y') . " au " . $endDate->translatedFormat('d F Y');
            } else {
                $this->initPeriode();
                $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
                $endDate = $startDate->copy()->endOfMonth();
            }
        } else {
            $this->initPeriode();
            $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
            $endDate = $startDate->copy()->endOfMonth();
        }

        if($this->registre_filter)
        {
            $this->requeteBySite = Site::where('registre', $this->registre_filter)
            ->get()
            ->map(function ($site) use ($startDate, $endDate) {
                return [
                    'name' => $site->name,
                    'forfait_contrat' => $site->showForfaitContratForPeriod($startDate, $endDate),
                    'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                    'total_frais_maintenance' => $site->showForfaitContratForPeriod($startDate, $endDate) + $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                ];
            })
            ->toArray();
            $this->sortData();
        }else{
            $this->requeteBySite = Site::all()
                ->map(function ($site) use ($startDate, $endDate) {
                    return [
                        'name' => $site->name,
                        'forfait_contrat' => $site->showForfaitContratForPeriod($startDate, $endDate),
                        'cout_maintenance' => $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                        'total_frais_maintenance' => $site->showForfaitContratForPeriod($startDate, $endDate) + $site->calculateMonthlyMaintenanceCost($startDate, $endDate),
                    ];
                })
                ->toArray();
            $this->sortData();

        }
    }

    private function sortData()
    {
        $this->requeteBySite = collect($this->requeteBySite)->sortBy([
            [$this->sortField, $this->sortDirection]
        ])->toArray();
    }

    public function mount()
    {
        $this->year_filter = date('Y');
        $this->month_filter = date('n');
        $this->registre_filter = '';
        $this->initPeriode();

        $this->loadData();
    }

    private function initPeriode()
    {
        $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
        $endDate = $startDate->copy()->endOfMonth();
        $this->periode_text = "Période du " . $startDate->translatedFormat('d F Y') . " au " . $endDate->translatedFormat('d F Y');
    }

    public function updatedYearFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function updatedMonthFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function updatedRegistreFilter()
    {
        $this->loadData();
    }

    public function updatedPeriode()
    {
        $this->loadData();
        $dates = explode(' to ', $this->periode);
        if ($this->periode && count($dates) == 2) {
            $this->year_filter = date('Y', strtotime($dates[0]));
            $this->month_filter = date('n', strtotime($dates[0]));
        }
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Coût Total de Maintenance par Site')
            ->setAnimated($this->firstRun)
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(50)
            ->setHorizontal(true)
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
