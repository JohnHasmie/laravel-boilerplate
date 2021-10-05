<?php

namespace App\Exports\Employee;

use App\Models\Data\TypeDocument;
use App\Models\Employee\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CivilExport implements FromQuery, WithHeadings, WithMapping, WithEvents
{
    protected $index = 1;
    protected $typeDocuments = [];
    protected $query;

    public function __construct($query)
    {
        $this->typeDocuments = TypeDocument::all()->toArray();
        $this->query = $query; 
    }

    public function query()
    {
        return $this->query->with([
            'unit_detail.corps', 
            'unit_detail.rank', 
            'unit_detail.position', 
            'documents'
        ])->whereHas('division', function ($q) {
            $q->whereName('civil');
        });
    }

     /**
    * @var Employee $employee
    */
    public function map($employee): array
    {
        $personnel = [
            $this->index,
            $employee->name,
            $employee->couple_name,
            $employee->birth_place,
            $employee->birth_date,
            $employee->retire_date,
            $employee->gender,
            $employee->religion,
            $employee->phone_number . '',
            $employee->address,
        ];

        $unit_detail = [
            $employee->unit_detail->register_number,
            $employee->unit_detail->work_unit->label,
            $employee->unit_detail->work_unit_status,
            $employee->unit_detail->corps->label,
            $employee->unit_detail->date_finished_prospective,
            $employee->unit_detail->date_finished_servant,
            $employee->unit_detail->rank->label,
            $employee->unit_detail->date_finished_rank,
            $employee->unit_detail->position->label,
            $employee->unit_detail->date_finished_position,
            $employee->unit_detail->number_decision_position,
            $employee->unit_detail->number_warrant,
            $employee->unit_detail->date_finished_warrant,
            $employee->unit_detail->number_warrant_check_in,
            $employee->unit_detail->date_warrant_check_in,
            $employee->unit_detail->number_warrant_check_out,
            $employee->unit_detail->date_warrant_check_out,
            // $employee->unit_detail->military_education,
            // $employee->unit_detail->year_military_education,
            // $employee->unit_detail->general_education,
            // $employee->unit_detail->year_general_education,
            $employee->unit_detail->int_scr,
            $employee->unit_detail->year_int_scr,
            $employee->unit_detail->bp,
            $employee->unit_detail->mi,
            $employee->unit_detail->jas,
            $employee->unit_detail->description
        ];

        $educations = [
            implode(PHP_EOL, $employee->military_educations()->pluck('name')->toarray()),
            implode(PHP_EOL, $employee->military_educations()->pluck('year')->toarray()),
            implode(PHP_EOL, $employee->general_educations()->pluck('name')->toarray()),
            implode(PHP_EOL, $employee->general_educations()->pluck('year')->toarray()),
        ];

        $documents = array_map(function ($typeDocument) use ($employee) {
            foreach ($employee->documents as $document) {
                if ($document->type_document_id === $typeDocument['id']) {
                    return env('APP_URL') . '/storage/' . $document->file;
                }
            }

            return '';
        }, $this->typeDocuments);

        $this->index++;

        return array_merge($personnel, $unit_detail, $educations, $documents);
    }

    public function headings(): array
    {
        $personnel = [
            '#',
            __('Name'),
            __('Couple Name'),
            __('Birth Place'),
            __('Birth Date'),
            __('Retire Date'),
            __('Gender'),
            __('Religion'),
            __('Phone Number'),
            __('Address'),
        ];

        $unit_detail = [
            __('NRP'),
            __('WorkUnit'),
            'Status ' . __('WorkUnit'),
            __('Corps'),
            __('Date Finished Prospective'),
            __('Date Finished Servant'),
            __('Rank'),
            __('Date Finished Rank'),
            __('Position'),
            __('Date Finished Position'),
            __('Number Decision Position'),
            __('Number Warrant'),
            __('Date Finished Warrant'),
            __('Number Warrant Check In'),
            __('Date Warrant Check In'),
            __('Number Warrant Check Out'),
            __('Date Warrant Check Out'),
            // __('Military Education'),
            // __('Year Military Education'),
            // __('General Education'),
            // __('Year General Education'),
            __('INT SCR'),
            __('Year INT SCR'),
            __('BP'),
            __('MI'),
            __('JAS'),
            __('Description'),
        ];

        $educations = [
            __('Military Education'),
            __('Year Military Education'),
            __('General Education'),
            __('Year General Education'),
        ];

        $documents = array_map(fn($document): string => __($document['label']), $this->typeDocuments);

        return array_merge($personnel, $unit_detail, $educations, $documents);
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
