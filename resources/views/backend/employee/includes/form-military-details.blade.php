<!-- Unit Details -->
<div class="mt-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Unit Details</h4>

    <input 
        type="hidden" 
        name="division_id" 
        value="{{ $_division->whereName('military')->first()->id }}"
    />

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="registration_number">
                <!-- @lang('Registration Number') -->
                @lang('NRP')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="registration_number" 
                    class="form-control" 
                    placeholder="{{ __('NRP') }}" 
                    value="{{ old('registration_number') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
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

        <div class="form-group col-md-6">
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

        <div class="form-group col-md-6">
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

        <div class="form-group col-md-6">
            <label for="date_finished_army">
                @lang('Date Finished Army')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_army" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Army') }}" 
                    value="{{ old('date_finished_army') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="officer_source">
                @lang('Officer Source')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="officer_source" 
                    class="form-control" 
                    placeholder="{{ __('Officer Source') }}" 
                    value="{{ old('officer_source') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="date_finished_officer">
                @lang('Date Finished Officer')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="date" 
                    name="date_finished_officer" 
                    class="form-control" 
                    placeholder="{{ __('Date Finished Officer') }}" 
                    value="{{ old('date_finished_officer') }}"
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
            <label for="military_education[]">
                @lang('Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="military_education[]" 
                    class="form-control" 
                    placeholder="{{ __('Military Education') }}" 
                    value="{{ old('military_education.0') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_military_education[]">
                @lang('Year Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_military_education[]" 
                    class="form-control" 
                    placeholder="{{ __('Year Military Education') }}" 
                    value="{{ old('year_military_education.0') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="btn-group form-group col-md-12" role="group" aria-label="Large button group">
            <button class="btn btn-success add-military-education" type="button">
                @lang('Add Military Education')
            </button>
            <button class="btn btn-danger delete-military-education" type="button" style="display: none;">
                @lang('Delete Last Military Education')
            </button>
        </div>

        <div class="form-group col-md-6">
            <label for="general_education[]">
                @lang('General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="general_education[]" 
                    class="form-control" 
                    placeholder="{{ __('General Education') }}" 
                    value="{{ old('general_education.0') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_general_education[]">
                @lang('Year General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_general_education[]" 
                    class="form-control" 
                    placeholder="{{ __('Year General Education') }}" 
                    value="{{ old('year_general_education.1') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="btn-group form-group col-md-12" role="group" aria-label="Large button group">
            <button class="btn btn-success add-general-education" type="button">
                @lang('Add General Education')
            </button>
            <button class="btn btn-danger delete-general-education" type="button" style="display: none;">
                @lang('Delete Last General Education')
            </button>
        </div>

        <div class="form-group col-md-6">
            <label for="suspa_ba">
                @lang('SUSPA/BA')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="suspa_ba" 
                    class="form-control" 
                    placeholder="{{ __('SUSPA/BA') }}" 
                    value="{{ old('suspa_ba') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_suspa_ba">
                @lang('Year SUSPA/BA')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_suspa_ba" 
                    class="form-control" 
                    placeholder="{{ __('Year SUSPA/BA') }}" 
                    value="{{ old('year_suspa_ba') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="sandi">
                @lang('SANDI')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="sandi" 
                    class="form-control" 
                    placeholder="{{ __('SANDI') }}" 
                    value="{{ old('sandi') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_sandi">
                @lang('Year SANDI')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_sandi" 
                    class="form-control" 
                    placeholder="{{ __('Year SANDI') }}" 
                    value="{{ old('year_sandi') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="kontra">
                @lang('KONTRA')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="kontra" 
                    class="form-control" 
                    placeholder="{{ __('SANDI') }}" 
                    value="{{ old('kontra') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_kontra">
                @lang('Year KONTRA')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_kontra" 
                    class="form-control" 
                    placeholder="{{ __('Year KONTRA') }}" 
                    value="{{ old('year_kontra') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="tek">
                @lang('TEK')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="tek" 
                    class="form-control" 
                    placeholder="{{ __('TEK') }}" 
                    value="{{ old('tek') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_tek">
                @lang('Year TEK')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_tek" 
                    class="form-control" 
                    placeholder="{{ __('Year TEK') }}" 
                    value="{{ old('year_tek') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="susfunk">
                @lang('SUSFUNK')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="susfunk" 
                    class="form-control" 
                    placeholder="{{ __('SUSFUNK') }}" 
                    value="{{ old('susfunk') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_susfunk">
                @lang('Year SUSFUNK')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_susfunk" 
                    class="form-control" 
                    placeholder="{{ __('Year SUSFUNK') }}" 
                    value="{{ old('year_susfunk') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="strat">
                @lang('STRAT')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="strat" 
                    class="form-control" 
                    placeholder="{{ __('STRAT') }}" 
                    value="{{ old('strat') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_strat">
                @lang('Year STRAT')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_strat" 
                    class="form-control" 
                    placeholder="{{ __('Year STRAT') }}" 
                    value="{{ old('year_strat') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="economy">
                @lang('ECONOMY')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="economy" 
                    class="form-control" 
                    placeholder="{{ __('ECONOMY') }}" 
                    value="{{ old('economy') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_economy">
                @lang('Year ECONOMY')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_economy" 
                    class="form-control" 
                    placeholder="{{ __('Year ECONOMY') }}" 
                    value="{{ old('year_economy') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="pusprop">
                @lang('PUSPROP')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="pusprop" 
                    class="form-control" 
                    placeholder="{{ __('PUSPROP') }}" 
                    value="{{ old('pusprop') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_pusprop">
                @lang('Year PUSPROP')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_pusprop" 
                    class="form-control" 
                    placeholder="{{ __('Year PUSPROP') }}" 
                    value="{{ old('year_pusprop') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="gal">
                @lang('GAL')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="gal" 
                    class="form-control" 
                    placeholder="{{ __('GAL') }}"
                    value="{{ old('gal') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_gal">
                @lang('Year GAL')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_gal" 
                    class="form-control" 
                    placeholder="{{ __('Year GAL') }}" 
                    value="{{ old('year_gal') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="gator">
                @lang('GATOR')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="gator" 
                    class="form-control" 
                    placeholder="{{ __('GATOR') }}" 
                    value="{{ old('gator') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_gator">
                @lang('Year GATOR')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_gator" 
                    class="form-control" 
                    placeholder="{{ __('Year GATOR') }}" 
                    value="{{ old('year_gator') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="lid">
                @lang('LID')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="lid" 
                    class="form-control" 
                    placeholder="{{ __('LID') }}" 
                    value="{{ old('lid') }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_lid">
                @lang('Year LID')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_lid" 
                    class="form-control" 
                    placeholder="{{ __('Year LID') }}" 
                    value="{{ old('year_lid') }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
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

        <div class="form-group col-md-4">
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

        <div class="form-group col-md-4">
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

        <div class="form-group col-md-12">
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