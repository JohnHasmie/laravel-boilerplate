<!-- Unit Details -->
<div class="mt-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Unit Details</h4>

    <input 
        type="hidden" 
        name="division_id" 
        value="{{ $_division->whereName('civil')->first()->id }}"
    />

    <div class="form-row">
        <div class="form-group col-md-9">
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
                    value="{{ old('registration_number') ?? $employee ? $employee->unit_detail->registration_number : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-4">
            <label for="corps_id">
                @lang('Corps')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="corps_id" value="{{ old('corps_id') ?? $employee ? $employee->unit_detail->corps_id : null }}" required>
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
                    value="{{ old('date_finished_prospective') ?? $employee ? $employee->unit_detail->date_finished_prospective : null }}"
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
                    value="{{ old('date_finished_servant') ?? $employee ? $employee->unit_detail->date_finished_servant : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="rank_id">
                @lang('Rank')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="rank_id" value="{{ old('rank_id') ?? $employee ? $employee->unit_detail->rank_id : null }}" required>
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
                    value="{{ old('date_finished_rank') ?? $employee ? $employee->unit_detail->date_finished_rank : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="position">
                @lang('Position')
            </label>

            <!-- <div class="col-md-9"> -->
                <select class="custom-select" name="position_id" value="{{ old('position') ?? $employee ? $employee->unit_detail->position : null }}" required>
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
                    value="{{ old('date_finished_position') ?? $employee ? $employee->unit_detail->date_finished_position : null }}"
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
                    value="{{ old('number_decision_position') ?? $employee ? $employee->unit_detail->number_decision_position : null }}"
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
                    value="{{ old('number_warrant') ?? $employee ? $employee->unit_detail->number_warrant : null }}"
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
                    value="{{ old('date_finished_warrant') ?? $employee ? $employee->unit_detail->date_finished_warrant : null }}"
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
                    value="{{ old('number_warrant_check_in') ?? $employee ? $employee->unit_detail->number_warrant_check_in : null }}"
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
                    value="{{ old('date_warrant_check_in') ?? $employee ? $employee->unit_detail->date_warrant_check_in : null }}"
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
                    value="{{ old('number_warrant_check_in') ?? $employee ? $employee->unit_detail->number_warrant_check_in : null }}"
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
                    value="{{ old('date_warrant_check_out') ?? $employee ? $employee->unit_detail->date_warrant_check_out : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="military_education">
                @lang('Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="military_education" 
                    class="form-control" 
                    placeholder="{{ __('Military Education') }}" 
                    value="{{ old('military_education') ?? $employee ? $employee->unit_detail->military_education : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_military_education">
                @lang('Year Military Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_military_education" 
                    class="form-control" 
                    placeholder="{{ __('Year Military Education') }}" 
                    value="{{ old('year_military_education') ?? $employee ? $employee->unit_detail->year_military_education : null }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="general_education">
                @lang('General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="general_education" 
                    class="form-control" 
                    placeholder="{{ __('General Education') }}" 
                    value="{{ old('general_education') ?? $employee ? $employee->unit_detail->general_education : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_general_education">
                @lang('Year General Education')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="text" 
                    name="year_general_education" 
                    class="form-control" 
                    placeholder="{{ __('Year General Education') }}" 
                    value="{{ old('year_general_education') ?? $employee ? $employee->unit_detail->year_general_education : null }}"
                    maxlength="4"
                    minlength="4"
                />
            <!-- </div> -->
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
                    value="{{ old('int_scr') ?? $employee ? $employee->unit_detail->int_scr : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="year_int_scr">
                @lang('Year INT SCR')
            </label>

            <div class="col-md-9">
                <input 
                    type="text" 
                    name="year_int_scr" 
                    class="form-control" 
                    placeholder="{{ __('Year INT SCR') }}" 
                    value="{{ old('year_int_scr') ?? $employee ? $employee->unit_detail->year_int_scr : null }}"
                    maxlength="4"
                    minlength="4"
                />
            </div>
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
                    value="{{ old('bp') ?? $employee ? $employee->unit_detail->bp : null }}"
                />
            <!-- </div> -->
        </div>

        <div class="form-group col-md-6">
            <label for="mi">
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
                    value="{{ old('jas') ?? $employee ? $employee->unit_detail->jas : null }}"
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
                    value="{{ old('description') ?? $employee ? $employee->unit_detail->description : null }}"
                ></textarea>
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- End Unit Details -->