<?php

namespace App\Exports\Data;

use App\Models\Data\Position;
use Maatwebsite\Excel\Concerns\FromCollection;

class PositionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Position::all();
    }
}
