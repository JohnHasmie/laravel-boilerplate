<?php

namespace App\Http\Livewire\Backend\Data;

use App\Exports\Data\RankExport;
use App\Models\Data\Rank;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class RankTable extends DataTableComponent
{
    public string $modulName = 'rank';

    public array $bulkActions = [
        'exportSelected' => 'Export to Excel',
    ];
    
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Rank::query()
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
        return Excel::download(new RankExport, 'Rank.xlsx');
    }
}
