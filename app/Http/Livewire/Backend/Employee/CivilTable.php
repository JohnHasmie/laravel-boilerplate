<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\CivilExport;
use Excel;

/**
 * Class CivilTable.
 */
class CivilTable extends EmployeeTable
{
    public string $division = 'civil';

    public function exportSelected()
    {
        return Excel::download(new CivilExport, 'Civil.xlsx');
    }

}
