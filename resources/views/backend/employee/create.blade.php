@inject('employee', '\App\Models\Employee\Employee')
@inject('corps', '\App\Models\Data\Corps')
@inject('rank', '\App\Models\Data\Rank')
@inject('position', '\App\Models\Data\Position')
@inject('workunit', '\App\Models\Data\WorkUnit')
@inject('typeDocument', '\App\Models\Data\TypeDocument')
@inject('_division', '\App\Models\Data\Division')

@php $modulName = ucfirst($division) . ' Personnel' @endphp

@extends('backend.layouts.app')

@section('title', __($modulName))

@section('content')
    <x-forms.post :action="route('admin.employee.' . $division .'.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create '. $modulName)
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.employee.' . $division .'.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                @include('backend.employee.includes.form-personal-details')
                @include('backend.employee.includes.form-account')
                @include('backend.employee.includes.form-' . $division . '-details')
                @include('backend.employee.includes.form-documents')
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create '. $modulName)</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
     
$(document).ready(function (e) {

    $('input[name="photo"]').change(function(){ 
        let reader = new FileReader();

        reader.onload = (e) => { 
            $('#photo-employee').attr('src', e.target.result); 
        }

        reader.readAsDataURL(this.files[0]); 
    });

    $('input[name^="documents"]').change(function(el){
        const imageEl = $(this).parent().parent().find('img')
        let reader = new FileReader();

        reader.onload = (e) => { 
            imageEl.attr('src', e.target.result); 
        }

        reader.readAsDataURL(this.files[0]); 
    });


    $('.add-military-education').click(function(el){
        const htmlInputMilitaryEducation = `<input 
                type="text" 
                name="military_education[]" 
                class="form-control mt-2" 
                placeholder="{{ __('Military Education') }}" 
                value="{{ old('military_education') }}"
            />`
        const htmlInputYearMilitaryEducation = `<input 
                type="text" 
                name="year_military_education[]" 
                class="form-control mt-2" 
                placeholder="{{ __('Year Military Education') }}" 
                value="{{ old('year_military_education') }}"
            />`

        const elInputMilitaryEducaiton = $('input[name="military_education[]"]')
        const elInputYearMilitaryEducaiton = $('input[name="year_military_education[]"]')
        const buttonDeleteMilitaryEducation = $('.delete-military-education')

        elInputMilitaryEducaiton.last().after(htmlInputMilitaryEducation)
        elInputYearMilitaryEducaiton.last().after(htmlInputYearMilitaryEducation)
        buttonDeleteMilitaryEducation.show()
    });

    $('.delete-military-education').click(function(el){
        const elInputMilitaryEducaiton = $('input[name="military_education[]"]')
        const elInputYearMilitaryEducaiton = $('input[name="year_military_education[]"]')
        const buttonDeleteMilitaryEducation = $('.delete-military-education')

        if (elInputMilitaryEducaiton.length > 1 && elInputYearMilitaryEducaiton.length > 1) {
            elInputMilitaryEducaiton.last().detach()
            elInputYearMilitaryEducaiton.last().detach()
        }

        if (elInputMilitaryEducaiton.length == 2 && elInputYearMilitaryEducaiton.length == 2) {
            buttonDeleteMilitaryEducation.hide()
        }
    });

    $('.add-general-education').click(function(el){
        const htmlInputGeneralEducation = `<input 
                type="text" 
                name="general_education[]" 
                class="form-control mt-2" 
                placeholder="{{ __('General Education') }}" 
                value="{{ old('general_education') }}"
            />`
        const htmlInputYearGeneralEducation = `<input 
                type="text" 
                name="year_general_education[]" 
                class="form-control mt-2" 
                placeholder="{{ __('Year General Education') }}" 
                value="{{ old('year_general_education') }}"
            />`

        const elInputGeneralEducaiton = $('input[name="general_education[]"]')
        const elInputYearGeneralEducaiton = $('input[name="year_general_education[]"]')
        const buttonDeleteGeneralEducation = $('.delete-general-education')

        elInputGeneralEducaiton.last().after(htmlInputGeneralEducation)
        elInputYearGeneralEducaiton.last().after(htmlInputYearGeneralEducation)
        buttonDeleteGeneralEducation.show()
    });

    $('.delete-general-education').click(function(el){
        const elInputGeneralEducaiton = $('input[name="general_education[]"]')
        const elInputYearGeneralEducaiton = $('input[name="year_general_education[]"]')
        const buttonDeleteGeneralEducation = $('.delete-general-education')

        if (elInputGeneralEducaiton.length > 1 && elInputYearGeneralEducaiton.length > 1) {
            elInputGeneralEducaiton.last().detach()
            elInputYearGeneralEducaiton.last().detach()
        }

        if (elInputGeneralEducaiton.length == 2 && elInputYearGeneralEducaiton.length == 2) {
            buttonDeleteGeneralEducation.hide()
        }
    });
  
});

</script>