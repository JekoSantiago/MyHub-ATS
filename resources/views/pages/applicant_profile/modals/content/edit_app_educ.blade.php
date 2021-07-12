<form id="form_edit_education">
    @csrf
    <input type="hidden" name="app_educ_ID" id="app_educ_ID" value="{{ $details[0]->ApplicantSchool_ID }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_school_type">Level of education</label>
                <select name="edit_school_type" id="edit_school_type" data-placeholder="Select school type" class="form-control educ-select2">
                    <option></option>
                    @foreach ($schooltype as $st)
                    @php
                    $select = ($details[0]->SchoolType_ID == $st->SchoolType_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $st->SchoolType_ID }}" {{ $select }}>{{ $st->SchoolType }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_school_type_error">School type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_school">School</label>
                <input type="text" name="edit_school" id="edit_school" class="form-control" value="{{ $details[0]->School }}">
                <label class="invalid-feedback" id="edit_school_error">School is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="{{ $style }}">
                <label for="edit_course">Course</label>
                <input type="text" name="edit_course" id="edit_course" class="form-control" value="{{ $details[0]->Course }}">
                <label class="invalid-feedback" id="edit_course_error">Course is required.</label>
            </div>
        </div>
    </div>
    <label for="edit_educ_year_from">Year(s)</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_educ_year_from" id="edit_educ_year_from" data-placeholder="From" class="form-control educ-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    @php
                    $selectfrom = ($details[0]->YrFrom == $yr->Year) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $yr->Year }}" {{$selectfrom}}>{{ $yr->Year }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_educ_year_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="edit_educ_year_to" id="edit_educ_year_to" data-placeholder="To" class="form-control educ-select2">
                    <option></option>
                    @foreach ($year as $yr)
                    @php
                    $selectto = ($details[0]->YrTo == $yr->Year) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $yr->Year }}" {{ $selectto }}>{{ $yr->Year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</form>