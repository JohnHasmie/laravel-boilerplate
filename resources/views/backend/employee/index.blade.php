@extends('backend.layouts.app')

@php $modulName = ucfirst($division) . ' Personnel' @endphp

@section('title', __($modulName))

@if ($division !== 'all')
    @section('breadcrumb-links')
        @include('backend.employee.includes.breadcrumb-links')
    @endsection
@endif

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang($modulName)
        </x-slot>

        @if ($logged_in_user->hasAllAccess() && $division !== 'all')
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.employee.' . $division . '.create')"
                    :text="__('Create ' . $modulName)"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            @if ($division === 'all')
                <livewire:backend.employee.employee-table />
            @elseif ($division === 'military')
                <livewire:backend.employee.military-table />
            @else
                <livewire:backend.employee.civil-table />
            @endif
        </x-slot>
    </x-backend.card>
@endsection
