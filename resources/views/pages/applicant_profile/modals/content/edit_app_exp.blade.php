<form id="form_edit_experience">
    @csrf
    <input type="hidden" name="experience_ID" id="experience_ID" value="{{ $details[0]->PreviousWork_ID }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_employer">Employer</label>
                <input type="text" name="edit_employer" id="edit_employer" class="form-control" value="{{ $details[0]->Employer }}">
                <label class="invalid-feedback" id="edit_employer_error">Employer is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_emptype">Employment type</label>
                <select name="edit_emptype" id="edit_emptype" data-placeholder="Select employment type" class="form-control exp-select2">
                    <option></option>
                    @foreach ($emptype as $et)
                    @php
                    $select = ($details[0]->EmploymentType_ID == $et->EmploymentType_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $et->EmploymentType_ID }}" {{ $select }}>{{ $et->EmploymentTypeCode }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_emptype_error">Employee type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_employer_address">Address</label>
                <input type="text" name="edit_employer_address" id="edit_employer_address" class="form-control" value="{{ $details[0]->Address }}">
                <label class="invalid-feedback" id="edit_employer_address_error">Address is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_position">Position</label>
                <input type="text" name="edit_position" id="edit_position" class="form-control" value="{{ $details[0]->Position }}">
                <label class="invalid-feedback" id="edit_position_error">Position is required.</label>
            </div>
        </div>
    </div>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <label for="edit_exp_month_from">Start date</label>
                <input id="edit_exp_month_from" name="edit_exp_month_from" type="text" class="form-control flatpickr" placeholder="From" value="{{ $details[0]->DateFrom }}">
                <label class="invalid-feedback" id="edit_educ_year_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="edit_exp_month_to">End date</label>
                <input id="edit_exp_month_to" name="edit_exp_month_to" type="text" class="form-control flatpickr" placeholder="To" value="{{ $details[0]->DateTo }}">
                <label class="invalid-feedback" id="edit_educ_year_error"></label>
            </div>
        </div>
    </div>

</form>
