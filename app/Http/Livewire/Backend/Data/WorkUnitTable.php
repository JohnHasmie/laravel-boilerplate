<?php

namespace App\Http\Livewire\Backend\Data;

use App\Exports\Data\WorkUnitExport;
use App\Models\Data\WorkUnit;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class WorkUnitTable.
 */
class WorkUnitTable extends DataTableComponent
{
    public string $modulName = 'workunit';

    public array $bulkActions = [
        'exportSelected' => 'Export to Excel',
    ];
    
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return WorkUnit::query()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Label'))
                ->sortable(),
            Column::make(__('Description')),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.data.includes.row';
    }

    public function exportSelected()
    {
        return Excel::download(new WorkUnitExport($this->selectedRowsQuery), 'WorkUnit.xlsx');
    }
}
