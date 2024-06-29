<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class EvolutionRequetes extends Component
{
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

    public function render()
    {
        $demandes = DemandeIntervention::all();
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
                ->setColumnWidth(70)
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

        return view('livewire.evolution-requetes', compact('columnChartModel', 'pieChartModel'));
    }
}
