<!-- Unit Details -->
<div class="mt-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Unit Details</h4>

    <input 
        type="hidden" 
        name="division_id" 
        value="{{ $_division->whereName('civil')->first()->id }}"
    />

    <div class="form-group row">
        <label for="registration_number" class="col-md-3 col-form-label">
            <!-- @lang('Registration Number') -->
            @lang('NIP')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="registration_number" 
                class="form-control" 
                placeholder="{{ __('Registration Number') }}" 
                value="{{ old('registration_number') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="corps_id" class="col-md-3 col-form-label">
            @lang('Corps')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="corps_id" value="{{ old('corps_id') }}" required>
                @foreach ($corps::all() as $_corps)
                    <option value="{{ $_corps->id }}" selected>{{ $_corps->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_prospective" class="col-md-3 col-form-label">
            @lang('Date Finished Prospective')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_prospective" 
                class="form-control" 
                placeholder="{{ __('Date Finished Prospective') }}" 
                value="{{ old('date_finished_prospective') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="date_finished_servant" class="col-md-3 col-form-label">
            @lang('Date Finished Servant')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="date_finished_servant" 
                class="form-control" 
                placeholder="{{ __('Date Finished Servant') }}" 
                value="{{ old('date_finished_servant') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="rank_id" class="col-md-3 col-form-label">
            @lang('Rank')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="rank_id" value="{{ old('rank_id') }}" required>
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
                value="{{ old('date_finished_rank') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="position" class="col-md-3 col-form-label">
            @lang('Position')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="position_id" value="{{ old('position') }}" required>
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
                value="{{ old('date_finished_position') }}"
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
                value="{{ old('number_decision_position') }}"
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
                value="{{ old('number_warrant') }}"
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
                value="{{ old('date_finished_warrant') }}"
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
                value="{{ old('number_warrant_check_in') }}"
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
                value="{{ old('date_warrant_check_in') }}"
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
                value="{{ old('number_warrant_check_in') }}"
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
                value="{{ old('date_warrant_check_out') }}"
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
                value="{{ old('military_education') }}"
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
                value="{{ old('year_military_education') }}"
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
                value="{{ old('general_education') }}"
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
                value="{{ old('year_general_education') }}"
                maxlength="4"
                minlength="4"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="int_scr" class="col-md-3 col-form-label">
            @lang('INT SCR')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="int_scr" 
                class="form-control" 
                placeholder="{{ __('INT SCR') }}" 
                value="{{ old('int_scr') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="year_int_scr" class="col-md-3 col-form-label">
            @lang('Year INT SCR')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="year_int_scr" 
                class="form-control" 
                placeholder="{{ __('Year INT SCR') }}" 
                value="{{ old('year_int_scr') }}"
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
                value="{{ old('bp') }}"
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
                value="{{ old('mi') }}"
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
                value="{{ old('jas') }}"
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
                value="{{ old('description') }}"
            ></textarea>
        </div>
    </div>
</div>

<!-- End Unit Details -->