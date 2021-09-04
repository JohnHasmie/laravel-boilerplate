<?php

namespace App\Exports\Data;

use App\Models\Data\Corps;
use Maatwebsite\Excel\Concerns\FromCollection;

class CorpsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Corps::all();
    }
}
