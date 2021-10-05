<?php

namespace App\Exports\Employee;

use App\Models\Data\TypeDocument;
use App\Models\Employee\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployeeExport implements FromQuery, WithHeadings, WithMapping, WithEvents
{
    protected $index = 1;
    protected $typeDocuments = [];
    protected $query;
    protected $filters;

    public function __construct($query, $filters)
    {
        $this->typeDocuments = TypeDocument::all()->toArray();
        $this->query = $query; 
        $this->filters = $filters; 
    }

    public function query()
    {
        return $this->query;
    }

     /**
    * @var Employee $employee
    */
    public function map($employee): array
    {
        $filters = $this->filters;
        $data = [
            $this->index,
            $employee->name,
        ];

        if ($filters['rank'] ?? false) array_push($data, $employee->unit_detail->rank->label);
        if ($filters['corps'] ?? false) array_push($data, $employee->unit_detail->corps->label);
        if ($filters['workunit'] ?? false) array_push($data, $employee->unit_detail->work_unit->label);
        if ($filters['position'] ?? false) array_push($data, $employee->unit_detail->position->label);
        if ($filters['retirement_year'] ?? false) array_push($data, $employee->retired_date);
        if ($filters['entry_year'] ?? false) array_push($data, $employee->unit_detail->date_warrant_check_in);
        if ($filters['general_education'] ?? false) array_push($data, implode(PHP_EOL, $employee->general_educations()->pluck('name')->toarray()));
        if ($filters['military_education'] ?? false) array_push($data, implode(PHP_EOL, $employee->military_educations()->pluck('name')->toarray()));
        if ($filters['status'] ?? false) array_push($data, $employee->unit_detail->work_unit_status);
        if ($filters['start_periode'] ?? false) array_push($data, $employee->created_at);

        $this->index++;

        return $data;
    }

    public function headings(): array
    {
        $filters = $this->filters;
        $headers = [
            '#',
            __('Name'),
        ];

        if ($filters['rank'] ?? false) array_push($headers,  __('Rank'));
        if ($filters['corps'] ?? false) array_push($headers, __('Corps'));
        if ($filters['workunit'] ?? false) array_push($headers, __('WorkUnit'));
        if ($filters['position'] ?? false) array_push($headers, __('Position'),);
        if ($filters['retirement_year'] ?? false) array_push($headers, __('Retire Date'));
        if ($filters['entry_year'] ?? false) array_push($headers, __('Date Warrant Check In'));
        if ($filters['general_education'] ?? false) array_push($headers, __('General Education'));
        if ($filters['military_education'] ?? false) array_push($headers, __('Military Education'));
        if ($filters['status'] ?? false) array_push($headers, 'Status');
        if ($filters['start_periode'] ?? false) array_push($headers, __('Created at'));

        return $headers;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
                $highestColumn++;
                for ($column = 'A'; $column !== $highestColumn; $column++) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setWidth(15);
                }
            },
        ];
    }
}
