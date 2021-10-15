<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\EmployeeExport;
use App\Models\Employee\Employee;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class EmployeeTable.
 */
class EmployeeTable extends DataTableComponent
{
    public string $division = 'all';

    public bool $showSearch = false;

    public array $filters = [];

    public array $bulkActions = [
        'exportSelected' => 'Export to Excel',
    ];

    public function __construct()
    {
        $this->filterNames = [
            'rank' => __('Rank'),
            'corps' => __('Corps'),
            'workunit' => __('WorkUnit'), 
            'position' => __('Position'),
            'retirement_year' => __('Retirement Year'),
            'entry_year' => __('Entry Year'),
            'general_education' => __('General Education'),
            'military_education' => __('Military Education'),
            'status' => __('Status'),
            'start_periode' => __('Start Periode'),
            'end_periode' => __('End Periode'),
        ];
    }

    public function cleanFilters(): void
    {
        // Filter $filters values
        $this->filters = collect($this->filters)->filter(function ($filterValue, $filterName) {
            $filterDefinitions = $this->filters();

            // Ignore search
            if ($filterName === 'search') {
                return true;
            }

            // Filter out any keys that weren't defined as a filter
            if (! isset($filterDefinitions[$filterName])) {
                return false;
            }

            // Ignore null values
            if (is_null($filterValue)) {
                return true;
            }

            return true;
        })->toArray();
    }

    /**
     * Define the filters array
     *
     * @return Filter[]
     */
    public function filters(): array
    {
        return [
            'rank' => '',
            'corps' => '',
            'workunit' => '', 
            'position' => '',
            'retirement_year' => '',
            'entry_year' => '',
            'general_education' => '',
            'military_education' => '',
            'status' => '',
            'start_periode' => '',
            'end_periode' => '',
        ];
    }

    /**
     * @return Builder
     */
    public function query()
    {
        $filters = $this->getFilters();
        $division = $this->division;
        $currentUser = auth()->user();

        if (!empty($filters)) {
            $query = Employee::with([
                    'unit_detail.rank', 
                    'unit_detail.position', 
                    'unit_detail.corps', 
                    'unit_detail.work_unit', 
                    'general_educations', 
                    'military_educations'
                ])
                ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
            
            if ($currentUser->hasRole('Admin Work Unit')) {
                $currentWorkUnit = $currentUser->workUnitId();

                $query->whereHas('unit_detail', function ($q) use ($currentWorkUnit) {
                    $q->whereWorkUnitId($currentWorkUnit);
                });
            }
            
            $query->when($filters['rank'] ?? false, fn ($query, $rank) => $query->whereHas('unit_detail.rank', function ($q) use ($rank) { $q->whereName($rank); } ))
                ->when($filters['corps'] ?? false, fn ($query, $corps) => $query->whereHas('unit_detail.corps', function ($q) use ($corps) { $q->whereName($corps); } ))
                ->when($filters['workunit'] ?? false, fn ($query, $workunit) => $query->whereHas('unit_detail.work_unit', function ($q) use ($workunit) { $q->whereName($workunit); } ))
                ->when($filters['position'] ?? false, fn ($query, $position) => $query->whereHas('unit_detail.position', function ($q) use ($position) { $q->whereName($position); } ))
                ->when($filters['retirement_year'] ?? false, fn ($query, $year) => $query->where('retire_date', 'like', "%$year%"))
                ->when($filters['entry_year'] ?? false, fn ($query, $year) => $query->where('entry_year', 'like', "%$year%"))
                ->when($filters['general_education'] ?? false, fn ($query, $education) => $query->whereHas('general_educations', function ($q) use ($education) { $q->where('name', 'like', "%$education%"); } ))
                ->when($filters['military_education'] ?? false, fn ($query, $education) => $query->whereHas('military_educations', function ($q) use ($education) { $q->where('name', 'like', "%$education%"); } ))
                ->when($filters['status'] ?? false, fn ($query, $status) => $query->whereHas('unit_detail', function ($q) use ($status) { $q->whereWorkUnitStatus($status); } ))
                ->when($filters['start_periode'] ?? false, fn ($query, $date) => $query->where('created_at', '>=', $date))
                ->when($filters['end_periode'] ?? false, fn ($query, $date) => $query->where('created_at', '<=', $date));


            return $query;
        } 
        

        return Employee::whereNull('name');
        
    }

    public function columns(): array
    {
        $titles = [];
        if (count($this->getFilters())) {
            array_push($titles, Column::make(__('Name'))->sortable());

            if ($this->hasFilter('rank')) array_push($titles, Column::make(__('Rank')));
            if ($this->hasFilter('corps')) array_push($titles, Column::make(__('Corps')));
            if ($this->hasFilter('workunit')) array_push($titles, Column::make(__('WorkUnit')));
            if ($this->hasFilter('position')) array_push($titles, Column::make(__('Position')));
            if ($this->hasFilter('retirement_year')) array_push($titles, Column::make(__('Retirement Year')));
            if ($this->hasFilter('entry_year')) array_push($titles, Column::make(__('Entry Year')));
            if ($this->hasFilter('general_education')) array_push($titles, Column::make(__('General Education')));
            if ($this->hasFilter('military_education')) array_push($titles, Column::make(__('Military Education')));
            if ($this->hasFilter('status')) array_push($titles, Column::make(__('Status')));
            if ($this->hasFilter('start_periode')) array_push($titles, Column::make(__('Start Periode')));
            if ($this->hasFilter('end_periode')) array_push($titles, Column::make(__('End Periode')));
        }

        return $titles;
    }

    public function rowView(): string
    {
        return 'backend.employee.includes.row-dynamic';
    }

    public function filtersView(): ?string
    {
        return 'backend.employee.includes.filter';
    }


    public function exportSelected()
    {
        return Excel::download(new EmployeeExport($this->selectedRowsQuery, $this->filters), 'Employee.xlsx');
    }
}
