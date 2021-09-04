<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\MilitaryExport;
use Excel;

/**
 * Class MilitaryTable.
 */
class MilitaryTable extends EmployeeTable
{
    public string $division = 'military';

    public function exportSelected()
    {
        return Excel::download(new MilitaryExport, 'Military.xlsx');
    }

}
