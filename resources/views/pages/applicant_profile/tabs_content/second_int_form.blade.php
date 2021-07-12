<form id="form_second_interview">
    <div class="row">
        <div class="col-xl-12">
            <div class="form-group">
            <label for="second_int_date">Date of interview</label>
            <input type="text" id="second_int_date" name="second_int_date" class="form-control interview-flatpickr" value="{{ $interview[0]->Second ?? '' }}">
            <label class="invalid-feedback" id="second_int_date_error">Date of interview is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="form-group">
            <label for="second_int_interviewee">Interviewed by</label>
            <select id="second_int_interviewee" name="second_int_interviewee" class="form-control interview-select2"
            data-placeholder="Select interviewee">
            <option></option>
            @foreach ($employee2 as $emp)
            @php
            $select = ( ($interview[0]->SecondByID ?? 0) == $emp->Employee_ID ) ? 'selected=selected' : '';
            @endphp
            <option value={{ $emp->Employee_ID }} {{ $select }}>{{ $emp->EmployeeNo }} - {{ $emp->FullName }}</option>
            @endforeach
        </select>
        <label class="invalid-feedback" id="second_int_interviewee_error">Interviewed by is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="form-group">
            <label for="second_int_remarks">Remarks</label>
            <textarea id="second_int_remarks" name="second_int_remarks" class="form-control">{{ $interview[0]->SecondRemarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <label>Status</label>
    <div class="row">
        <div class="col-xl-12">
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input type="radio" id="second_int_pass" name="second_int_status" class="custom-control-input" value="1" {{ ($interview[0]->SecondPassed ?? -1) == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="second_int_pass">Pass</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="second_int_fail" name="second_int_status" class="custom-control-input" value="0" {{ ($interview[0]->SecondPassed ?? -1) == 0 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="second_int_fail">Fail</label>
                </div>
                <label class="invalid-feedback" id="second_int_status_error">Status is required.</label>
            </div>
        </div>
    </div>
</form>