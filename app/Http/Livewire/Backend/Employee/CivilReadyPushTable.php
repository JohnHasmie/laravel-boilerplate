<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\CivilPushRankExport;
use App\Http\Controllers\Backend\Employee\EmployeeController;
use App\Models\Employee\Employee;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CivilReadyPushTable.
 */
class CivilReadyPushTable extends CivilTable
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $division = $this->division;
        $date = today()->format('Y-m-d');
        $currentUser = auth()->user();

        $query = Employee::whereHas('division', function ($q) use ($division) {
                $q->whereName($division);
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
            })
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));

        if ($currentUser->hasRole('Admin Work Unit')) {
            $currentWorkUnit = $currentUser->workUnitId();

            $query->whereHas('unit_detail', function ($q) use ($currentWorkUnit) {
                $q->whereWorkUnitId($currentWorkUnit);
            });
        } 

        return $query;
    }

    public function exportSelected()
    {
        return Excel::download(new CivilPushRankExport($this->selectedRowsQuery), 'Civil_Push_Rank.xlsx');
    }
}
