<?php

namespace App\Exports\Data;

use Maatwebsite\Excel\Concerns\FromQuery;

class RankExport implements FromQuery
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query; 
    }

    public function query()
    {
        return $this->query;
    }
}
