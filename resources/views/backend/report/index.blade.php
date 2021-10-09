@extends('backend.layouts.app')

@section('title', __('Employee Report'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Employee Report')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.report.employee-chart />
        </x-slot>
    </x-backend.card>
@endsection
