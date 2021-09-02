@inject('model', '\App\Domains\Auth\Models\User')
@inject('corps', '\App\Models\Data\Corps')
@inject('rank', '\App\Models\Data\Rank')
@inject('position', '\App\Models\Data\Position')
@inject('typeDocument', '\App\Models\Data\TypeDocument')
@inject('_division', '\App\Models\Data\Division')

@extends('backend.layouts.app')

@php $modulName = ucfirst($division) . ' Personnel' @endphp

@section('title', __('Update '. $modulName))

@section('content')
    <x-forms.patch :action="route('admin.employee.' . $division . '.update', $employee)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update ' . $modulName)
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.employee.' . $division . '.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                @include('backend.employee.includes.form-edit-personal-details', ['employee' => $employee])
                @include('backend.employee.includes.form-edit-account', ['employee' => $employee])
                @include('backend.employee.includes.form-edit-' . $division . '-details', ['employee' => $employee])
                @include('backend.employee.includes.form-edit-documents', ['employee' => $employee])
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update '. $modulName)</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
