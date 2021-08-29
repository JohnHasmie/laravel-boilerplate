@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Division'))

@section('content')
    <x-forms.patch :action="route('admin.data.division.update', $division)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Division')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.data.division.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $division->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Label')</label>

                        <div class="col-md-10">
                            <input type="text" name="label" class="form-control" placeholder="{{ __('Label') }}" value="{{ old('label') ?? $division->label }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Decsription')</label>

                        <div class="col-md-10">
                            <textarea name="description" class="form-control" placeholder="{{ __('Description') }}" value="{{ old('description') ?? $division->description }}"></textarea>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Division')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
