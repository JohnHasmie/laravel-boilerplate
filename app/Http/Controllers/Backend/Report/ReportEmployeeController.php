<?php

namespace App\Http\Controllers\Backend\Report;

use App\Models\Employee\Employee;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

/**
 * Class ReportEmployeeController.
 */
class ReportEmployeeController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $columnChartModel = 
        (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
        ;
        return view('backend.report.index');
    }
}
