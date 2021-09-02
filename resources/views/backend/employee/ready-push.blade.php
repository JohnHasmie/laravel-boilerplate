@extends('backend.layouts.app')

@php $modulName = ucfirst($division) . ' Personnel' @endphp

@section('title', __($modulName) . ' ' . __('Ready to Push'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang($modulName) @lang('Ready to Push')
        </x-slot>

        <x-slot name="body">
            @if ($division === 'military')
                <livewire:backend.employee.military-ready-push-table />
            @else
                <livewire:backend.employee.civil-ready-push-table />
            @endif
        </x-slot>
    </x-backend.card>
@endsection
