<form id="form_new_experience">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_employer">Employer</label>
                <input type="text" name="new_employer" id="new_employer" class="form-control">
                <label class="invalid-feedback" id="new_employer_error">Employer is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_emptype">Employment type</label>
                <select name="new_emptype" id="new_emptype" data-placeholder="Select employment type" class="form-control exp-select2">
                    <option></option>
                    @foreach ($emptype as $et)
                    <option value="{{ $et->EmploymentType_ID }}">{{ $et->EmploymentTypeCode }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_emptype_error">Employee type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_address">Address</label>
                <input type="text" name="new_address" id="new_address" class="form-control">
                <label class="invalid-feedback" id="new_address_error">Address is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_position">Position</label>
                <input type="text" name="new_position" id="new_position" class="form-control">
                <label class="invalid-feedback" id="new_position_error">Position is required.</label>
            </div>
        </div>
    </div>
    <label for="new_exp_month_from">Start date</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <select name="new_exp_month_from" id="new_exp_month_from" data-placeholder="Month" class="form-control exp-select2">
                    <option></option>
                    @foreach ($month as $mt)
                    <option value="{{ $mt->Month_ID }}">{{ $mt->Month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="new_exp_year_from" id="new_exp_year_from" data-placeholder="Year" class="form-control exp-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    <option value="{{ $yr->Year }}">{{ $yr->Year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <label for="new_exp_month_to">End date</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <select name="new_exp_month_to" id="new_exp_month_to" data-placeholder="Month" class="form-control exp-select2">
                    <option></option>
                    @foreach ($month as $mt)
                    <option value="{{ $mt->Month_ID }}">{{ $mt->Month }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_exp_date_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="new_exp_year_to" id="new_exp_year_to" data-placeholder="Year" class="form-control exp-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    <option value="{{ $yr->Year }}">{{ $yr->Year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</form>