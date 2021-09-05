<div class="mb-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Personal Account </h4>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">
                @lang('Email')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="{{ __('Email') }}" 
                    value="{{ old('email') ?? $employee && $employee->user ? $employee->user->email : null }}" 
                />
            <!-- </div> -->
        </div><!--form-group-->

        <div class="form-group col-md-6">
            <label for="password">
                @lang('Password')
            </label>

            <!-- <div class="col-md-9"> -->
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="{{ __('Password') }}" 
                    value="{{ old('password') }}"
                    {{ $employee && $employee->user ? "disabled" : "" }} 
                />
            <!-- </div> -->
        </div><!--form-group-->
    </div>
    
</div>
<!-- End Personal Details -->