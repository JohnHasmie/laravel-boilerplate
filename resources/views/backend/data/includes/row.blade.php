
<x-livewire-tables::bs4.table.cell>
    {!! $row->name !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->label !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.data.includes.actions', ['model' => $row, 'modul' => $modulName])
</x-livewire-tables::bs4.table.cell>
