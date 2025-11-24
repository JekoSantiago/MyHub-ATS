<form id="form_edit_family">
    @csrf
    <input type="hidden" name="famID" id="famID" value="{{ $details[0]->Family_ID }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_fam_relationship">Relationship</label>
                <select name="edit_fam_relationship" id="edit_fam_relationship" data-placeholder="Select relationship" class="form-control fam-select2">
                    <option></option>
                    @foreach ($relationship as $rs)
                    @php
                    $select = ($details[0]->Relationship_ID == $rs->Relationship_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $rs->Relationship_ID }}" {{ $select }} >{{ $rs->Relationship }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_fam_relationship_error">Relationship is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_fam_first_name">First Name</label>
                <input type="text" name="edit_fam_first_name" id="edit_fam_first_name" class="form-control" value="{{ $details[0]->FirstName }}">
                <label class="invalid-feedback" id="edit_fam_first_name_error">First name is required</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_fam_middle_name">Middle Name</label>
                <input type="text" name="edit_fam_middle_name" id="edit_fam_middle_name" class="form-control" value="{{ $details[0]->MiddleName }}">
                <label class="invalid-feedback" id="edit_fam_middle_name_error"></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_fam_last_name">Last Name</label>
                <input type="text" name="edit_fam_last_name" id="edit_fam_last_name" class="form-control" value="{{ $details[0]->LastName }}">
                <label class="invalid-feedback" id="edit_fam_last_name_error">Last name is required</label>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <label for="edit_fam_nationality">Nationality</label>
            <input type="text" name="edit_fam_nationality" id="edit_fam_nationality" class="form-control" value="{{ $details[0]->Nationality }}">
            <label class="invalid-feedback" id="edit_fam_nationality_error">Nationality is required</label>
        </div>
        <div class="col-6">
            <label for="edit_fam_bdate">Birth date</label>
            <input id="edit_fam_bdate" name="edit_fam_bdate" type="text" class="form-control fam-flatpickr" value="{{ $details[0]->Birthdate }}">
            <label class="invalid-feedback" id="edit_fam_bdate_error">Birth date is required.</label>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-6">
            <label for="edit_family_deceased">Deceased</label>
            <select name="edit_family_deceased" id="edit_family_deceased" data-placeholder="Deceased?" class="form-control fam-select2">
                <option></option>
                <option value="1" {{ ($details[0]->Deceased == 1 ) ? 'selected=selected' : '' }}>YES</option>
                <option value="0"{{ ($details[0]->Deceased == 0 ) ? 'selected=selected' : '' }}>NO</option>
            </select>
            <label class="invalid-feedback" id="edit_family_deceased_error">Deceased is required.</label>
        </div>
        <div class="col-6">
            <label for="edit_family_dependent">Dependents</label>
            <select name="edit_family_dependent" id="edit_family_dependent" data-placeholder="Dependent?" class="form-control fam-select2">
                <option></option>
                <option value="1"{{ ($details[0]->Dependents == 1 ) ? 'selected=selected' : '' }}>YES</option>
                <option value="0"{{ ($details[0]->Dependents == 0 ) ? 'selected=selected' : '' }}>NO</option>
            </select>
            <label class="invalid-feedback" id="edit_family_dependent_error">Dependents is required.</label>
        </div>
    </div>
</form>
