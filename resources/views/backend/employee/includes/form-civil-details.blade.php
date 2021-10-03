<!-- Unit Details -->
<div class="mt-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Unit Details</h4>

    <input 
        type="hidden" 
        name="division_id" 
        value="{{ $_division->whereName('civil')->first()->id }}"
    />

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="registration_number">
                <!-- @lang('Registration Number') -->
                @lang('NIP')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="registration_number" 
                    class="form-control" 
                    placeholder="{{ __('NIP') }}" 
                    value="{{ old('registration_number') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="work_unit_id">
                @lang('WorkUnit')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="work_unit_id" value="{{ old('work_unit_id') }}" required>
                    @foreach ($workunit::all() as $_workunit)
                        <option value="{{ $_workunit->id }}" selected>{{ $_workunit->label }}
                            @if ($_workunit->description)
                                ({{ $_workunit->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="work_unit_status">
                @lang('WorkUnit Status')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="work_unit_status" value="{{ old('work_unit_status') }}" required>
                    <option value="active" selected>@lang('Active')</option>
                    <option value="non active">@lang('Non Active')</option>
                    <option value="retired">@lang('Retired')</option>
                </select>
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="corps_id">
                @lang('Corps')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="corps_id" value="{{ old('corps_id') }}" required>
                    @foreach ($corps::all() as $_corps)
                        <option value="{{ $_corps->id }}" selected>{{ $_corps->label }}
                            @if ($_corps->description)
                                ({{ $_corps->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="date_finished_prospective">
                @lang('Date Finished Prospective')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_prospective" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Prospective') }}" 
                    value="{{ old('date_finished_prospective') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="date_finished_servant">
                @lang('Date Finished Servant')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_servant" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Servant') }}" 
                    value="{{ old('date_finished_servant') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="rank_id">
                @lang('Rank')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="rank_id" value="{{ old('rank_id') }}" required>
                    @foreach ($rank::all() as $_rank)
                        <option value="{{ $_rank->id }}" selected>{{ $_rank->label }}
                            @if ($_rank->description)
                                ({{ $_rank->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="date_finished_rank">
                @lang('Date Finished Rank')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_rank" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Rank') }}" 
                    value="{{ old('date_finished_rank') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="position">
                @lang('Position')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="position_id" value="{{ old('position') }}" required>
                    @foreach ($position::all() as $_position)
                        <option value="{{ $_position->id }}" selected>{{ $_position->label }}
                            @if ($_position->description)
                                ({{ $_position->description }})
                            @endif
                        </option>
                    @endforeach
                </select>
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="date_finished_position">
                @lang('Date Finished Position')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_position" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Position') }}" 
                    value="{{ old('date_finished_position') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="number_decision_position">
                @lang('Number Decision Position')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="number_decision_position" 
                    class="form-control" 
                    placeholder="{{ __('Number Decision Position') }}" 
                    value="{{ old('number_decision_position') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="number_warrant">
                @lang('Number Warrant')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="number_warrant" 
                    class="form-control" 
                    placeholder="{{ __('Number Warrant') }}" 
                    value="{{ old('number_warrant') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="date_finished_warrant">
                @lang('Date Finished Warrant')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_warrant" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Warrant') }}" 
                    value="{{ old('date_finished_warrant') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="number_warrant_check_in">
                @lang('Number Warrant Check In')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="number_warrant_check_in" 
                    class="form-control" 
                    placeholder="{{ __('Number Warrant Check In') }}" 
                    value="{{ old('number_warrant_check_in') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="date_warrant_check_in">
                @lang('Date Warrant Check In')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_warrant_check_in" 
                    class="form-control" 
                    placeholder="{{ __('Number Warrant Check In') }}" 
                    value="{{ old('date_warrant_check_in') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="number_warrant_check_in">
                @lang('Number Warrant Check Out')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="number_warrant_check_in" 
                    class="form-control" 
                    placeholder="{{ __('Number Warrant Check Out') }}" 
                    value="{{ old('number_warrant_check_in') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="date_warrant_check_out">
                @lang('Date Warrant Check Out')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_warrant_check_out" 
                    class="form-control" 
                    placeholder="{{ __('Number Warrant Check Out') }}" 
                    value="{{ old('date_warrant_check_out') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="military_educations[]">
                @lang('Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                @if (count(old('military_educations', [])) > 1 )
                    @foreach( old('military_educations') as $i => $field)
                        <input 
                        type="text" 
                        name="military_educations[]" 
                        class="form-control mt-2" 
                        placeholder="{{ __('Military Education') }}" 
                        value="{{ old('military_educations')[$i] }}"
                        />
                    @endforeach
                @else 
                    <input 
                        type="text" 
                        name="military_educations[]" 
                        class="form-control" 
                        placeholder="{{ __('Military Education') }}" 
                        value="{{ old('military_educations.0') }}"
                    />
                @endif
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_military_educations[]">
                @lang('Year Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                @if (count(old('year_military_educations', [])) > 1 )
                    @foreach( old('year_military_educations') as $i => $field)
                        <input 
                            type="text" 
                            name="year_military_educations[]" 
                            class="form-control mt-2" 
                            placeholder="{{ __('Year Military Education') }}" 
                            value="{{ old('year_military_educations')[$i] }}"
                            maxlength="4"
                            minlength="4"
                        />
                    @endforeach
                @else
                    <input 
                        type="text" 
                        name="year_military_educations[]" 
                        class="form-control" 
                        placeholder="{{ __('Year Military Education') }}" 
                        value="{{ old('year_military_educations.0') }}"
                        maxlength="4"
                        minlength="4"
                    />
                @endif
            <!-- </div> -->
        </div>

        <div class="btn-group form-group col-md-12" role="group" aria-label="Large button group">
            <button class="btn btn-success add-military-education" type="button">
                @lang('Add Military Education')
            </button>
            <button class="btn btn-danger delete-military-education" type="button" style="{{ count(old('year_military_educations', [])) > 1 ? '' : 'display: none' }}">
                @lang('Delete Last Military Education')
            </button>
        </div>

        <div class="form-group col-md-6">
            <label for="general_educations[]">
                @lang('General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                @if (count(old('general_educations', [])) > 1 )
                    @foreach( old('general_educations') as $i => $field)
                        <input 
                            type="text" 
                            name="general_educations[]" 
                            class="form-control mt-2" 
                            placeholder="{{ __('General Education') }}" 
                            value="{{ old('general_educations')[$i] }}"
                        />
                    @endforeach
                @else
                    <input 
                        type="text" 
                        name="general_educations[]" 
                        class="form-control" 
                        placeholder="{{ __('General Education') }}" 
                        value="{{ old('general_educations.0') }}"
                    />
                @endif
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_general_educations[]">
                @lang('Year General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                @if (count(old('year_general_educations', [])) > 1 )
                    @foreach( old('year_general_educations') as $i => $field)
                        <input 
                            type="text" 
                            name="year_general_educations[]" 
                            class="form-control mt-2" 
                            placeholder="{{ __('Year General Education') }}" 
                            value="{{ old('year_general_educations')[$i] }}"
                            maxlength="4"
                            minlength="4"
                        />
                    @endforeach
                @else
                    <input 
                        type="text" 
                        name="year_general_educations[]" 
                        class="form-control" 
                        placeholder="{{ __('Year General Education') }}" 
                        value="{{ old('year_general_educations.0') }}"
                        maxlength="4"
                        minlength="4"
                    />
                @endif
            <!-- </div> -->
        </div>

        <div class="btn-group form-group col-md-12" role="group" aria-label="Large button group">
            <button class="btn btn-success add-general-education" type="button">
                @lang('Add General Education')
            </button>
            <button class="btn btn-danger delete-general-education" type="button" style="{{ count(old('year_general_educations', [])) > 1 ? '' : 'display: none' }}">
                @lang('Delete Last General Education')
            </button>
        </div>

        <div class="form-group col-md-6">
            <label for="int_scr">
                @lang('INT SCR')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="int_scr" 
                    class="form-control" 
                    placeholder="{{ __('INT SCR') }}" 
                    value="{{ old('int_scr') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_int_scr">
                @lang('Year INT SCR')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_int_scr" 
                    class="form-control" 
                    placeholder="{{ __('Year INT SCR') }}" 
                    value="{{ old('year_int_scr') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="bp">
                @lang('BP')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="bp" 
                    class="form-control" 
                    placeholder="{{ __('BP') }}" 
                    value="{{ old('bp') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="mi">
                @lang('MI')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="lmiid" 
                    class="form-control" 
                    placeholder="{{ __('MI') }}" 
                    value="{{ old('mi') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="jas">
                @lang('JAS')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="jas" 
                    class="form-control" 
                    placeholder="{{ __('JAS') }}" 
                    value="{{ old('jas') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="description">
                @lang('Description')
            </label>

            <!-- <div class="col-md-9"> -->
                <textarea 
                    name="description"
                    class="form-control" 
                    placeholder="{{ __('Description') }}" 
                    value="{{ old('description') }}"
                ></textarea>
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- End Unit Details -->