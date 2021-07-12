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
    <label for="edit_exp_month_from">Start date</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_exp_month_from" id="edit_exp_month_from" data-placeholder="Month" class="form-control exp-select2">
                    <option></option>
                    @foreach ($month as $mt)
                    @php
                    $select = ($details[0]->ExpMoFrom == $mt->Month_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $mt->Month_ID }}" {{ $select }}>{{ $mt->Month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_exp_year_from" id="edit_exp_year_from" data-placeholder="Year" class="form-control exp-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    @php
                    $select = ($details[0]->ExpYrFrom == $yr->Year ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $yr->Year }}" {{ $select }}>{{ $yr->Year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <label for="edit_exp_month_to">End date</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_exp_month_to" id="edit_exp_month_to" data-placeholder="Month" class="form-control exp-select2">
                    <option></option>
                    @foreach ($month as $mt)
                    @php
                    $select = ($details[0]->ExpMoTo == $mt->Month_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $mt->Month_ID }}" {{ $select }}>{{ $mt->Month }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_exp_date_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_exp_year_to" id="edit_exp_year_to" data-placeholder="Year" class="form-control exp-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    @php
                    $select = ($details[0]->ExpYrTo == $yr->Year ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $yr->Year }}" {{ $select }}>{{ $yr->Year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</form>