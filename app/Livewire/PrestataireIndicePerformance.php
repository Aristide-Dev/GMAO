<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\Prestataire;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Livewire\Component;

class PrestataireIndicePerformance extends Component
{
    public $prestataires = [];
    public $firstRun = true;
    public $showDataLabels = false;
    public $periode = null;
    public $periode_text = null;

    public $year_filter;
    public $month_filter;

    public $sortField = 'indice_performance_general'; // Default sort field
    public $sortDirection = 'desc'; // Default sort direction

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

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
        $this->prestataires = [];

        if ($this->periode) {
            $dates = explode(' to ', $this->periode);
            if (count($dates) == 2) {
                $startDate = Carbon::createFromFormat('Y-m-d', trim($dates[0]));
                $endDate = Carbon::createFromFormat('Y-m-d', trim($dates[1]))->endOfDay();

                $this->periode_text = "Période du " . $startDate->translatedFormat('d F Y') . " au " . $endDate->translatedFormat('d F Y');
            } else {
                $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
                $endDate = $startDate->copy()->endOfMonth();
            }
        } else {
            $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
            $endDate = $startDate->copy()->endOfMonth();
        }

        $this->prestataires = Prestataire::all()
            ->map(function ($prestataire) use ($startDate, $endDate) {
                return [
                    'name' => $prestataire->name,
                    'slug' => $prestataire->slug,
                    'indice_performance_periode' => $prestataire->indicePerformancePeriod($startDate, $endDate),
                    'indice_performance_general' => $prestataire->getIndicePerformanceGeneralAttribute(),
                ];
            })
            ->toArray();

        $this->sortData();
    }

    private function sortData()
    {
        $this->prestataires = collect($this->prestataires)
            ->sortBy([
                [$this->sortField, $this->sortDirection]
            ])
            ->toArray();
    }

    public function mount()
    {
        $this->year_filter = date('Y');
        $this->month_filter = date('n');

        $this->loadData();
    }

    public function render()
    {
        $columnChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Indice de Performance des Prestataires')
            ->setAnimated($this->firstRun)
            ->setLegendVisibility(false)
            ->legendHorizontallyAlignedCenter(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(10)
            ->setHorizontal(true);
            // ->withGrid();

        foreach ($this->prestataires as $prestataire) {
            $columnChartModel = $columnChartModel->addColumn($prestataire['name'], $prestataire['indice_performance_general'], StatusEnum::randomColor());
        }

        return view('livewire.prestataire-indice-performance', [
            'prestataires' => $this->prestataires,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
