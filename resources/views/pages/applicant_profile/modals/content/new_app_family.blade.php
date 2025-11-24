<form id="form_new_family">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_fam_relationship">Relationship</label>
                <select name="new_fam_relationship" id="new_fam_relationship" data-placeholder="Select relationship" class="form-control fam-select2">
                    <option></option>
                    @foreach ($relationship as $rs)
                    <option value="{{ $rs->Relationship_ID }}">{{ $rs->Relationship }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_fam_relationship_error">Relationship is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_fam_first_name">First Name</label>
                <input type="text" name="new_fam_first_name" id="new_fam_first_name" class="form-control">
                <label class="invalid-feedback" id="new_fam_first_name_error">First name is required</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_fam_middle_name">Middle Name</label>
                <input type="text" name="new_fam_middle_name" id="new_fam_middle_name" class="form-control">
                <label class="invalid-feedback" id="new_fam_middle_name_error"></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_fam_last_name">Last Name</label>
                <input type="text" name="new_fam_last_name" id="new_fam_last_name" class="form-control">
                <label class="invalid-feedback" id="new_fam_last_name_error">Last name is required</label>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <label for="new_fam_nationality">Nationality</label>
            <input type="text" name="new_fam_nationality" id="new_fam_nationality" class="form-control">
            <label class="invalid-feedback" id="new_fam_nationality_error">Nationality is required</label>
        </div>
        <div class="col-6">
            <label for="new_fam_bdate">Birth date</label>
            <input id="new_fam_bdate" name="new_fam_bdate" type="text" class="form-control fam-flatpickr">
            <label class="invalid-feedback" id="new_fam_bdate_error">Birth date is required.</label>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <label for="new_family_deceased">Deceased</label>
            <select name="new_family_deceased" id="new_family_deceased" data-placeholder="Deceased?" class="form-control fam-select2">
                <option></option>
                <option value="1">YES</option>
                <option value="0">NO</option>
            </select>
            <label class="invalid-feedback" id="new_family_deceased_error">Deceased is required.</label>
        </div>
        <div class="col-6">
            <label for="new_family_dependent">Dependents</label>
            <select name="new_family_dependent" id="new_family_dependent" data-placeholder="Dependent?" class="form-control fam-select2">
                <option></option>
                <option value="1">YES</option>
                <option value="0">NO</option>
            </select>
            <label class="invalid-feedback" id="new_family_dependent_error">Dependents is required.</label>
        </div>
    </div>
</form>
