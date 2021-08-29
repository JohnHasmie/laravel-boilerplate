@extends('backend.layouts.app')

@section('title', __('Corps'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Corps')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.data.corps.create')"
                    :text="__('Create Corps')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.data.corps-table />
        </x-slot>
    </x-backend.card>
@endsection
