
<x-livewire-tables::bs4.table.cell>
    {!! $row->name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->birth_date !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->gender }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->address }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell class="warning">
    {{ $row->unit_detail->date_finished_rank }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.employee.includes.actions', ['model' => $row, 'division' => $division])
</x-livewire-tables::bs4.table.cell>
