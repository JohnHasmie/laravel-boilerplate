<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\CivilExport;
use App\Models\Employee\Employee;
use Excel;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CivilTable.
 */
class CivilTable extends EmployeeTable
{
    public string $division = 'civil';

    public bool $showSearch = true;

    public bool $showFilterDropdown = false;

     /**
     * @return Builder
     */
    public function query()
    {
        $division = $this->division;
        $currentUser = auth()->user();

        if ($currentUser->hasRole('Administrator')) {
            return Employee::whereHas('division', function ($q) use ($division) {
                    $q->whereName($division);
                })
                ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
        } 

        $currentWorkUnit = $currentUser->workUnitId();
        
        return Employee::whereHas('division', function ($q) use ($division) {
                $q->whereName($division);
            })
            ->whereHas('unit_detail', function ($q) use ($currentWorkUnit) {
                $q->whereWorkUnitId($currentWorkUnit);
            })
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Birth Date'))
                ->sortable(),
            Column::make(__('Gender'))
                ->sortable(),
            Column::make(__('Address')),
            Column::make(__('Date Finished Rank')),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.employee.includes.row';
    }

    public function exportSelected()
    {
        return Excel::download(new CivilExport($this->selectedRowsQuery), 'Civil.xlsx');
    }

}
