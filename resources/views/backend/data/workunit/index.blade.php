@extends('backend.layouts.app')

@section('title', __('WorkUnit'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('WorkUnit')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.data.workunit.create')"
                    :text="__('Create WorkUnit')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.data.work-unit-table />
        </x-slot>
    </x-backend.card>
@endsection
