<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Http\Controllers\Backend\Employee\EmployeeController;
use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class EmployeeTable.
 */
class CivilReadyPushTable extends DataTableComponent
{
    public string $division = 'civil';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $division = $this->division;
        $date = today()->format('Y-m-d');

        return Employee::whereHas('division', function ($q) use ($division) {
                $q->whereName($division);
            })
            ->whereHas('unit_detail', function ($q) use ($date) {
                $q->where('date_finished_rank', '>=', $date);
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
}
