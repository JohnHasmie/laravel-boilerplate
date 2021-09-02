<!-- Unit Details -->
<div class="mt-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Unit Details</h4>

    <input 
        type="hidden" 
        name="division_id" 
        value="{{ $_division->whereName('military')->first()->id }}"
    />

    <div class="form-group row">
        <label for="registration_number" class="col-md-3 col-form-label">
            <!-- @lang('Registration Number') -->
            @lang('NRP')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="registration_number" 
                class="form-control" 
                placeholder="{{ __('Registration Number') }}" 
                value="{{ old('registration_number') ?? $employee ? $employee->unit_detail->registration_number : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="corps_id" class="col-md-3 col-form-label">
            @lang('Corps')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="corps_id" value="{{ old('corps_id') ?? $employee ? $employee->unit_detail->corps_id : null }}" required>
                @foreach ($corps::all() as $_corps)
                    <option value="{{ $_corps->id }}" selected>{{ $_corps->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_army" class="col-md-3 col-form-label">
            @lang('Date Finished Army')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_army" 
                class="form-control" 
                placeholder="{{ __('Date Finished Army') }}" 
                value="{{ old('date_finished_army') ?? $employee ? $employee->unit_detail->date_finished_army : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="officer_source" class="col-md-3 col-form-label">
            @lang('Officer Source')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="officer_source" 
                class="form-control" 
                placeholder="{{ __('Officer Source') }}" 
                value="{{ old('officer_source') ?? $employee ? $employee->unit_detail->officer_source : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_officer" class="col-md-3 col-form-label">
            @lang('Date Finished Officer')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_officer" 
                class="form-control" 
                placeholder="{{ __('Date Finished Officer') }}" 
                value="{{ old('date_finished_officer') ?? $employee ? $employee->unit_detail->date_finished_officer : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="rank_id" class="col-md-3 col-form-label">
            @lang('Rank')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="rank_id" value="{{ old('rank_id') ?? $employee ? $employee->unit_detail->rank_id : null }}" required>
                @foreach ($rank::all() as $_rank)
                    <option value="{{ $_rank->id }}" selected>{{ $_rank->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_rank" class="col-md-3 col-form-label">
            @lang('Date Finished Rank')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_rank" 
                class="form-control" 
                placeholder="{{ __('Date Finished Rank') }}" 
                value="{{ old('date_finished_rank') ?? $employee ? $employee->unit_detail->date_finished_rank : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="position" class="col-md-3 col-form-label">
            @lang('Position')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="position_id" value="{{ old('position') ?? $employee ? $employee->unit_detail->position : null }}" required>
                @foreach ($position::all() as $_position)
                    <option value="{{ $_position->id }}" selected>{{ $_position->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_position" class="col-md-3 col-form-label">
            @lang('Date Finished Position')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_position" 
                class="form-control" 
                placeholder="{{ __('Date Finished Position') }}" 
                value="{{ old('date_finished_position') ?? $employee ? $employee->unit_detail->date_finished_position : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="number_decision_position" class="col-md-3 col-form-label">
            @lang('Number Decision Position')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="number_decision_position" 
                class="form-control" 
                placeholder="{{ __('Number Decision Position') }}" 
                value="{{ old('number_decision_position') ?? $employee ? $employee->unit_detail->number_decision_position : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="number_warrant" class="col-md-3 col-form-label">
            @lang('Number Warrant')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="number_warrant" 
                class="form-control" 
                placeholder="{{ __('Number Warrant') }}" 
                value="{{ old('number_warrant') ?? $employee ? $employee->unit_detail->number_warrant : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_warrant" class="col-md-3 col-form-label">
            @lang('Date Finished Warrant')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_warrant" 
                class="form-control" 
                placeholder="{{ __('Date Finished Warrant') }}" 
                value="{{ old('date_finished_warrant') ?? $employee ? $employee->unit_detail->date_finished_warrant : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="number_warrant_check_in" class="col-md-3 col-form-label">
            @lang('Number Warrant Check In')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="number_warrant_check_in" 
                class="form-control" 
                placeholder="{{ __('Number Warrant Check In') }}" 
                value="{{ old('number_warrant_check_in') ?? $employee ? $employee->unit_detail->number_warrant_check_in : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="date_warrant_check_in" class="col-md-3 col-form-label">
            @lang('Date Warrant Check In')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_warrant_check_in" 
                class="form-control" 
                placeholder="{{ __('Number Warrant Check In') }}" 
                value="{{ old('date_warrant_check_in') ?? $employee ? $employee->unit_detail->date_warrant_check_in : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="number_warrant_check_in" class="col-md-3 col-form-label">
            @lang('Number Warrant Check Out')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="number_warrant_check_in" 
                class="form-control" 
                placeholder="{{ __('Number Warrant Check Out') }}" 
                value="{{ old('number_warrant_check_in') ?? $employee ? $employee->unit_detail->number_warrant_check_in : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="date_warrant_check_out" class="col-md-3 col-form-label">
            @lang('Date Warrant Check Out')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_warrant_check_out" 
                class="form-control" 
                placeholder="{{ __('Number Warrant Check Out') }}" 
                value="{{ old('date_warrant_check_out') ?? $employee ? $employee->unit_detail->date_warrant_check_out : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="military_education" class="col-md-3 col-form-label">
            @lang('Military Education')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="military_education" 
                class="form-control" 
                placeholder="{{ __('Military Education') }}" 
                value="{{ old('military_education') ?? $employee ? $employee->unit_detail->military_education : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_military_education" class="col-md-3 col-form-label">
            @lang('Year Military Education')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_military_education" 
                class="form-control" 
                placeholder="{{ __('Year Military Education') }}" 
                value="{{ old('year_military_education') ?? $employee ? $employee->unit_detail->year_military_education : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="general_education" class="col-md-3 col-form-label">
            @lang('General Education')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="general_education" 
                class="form-control" 
                placeholder="{{ __('General Education') }}" 
                value="{{ old('general_education') ?? $employee ? $employee->unit_detail->general_education : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_general_education" class="col-md-3 col-form-label">
            @lang('Year General Education')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_general_education" 
                class="form-control" 
                placeholder="{{ __('Year General Education') }}" 
                value="{{ old('year_general_education') ?? $employee ? $employee->unit_detail->year_general_education : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="suspa_ba" class="col-md-3 col-form-label">
            @lang('SUSPA/BA')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="suspa_ba" 
                class="form-control" 
                placeholder="{{ __('SUSPA/BA') }}" 
                value="{{ old('suspa_ba') ?? $employee ? $employee->unit_detail->suspa_ba : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_suspa_ba" class="col-md-3 col-form-label">
            @lang('Year SUSPA/BA')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_suspa_ba" 
                class="form-control" 
                placeholder="{{ __('Year SUSPA/BA') }}" 
                value="{{ old('year_suspa_ba') ?? $employee ? $employee->unit_detail->year_suspa_ba : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="sandi" class="col-md-3 col-form-label">
            @lang('SANDI')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="sandi" 
                class="form-control" 
                placeholder="{{ __('SANDI') }}" 
                value="{{ old('sandi') ?? $employee ? $employee->unit_detail->sandi : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_sandi" class="col-md-3 col-form-label">
            @lang('Year SANDI')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_sandi" 
                class="form-control" 
                placeholder="{{ __('Year SANDI') }}" 
                value="{{ old('year_sandi') ?? $employee ? $employee->unit_detail->year_sandi : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="kontra" class="col-md-3 col-form-label">
            @lang('KONTRA')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="kontra" 
                class="form-control" 
                placeholder="{{ __('SANDI') }}" 
                value="{{ old('kontra') ?? $employee ? $employee->unit_detail->kontra : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_kontra" class="col-md-3 col-form-label">
            @lang('Year KONTRA')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_kontra" 
                class="form-control" 
                placeholder="{{ __('Year KONTRA') }}" 
                value="{{ old('year_kontra') ?? $employee ? $employee->unit_detail->year_kontra : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="tek" class="col-md-3 col-form-label">
            @lang('TEK')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="tek" 
                class="form-control" 
                placeholder="{{ __('TEK') }}" 
                value="{{ old('tek') ?? $employee ? $employee->unit_detail->tek : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_tek" class="col-md-3 col-form-label">
            @lang('Year TEK')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_tek" 
                class="form-control" 
                placeholder="{{ __('Year TEK') }}" 
                value="{{ old('year_tek') ?? $employee ? $employee->unit_detail->year_tek : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="susfunk" class="col-md-3 col-form-label">
            @lang('SUSFUNK')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="susfunk" 
                class="form-control" 
                placeholder="{{ __('SUSFUNK') }}" 
                value="{{ old('susfunk') ?? $employee ? $employee->unit_detail->susfunk : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_susfunk" class="col-md-3 col-form-label">
            @lang('Year SUSFUNK')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_susfunk" 
                class="form-control" 
                placeholder="{{ __('Year SUSFUNK') }}" 
                value="{{ old('year_susfunk') ?? $employee ? $employee->unit_detail->year_susfunk : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="strat" class="col-md-3 col-form-label">
            @lang('STRAT')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="strat" 
                class="form-control" 
                placeholder="{{ __('STRAT') }}" 
                value="{{ old('strat') ?? $employee ? $employee->unit_detail->strat : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_strat" class="col-md-3 col-form-label">
            @lang('Year STRAT')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_strat" 
                class="form-control" 
                placeholder="{{ __('Year STRAT') }}" 
                value="{{ old('year_strat') ?? $employee ? $employee->unit_detail->year_strat : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="economy" class="col-md-3 col-form-label">
            @lang('ECONOMY')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="economy" 
                class="form-control" 
                placeholder="{{ __('ECONOMY') }}" 
                value="{{ old('economy') ?? $employee ? $employee->unit_detail->economy : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_economy" class="col-md-3 col-form-label">
            @lang('Year ECONOMY')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_economy" 
                class="form-control" 
                placeholder="{{ __('Year ECONOMY') }}" 
                value="{{ old('year_economy') ?? $employee ? $employee->unit_detail->year_economy : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="pusprop" class="col-md-3 col-form-label">
            @lang('PUSPROP')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="pusprop" 
                class="form-control" 
                placeholder="{{ __('PUSPROP') }}" 
                value="{{ old('pusprop') ?? $employee ? $employee->unit_detail->pusprop : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_pusprop" class="col-md-3 col-form-label">
            @lang('Year PUSPROP')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_pusprop" 
                class="form-control" 
                placeholder="{{ __('Year PUSPROP') }}" 
                value="{{ old('year_pusprop') ?? $employee ? $employee->unit_detail->year_pusprop : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="gal" class="col-md-3 col-form-label">
            @lang('GAL')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="gal" 
                class="form-control" 
                placeholder="{{ __('GAL') }}"
                value="{{ old('gal') ?? $employee ? $employee->unit_detail->gal : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_gal" class="col-md-3 col-form-label">
            @lang('Year GAL')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_gal" 
                class="form-control" 
                placeholder="{{ __('Year GAL') }}" 
                value="{{ old('year_gal') ?? $employee ? $employee->unit_detail->year_gal : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="gator" class="col-md-3 col-form-label">
            @lang('GATOR')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="gator" 
                class="form-control" 
                placeholder="{{ __('GATOR') }}" 
                value="{{ old('gator') ?? $employee ? $employee->unit_detail->gator : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_gator" class="col-md-3 col-form-label">
            @lang('Year GATOR')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_gator" 
                class="form-control" 
                placeholder="{{ __('Year GATOR') }}" 
                value="{{ old('year_gator') ?? $employee ? $employee->unit_detail->year_gator : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="lid" class="col-md-3 col-form-label">
            @lang('LID')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="lid" 
                class="form-control" 
                placeholder="{{ __('LID') }}" 
                value="{{ old('lid') ?? $employee ? $employee->unit_detail->lid : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_lid" class="col-md-3 col-form-label">
            @lang('Year LID')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_lid" 
                class="form-control" 
                placeholder="{{ __('Year LID') }}" 
                value="{{ old('year_lid') ?? $employee ? $employee->unit_detail->year_lid : null }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="bp" class="col-md-3 col-form-label">
            @lang('BP')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="bp" 
                class="form-control" 
                placeholder="{{ __('BP') }}" 
                value="{{ old('bp') ?? $employee ? $employee->unit_detail->bp : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="mi" class="col-md-3 col-form-label">
            @lang('MI')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="lmiid" 
                class="form-control" 
                placeholder="{{ __('MI') }}" 
                value="{{ old('mi') ?? $employee ? $employee->unit_detail->mi : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="jas" class="col-md-3 col-form-label">
            @lang('JAS')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="jas" 
                class="form-control" 
                placeholder="{{ __('JAS') }}" 
                value="{{ old('jas') ?? $employee ? $employee->unit_detail->jas : null }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-3 col-form-label">
            @lang('Description')
        </label>

        <div class="col-md-9">
            <textarea 
                name="description"
                class="form-control" 
                placeholder="{{ __('Description') }}" 
                value="{{ old('description') ?? $employee ? $employee->unit_detail->description : null }}"
            ></textarea>
        </div>
    </div>
</div>

<!-- End Unit Details -->