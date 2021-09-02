<div class="mb-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Personal Details </h4>
    <div class="form-group row">
        <label for="photo" class="col-md-3 col-form-label">
            @lang('Photo')
        </label>

        <div class="col-md-9">
            <img 
                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17b9d0dc80c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17b9d0dc80c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.65%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" 
                alt="photo" 
                width="200" 
                height="300" 
                class="img-thumbnail rounded mb-2"
                id="photo-employee"
            >
            <input 
                type="file" 
                name="photo" 
                class="form-control-file"
                placeholder="{{ __('Photo') }}" 
                value="{{ old('photo') }}" 
                required 
            />
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">
            @lang('Name')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                placeholder="{{ __('Name') }}" 
                value="{{ old('name') }}"
                required 
            />
        </div>
    </div><!--form-group-->

    <div class="form-group row">
        <label for="couple_name" class="col-md-3 col-form-label">
            @lang('Couple Name')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="couple_name" 
                class="form-control" 
                placeholder="{{ __('Couple Name') }}" 
                value="{{ old('couple_name') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="number_of_children" class="col-md-3 col-form-label">
            @lang('Number of Children')
        </label>

        <div class="col-md-9">
            <input 
                type="number" 
                name="number_of_children" 
                class="form-control" 
                placeholder="{{ __('Number of Children') }}" 
                value="{{ old('number_of_children') }}"
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="birth_place" class="col-md-3 col-form-label">
            @lang('Birth Place')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="birth_place" 
                class="form-control" 
                placeholder="{{ __('Birth Place') }}" 
                value="{{ old('birth_place') }}"
                required
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="birth_date" class="col-md-3 col-form-label">
            @lang('Birth Date')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="birth_date" 
                class="form-control" 
                placeholder="{{ __('Birth Date') }}" 
                value="{{ old('birth_date') }}"
                required
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="retire_date" class="col-md-3 col-form-label">
            @lang('Retire Date')
        </label>

        <div class="col-md-9">
            <input 
                type="date" 
                name="retire_date" 
                class="form-control" 
                placeholder="{{ __('Retire Date') }}" 
                value="{{ old('retire_date') }}"
                required
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="gender" class="col-md-3 col-form-label">
            @lang('Gender')
        </label>

        <div class="col-md-9">
            <select class="custom-select" name="gender" value="{{ old('gender') }}" required>
                <option value="L" selected>@lang('Male')</option>
                <option value="P">@lang('Female')</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="religion" class="col-md-3 col-form-label">
            @lang('Religion')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="religion" 
                class="form-control" 
                placeholder="{{ __('Religion') }}" 
                value="{{ old('religion') }}"
                required
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="phone_number" class="col-md-3 col-form-label">
            @lang('Phone Number')
        </label>

        <div class="col-md-9">
            <input 
                type="text" 
                name="phone_number" 
                class="form-control" 
                placeholder="{{ __('Phone Number') }}" 
                value="{{ old('phone_number') }}"
                required
            />
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-3 col-form-label">
            @lang('Address')
        </label>

        <div class="col-md-9">
            <textarea 
                name="address"
                class="form-control" 
                placeholder="{{ __('Address') }}" 
            >{{ old('address') }}</textarea>
        </div>
    </div>
    
</div>
<!-- End Personal Details -->