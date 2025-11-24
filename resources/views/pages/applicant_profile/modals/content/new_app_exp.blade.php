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
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <label for="new_exp_month_from">Start date</label>
                <input id="new_exp_month_from" name="new_exp_month_from" type="text" class="form-control flatpickr" placeholder="From">
                <label class="invalid-feedback" id="new_educ_year_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="new_exp_month_to">End date</label>
                <input id="new_exp_month_to" name="new_exp_month_to" type="text" class="form-control flatpickr" placeholder="To">
                <label class="invalid-feedback" id="new_educ_year_error"></label>
            </div>
        </div>
    </div>

</form>
