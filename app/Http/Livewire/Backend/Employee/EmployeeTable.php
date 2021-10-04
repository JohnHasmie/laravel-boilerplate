<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Models\Employee\Employee;
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

        return Employee::whereNull('name');
        
    }

    public function columns(): array
    {
        if (count($this->getFilters())) {
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

        return [];
    }

    public function rowView(): string
    {
        return 'backend.employee.includes.row';
    }

    public function filtersView(): ?string
    {
        return 'backend.employee.includes.filter';
    }
}
