<?php

namespace App\Exports\Employee;

class CivilPushRankExport extends CivilExport
{
    public function query()
    {
        $date = today()->format('Y-m-d');

        return $this->query->with([
            'unit_detail.corps', 
            'unit_detail.rank', 
            'unit_detail.position', 
            'documents'
        ])->whereHas('division', function ($q) {
            $q->whereName('civil');
        })->whereHas('unit_detail', function ($q) use ($date) {
            $q->where('date_finished_rank', '>=', $date);
        });
    }
}
