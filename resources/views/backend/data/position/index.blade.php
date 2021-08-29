@extends('backend.layouts.app')

@section('title', __('Position'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Position')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.data.position.create')"
                    :text="__('Create Position')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.data.position-table />
        </x-slot>
    </x-backend.card>
@endsection
