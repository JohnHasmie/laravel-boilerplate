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
                        <option value="{{ $_rank->id }}">{{ $_rank->label }}
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
                        <option value="{{ $_corps->id }}">{{ $_corps->label }}
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
                        <option value="{{ $_workunit->id }}">{{ $_workunit->label }}
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
                        <option value="{{ $_position->id }}">{{ $_position->label }}
                            @if ($_position->description)
                                ({{ $_position->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

</div>

@push('after-styles')
    <style>
        .dropdown-menu.w-100 {
            min-width: 35rem !important
        }
    </style>
@endpush