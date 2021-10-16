<?php

namespace App\Http\Livewire\Backend\Report;

use App\Models\Data\Corps;
use App\Models\Data\Position;
use App\Models\Data\Rank;
use App\Models\Data\WorkUnit;
use App\Models\Employee\Employee;
use App\Models\Employee\EmployeeUnitDetail;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Livewire\Component;

/**
 * Class EmployeeChart.
 */
class EmployeeChart extends Component
{
    public $model = [];
    public $type;
    public $start_periode;
    public $end_periode;

    protected $rules = [
        'type' => 'required',
    ];

    // protected $listeners = [
    //     'onPointClick' => 'handleOnPointClick',
    //     'onSliceClick' => 'handleOnSliceClick',
    //     'onColumnClick' => 'handleOnColumnClick'
    // ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function mount()
    {
        // $this->model = $this->getDataStatusWorkUnit();
        // $this->selected = 'rank';
    }

    public function getDataRank() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = EmployeeUnitDetail::with(['rank'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return $item['rank']['label'];
                },
            ])
            ->toArray();

        $type = Rank::all()->pluck('id', 'label')->toArray();

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataCorps() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = EmployeeUnitDetail::with(['corps'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return $item['corps']['label'];
                },
            ])
            ->toArray();

        $type = Corps::all()->pluck('id', 'label')->toArray();

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataPosition() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = EmployeeUnitDetail::with(['position'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return $item['position']['label'];
                },
            ])
            ->toArray();

        $type = Position::all()->pluck('id', 'label')->toArray();

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataWorkUnit() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = EmployeeUnitDetail::with(['work_unit'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return $item['work_unit']['label'];
                },
            ])
            ->toArray();

        $type = WorkUnit::all()->pluck('id', 'label')->toArray();

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataStatusWorkUnit() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = EmployeeUnitDetail::whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return $item->work_unit_status;
                },
            ])
            ->toArray();

        $type = ['active' => 1, 'non active' => 1, 'retired' => 1];

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataRetirementYear() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = Employee::whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return Carbon::parse($item->retire_date)->format('Y') . ' ';
                },
            ])
            ->toArray();

        $type = array_fill_keys(array_keys(array_flip(array_unique(array_reduce(array_map('array_keys',$data),'array_merge',[])))), 1);

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    public function getDataEntryYear() {
        $startDate = date($this->start_periode);
        $endDate = date($this->end_periode);

        $data = Employee::whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy([
                function($item) {
                    return Carbon::parse($item->created_at)->format('F-Y');
                },
                function($item) {
                    return Carbon::parse($item->entry_date)->format('Y') . ' ';
                },
            ])
            ->toArray();

        $type = array_fill_keys(array_keys(array_flip(array_unique(array_reduce(array_map('array_keys',$data),'array_merge',[])))), 1);

        return [
            'data' => $data,
            'type' => $type
        ];
    }

    protected function mapGetData() {
        return [
            'rank' => 'getDataRank',
            'corps' => 'getDataCorps',
            'workunit' => 'getDataWorkUnit',
            'position' => 'getDataPosition',
            'status' => 'getDataStatusWorkUnit',
            'entry year' => 'getDataEntryYear',
            'retirement year' => 'getDataRetirementYear',
        ];
    }

    public function updated() {
        if ($this->type && $this->start_periode && $this->end_periode) {
            $this->model = $this->{$this->mapGetData()[$this->type]}();
        }
    }

    public function render()
    {   
        $columnChartModel = false;

        if (!empty($this->model['data'])) {
            $colors = [];
            $columnChartModel = 
                LivewireCharts::multiLineChartModel()
                ->setTitle(__(ucwords($this->type)))
                ->setAnimated(true)
                // ->withOnPointClickEvent('onPointClick')
                ->multiLine()
                ->withLegend()
                ->setDataLabelsEnabled(true);

            foreach ($this->model['data'] as $month => $_data) {
                $_data = array_merge($_data, array_diff_key($this->model['type'], $_data));
                ksort($_data);
                foreach ($_data as $pointY => $contents) {
                    $pointX = is_array($contents) ? count($contents) : 0;
                    $columnChartModel->addSeriesPoint($month, $pointY, $pointX, ['id' => $contents]);
                }
            }

            $columnChartModel->setColors($colors);
        }
        

        return view('backend.report.employee-chart')
            ->with([
                'columnChartModel' => $columnChartModel,
            ]);
    }
}
