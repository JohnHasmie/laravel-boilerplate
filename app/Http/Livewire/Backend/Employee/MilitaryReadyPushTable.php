<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Exports\Employee\MilitaryPushRankExport;
use App\Models\Employee\Employee;
use Excel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class MilitaryReadyPushTable.
 */
class MilitaryReadyPushTable extends MilitaryTable
{
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

    public function exportSelected()
    {
        return Excel::download(new MilitaryPushRankExport, 'Military_Push_Rank.xlsx');
    }
}
