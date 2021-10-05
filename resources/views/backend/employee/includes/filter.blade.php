@inject('corps', '\App\Models\Data\Corps')
@inject('rank', '\App\Models\Data\Rank')
@inject('position', '\App\Models\Data\Position')
@inject('workunit', '\App\Models\Data\WorkUnit')


<div class="form-row">
        <div class="form-group col-md-4">
            <div wire:key="filter-rank" class="p-2">
                <label for="filter-rank" class="mb-2">
                    @lang('Rank')
                </label>

                <select wire:model="filters.rank" id="filter-rank" class="form-control">
                    <option value=""></option>
                    @foreach ($rank::all() as $_rank)
                        <option value="{{ $_rank->name }}">{{ $_rank->label }}
                            @if ($_rank->description)
                                ({{ $_rank->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-corps" class="p-2">
                <label for="filter-corps" class="mb-2">
                    @lang('Corps')
                </label>

                <select wire:model="filters.corps" id="filter-corps" class="form-control">
                    <option value=""></option>
                    @foreach ($corps::all() as $_corps)
                        <option value="{{ $_corps->name }}">{{ $_corps->label }}
                            @if ($_corps->description)
                                ({{ $_corps->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-type" class="p-2">
                <label for="filter-type" class="mb-2">
                    @lang('WorkUnit')
                </label>

                <select wire:model="filters.workunit" id="filter-workunit" class="form-control">
                    <option value=""></option>
                    @foreach ($workunit::all() as $_workunit)
                        <option value="{{ $_workunit->name }}">{{ $_workunit->label }}
                            @if ($_workunit->description)
                                ({{ $_workunit->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-position" class="p-2">
                <label for="filter-position" class="mb-2">
                    @lang('Position')
                </label>

                <select wire:model="filters.position" id="filter-position" class="form-control">
                    <option value=""></option>
                    @foreach ($position::all() as $_position)
                        <option value="{{ $_position->name }}">{{ $_position->label }}
                            @if ($_position->description)
                                ({{ $_position->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-retirement" class="p-2">
                <label for="filter-retirement" class="mb-2">
                    @lang('Retirement Year')
                </label>

                <input 
                    type="number" 
                    wire:model="filters.retirement_year" 
                    class="form-control"
                    min="1000"
                    max="9999"
                />
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-entry" class="p-2">
                <label for="filter-entry" class="mb-2">
                    @lang('Entry Year')
                </label>

                <input 
                    type="number" 
                    wire:model="filters.entry_year" 
                    class="form-control"
                    min="1000"
                    max="9999"
                />
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-general_education" class="p-2">
                <label for="filter-general_education" class="mb-2">
                    @lang('General Education')
                </label>

                <input 
                    type="text" 
                    wire:model="filters.general_education" 
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-military_education" class="p-2">
                <label for="filter-military_education" class="mb-2">
                    @lang('Military Education')
                </label>

                <input 
                    type="text" 
                    wire:model="filters.military_education" 
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group col-md-4">
            <div wire:key="filter-status" class="p-2">
                <label for="filter-status" class="mb-2">
                    @lang('Status')
                </label>

                <select wire:model="filters.status" id="filter-status" class="form-control">
                    <option value=""></option>
                    <option value="active">@lang('Active')</option>
                    <option value="non active">@lang('Non Active')</option>
                    <option value="retired">@lang('Retired')</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-6">
            <div wire:key="filter-start-periode" class="p-2">
                <label for="filter-start-periode" class="mb-2">
                    @lang('Start Periode')
                </label>

                <input
                    id="filter-start-periode" 
                    type="date" 
                    wire:model="filters.start_periode" 
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group col-md-6">
            <div wire:key="filter-end-periode" class="p-2">
                <label for="filter-end-periode" class="mb-2">
                    @lang('End Periode')
                </label>

                <input 
                    id="filter-end-periode"
                    type="date" 
                    wire:model="filters.end_periode" 
                    class="form-control"
                />
            </div>
        </div>

</div>

@push('after-styles')
    <style>
        .dropdown-menu.w-100:not(.dropdown-menu-right) {
            min-width: 35rem !important;
            padding: 1rem !important;
            background: #3c4b64;
            color: white;
        }
    </style>
@endpush