<?php

namespace App\Exports\Data;

use App\Models\Data\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;

class RankExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rank::all();
    }
}
