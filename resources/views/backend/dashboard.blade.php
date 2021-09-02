@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>

    </x-backend.card>

    @if (count($military_ready_push))
        <div class="alert alert-danger" role="alert">
            @lang('Military Personnel') @lang('Ready to Push') : {{ count($military_ready_push) }} @lang('Personnel')
            <x-utils.link icon="c-icon cil-arrow-thick-from-bottom" class="card-header-action" :href="route('admin.employee.military.push')" :text="__('Push Rank')" />
        </div>
    @endif

    @if (count($civil_ready_push))
        <div class="alert alert-danger" role="alert">
            @lang('Civil Personnel') @lang('Ready to Push') : {{ count($civil_ready_push) }} @lang('Personnel')
            <x-utils.link icon="c-icon cil-arrow-thick-from-bottom" class="card-header-action" :href="route('admin.employee.civil.push')" :text="__('Push Rank')" />
        </div>
    @endif

    @if (!count($military_ready_push) && !count($civil_ready_push))
        <div class="alert alert-info" role="alert">
            @lang('No personnel are ready to move up the ranks')
        </div>
    @endif
@endsection
