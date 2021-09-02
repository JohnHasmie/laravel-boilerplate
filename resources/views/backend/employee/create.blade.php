@inject('employee', '\App\Models\Employee\Employee')
@inject('corps', '\App\Models\Data\Corps')
@inject('rank', '\App\Models\Data\Rank')
@inject('position', '\App\Models\Data\Position')
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
  
});

</script>