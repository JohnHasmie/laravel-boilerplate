
<x-livewire-tables::bs4.table.cell>
    {!! $row->name !!}
</x-livewire-tables::bs4.table.cell>

@if ($filters['rank'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->unit_detail->rank->label !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['corps'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->unit_detail->corps->label !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['workunit'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->unit_detail->work_unit->label !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['position'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->unit_detail->position->label !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['retirement_year'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->retire_date !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['entry_year'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! $row->created_at !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['general_education'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! implode(', ', $row->general_educations()->pluck('name')->toArray()) !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['military_education'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        {!! implode(', ', $row->military_educations()->pluck('name')->toArray()) !!}
    </x-livewire-tables::bs4.table.cell>
@endif

@if ($filters['status'] ?? false)
    <x-livewire-tables::bs4.table.cell>
        @lang($row->unit_detail->work_unit_status)
    </x-livewire-tables::bs4.table.cell>
@endif