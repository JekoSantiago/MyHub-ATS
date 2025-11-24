<form id="form_new_education">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_school_type">Level of education</label>
                <select name="new_school_type" id="new_school_type" data-placeholder="Select school type" class="form-control educ-select2">
                    <option></option>
                    @foreach ($schooltype as $st)
                    <option value="{{ $st->SchoolType_ID }}">{{ $st->SchoolType }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_school_type_error">School type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_school">School</label>
                <input type="text" name="new_school" id="new_school" class="form-control">
                <label class="invalid-feedback" id="new_school_error">School is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_course">Course</label>
                <input type="text" name="new_course" id="new_course" class="form-control">
                <label class="invalid-feedback" id="new_course_error">Course is required.</label>
            </div>
        </div>
    </div>
    <label for="new_educ_year_from">Year(s)</label>
    <div class="row align-items-baseline">
        <div class="col-md-6">
            <div class="form-group">
                <input id="new_educ_year_from" name="new_educ_year_from" type="text" class="form-control flatpickr" placeholder="From">
                <label class="invalid-feedback" id="new_educ_year_error"></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input id="new_educ_year_to" name="new_educ_year_to" type="text" class="form-control flatpickr" placeholder="To">
            </div>
        </div>
    </div>
</form>
