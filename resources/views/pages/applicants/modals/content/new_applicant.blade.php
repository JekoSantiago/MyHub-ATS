<form id="form_new_app">
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Applicant Information</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="new_app_date">Date applied</label>
                    <input type="text" id="new_app_date" name="new_app_date" class="form-control flatpickr">
                    <label class="invalid-feedback" id="new_date_app_error">Date applied is required.</label>
                </div>
                <div class="col-md-10">
                    <label for="new_pos_app">Position applied</label>
                    <select id="new_pos_app" name="new_pos_app" class="form-control select2"
                        data-placeholder="Select position">
                        <option></option>
                        @foreach ($position as $pos)
                        <option value={{$pos->DeptPosition_ID}}>{{$pos->Pos}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_pos_app_error">Position applied is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="new_app_status">Application Status</label>
                    <select id="new_app_status" name="new_app_status" class="form-control select2-no-search"
                        data-placeholder="Select status">
                        <option></option>
                        @foreach ($hirestatus as $hs)
                        <option value={{$hs->HireStatus_ID}}>{{$hs->HireStatus}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_app_status_error">Application status is required.</label>
                </div>
                <div class="col-md-6">
                    <label for="new_reason">Reason</label>
                    <input id="new_reason" name="new_reason" type="text" class="form-control" readonly="readonly">
                    <label class="invalid-feedback" id="new_reason_error">Reason is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_hire_source">Hire source</label>
                    <select id="new_hire_source" name="new_hire_source" class="form-control select2-no-search"
                        data-placeholder="Select hire source">
                        <option></option>
                        @foreach ($hiresource as $hrs)
                        <option value={{$hrs->HireSource_ID}}>{{$hrs->HireSource}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_hire_source_error">Hire source is required.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Personal details</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="new_first_name">First name</label>
                    <input id="new_first_name" name="new_first_name" type="text" class="form-control">
                    <label class="invalid-feedback" id="new_fname_error">First name is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_middle_name">Middle name</label>
                    <input id="new_middle_name" name="new_middle_name" type="text" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="new_last_name">Last name</label>
                    <input id="new_last_name" name="new_last_name" type="text" class="form-control">
                    <label class="invalid-feedback" id="new_lname_error">Last name is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="new_nick_name">Nick name</label>
                    <input id="new_nick_name" name="new_nick_name" type="text" class="form-control" value="">
                    <label class="invalid-feedback" id="new_nick_name_error">Nick name is required.</label>
                </div>
                <div class="col-md-8">
                    <label for="new_maiden_name">Mother's Maiden name</label>
                    <input id="new_maiden_name" name="new_maiden_name" type="text" class="form-control" value="">
                    <label class="invalid-feedback" id="new_maiden_name_error">Mother's Maiden name is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="new_blood">Blood Type</label>
                    <select id="new_blood" name="new_blood" class="form-control select2-no-search"
                        data-placeholder="Select blood type">
                        <option></option>
                        @foreach ($blood as $b)
                        <option value={{ $b->BloodType_ID }}>{{ $b->BloodType }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_blood_error">Blood Type is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_weight">Weight (kg)</label>
                    <input id="new_weight" name="new_weight" type="number" class="form-control" value="">
                    <label class="invalid-feedback" id="new_weight_error">Weight is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_height">Height (ft'in)</label>
                    <input id="new_height" name="new_height" type="text" class="form-control" value="">
                    <label class="invalid-feedback" id="new_height_error">Height is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_expat">Expatriate</label>
                    <select id="new_expat" name="new_expat" class="form-control select2-no-search"
                        data-placeholder="">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label class="invalid-feedback" id="new_expat_error">Expatriate is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="new_gender">Gender</label>
                    <select id="new_gender" name="new_gender" class="form-control select2-no-search"
                        data-placeholder="Select gender">
                        <option></option>
                        @foreach ($gender as $gen)
                        <option value={{$gen->Gender_ID}}>{{$gen->Gender}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_gender_error">Gender is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_civil_status">Civil status</label>
                    <select id="new_civil_status" name="new_civil_status" class="form-control select2-no-search"
                        data-placeholder="Select civil status">
                        <option></option>
                        @foreach ($civilstatus as $cs)
                        <option value={{$cs->CivilStatus_ID}}>{{$cs->CivilStatus}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_civil_status_error">Civil status is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_nationality">Nationality</label>
                    <input id="new_nationality" name="new_nationality" type="text" class="form-control">
                    <label class="invalid-feedback" id="new_nationality_error">Nationality is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="new_religion">Religion</label>
                    <select id="new_religion" name="new_religion" class="form-control select2-no-search"
                        data-placeholder="Select religion">
                        <option></option>
                        @foreach ($religion as $rel)
                        <option value={{$rel->Religion_ID}}>{{$rel->Religion}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_religion_error">Religion is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="new_bdate">Birth date</label>
                    <input id="new_bdate" name="new_bdate" type="text" class="form-control flatpickr">
                    <label class="invalid-feedback" id="new_bdate_error">Birth date is required.</label>
                    <label class="invalid-feedback" id="new_age_error">Applicant must be at least 18 years old.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_bprov">Birth Province</label>
                    <select id="new_bprov" name="new_bprov" class="form-control select2"
                        data-placeholder="Select birth province">
                        <option></option>
                        @foreach ($province as $prov)
                        <option value={{$prov->Province_ID}}>{{$prov->Province}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_bprov_error">Birth province is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_bmun">Birth Municipal</label>
                    <select id="new_bmun" name="new_bmun" class="form-control select2"
                        data-placeholder="Select birth municipal"">
                        <option></option>
                    </select>
                    <label class=" invalid-feedback" id="new_bmun_error">Birth municipal is required.</label>
                </div>
                <div class=" col-md-4 d-none">
                    <label for="new_bothers">Birth Municipal</label>
                    <input id="new_bothers" name="new_bothers" type="text" class="form-control"
                        placeholder="Other municipal">
                    <label class="invalid-feedback" id="new_birthoth_error">Birth municipal is required.</label>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="new_bzip">Birth Zip code</label>
                        <input id="new_bzip" name="new_bzip" type="text" class="form-control" maxlength="4">
                        <label class="invalid-feedback" id="new_bzip_error">Birth zip code is required.</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="new_address">Home address</label>
                    <input id="new_address" name="new_address" type="text" class="form-control">
                    <label class="invalid-feedback" id="new_add_error">Home address is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="new_province">Province</label>
                    <select id="new_province" name="new_province" class="form-control select2"
                        data-placeholder="Select province">
                        <option></option>
                        @foreach ($province as $prov)
                        <option value={{$prov->Province_ID}}>{{$prov->Province}}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="new_prov_error">Province is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_municipal">Municipal</label>
                    <select id="new_municipal" name="new_municipal" class="form-control select2"
                        data-placeholder="Select municipal">
                        <option></option>
                    </select>
                    <label class="invalid-feedback" id="new_mun_error">Municipal is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="new_barangay">Barangay</label>
                    <select id="new_barangay" name="new_barangay" class="form-control select2"
                        data-placeholder="Select barangay">
                        <option></option>
                    </select>
                    <label class="invalid-feedback" id="new_brgy_error">Barangay is required.</label>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="new_zip">Zip code</label>
                        <input id="new_zip" name="new_zip" type="text" class="form-control" maxlength="4">
                        <label class="invalid-feedback" id="new_zip_error">Zip code is required.</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="new_taxcode">Tax Code</label>
                    <select id="new_taxcode" name="new_taxcode" class="form-control d-none"
                        data-placeholder="Select tax code" disabled>
                        <option></option>
                        @foreach ($taxcode as $tc)
                        <option value={{$tc->TaxCode_ID}}>{{$tc->TaxCode}}</option>
                        @endforeach
                    </select>
                    <input id="display_new_taxcode" name="display_new_taxcode" type="text" class="form-control" readonly="readonly">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="new_dependent">Dependent(s)</label>
                    <input id="new_dependent" name="new_dependent" type="text" class="form-control">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Government Identity</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="new_tin">TIN</label>
                    <input id="new_tin" name="new_tin" type="text" placeholder="xx-xxxxxxx" class="form-control"
                        maxlength="9">
                    <label class="invalid-feedback" id="new_tin_length_error">TIN requires 9 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="new_sss">SSS Number</label>
                    <input id="new_sss" name="new_sss" type="text" placeholder="xx-xxxxxxx-x" class="form-control"
                        maxlength="10">
                    <label class="invalid-feedback" id="new_sss_length_error">SSS number requires 10 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="new_hdmf">HDMF Number</label>
                    <input id="new_hdmf" name="new_hdmf" type="text" placeholder="xxxx-xxxx-xxxx" class="form-control"
                        maxlength="12">
                    <label class="invalid-feedback" id="new_hdmf_length_error">HDMF number requires 12 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="new_philhealth">Philhealth Number</label>
                    <input id="new_philhealth" name="new_philhealth" type="text" placeholder="xxxx-xxxx-xxxx"
                        class="form-control" maxlength="12">
                    <label class="invalid-feedback" id="new_philhlength_error">Philhealth number requires 12 digits.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Emergency Contact</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="new_emergency_name">Name</label>
                    <input id="new_emergency_name" name="new_emergency_name" type="text" class="form-control">
                    <label class="invalid-feedback" id="new_emergency_name_error">Emergency Name is required</label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="new_emergency_relationship">Relationship</label>
                <select name="new_emergency_relationship" id="new_emergency_relationship" data-placeholder="Select relationship" class="form-control select2">
                    <option></option>
                    @foreach ($relationship as $rs)
                    <option value="{{ $rs->Relationship_ID }}">{{ $rs->Relationship }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_emergency_relationship_error">Emergency Relationship is required.</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="new_emergency_contact">Contact Number</label>
                    <input id="new_emergency_contact" name="new_emergency_contact" type="text" class="form-control"
                        maxlength="">
                    <label class="invalid-feedback" id="new_emergency_contact_error">Contact number requires 11 digits.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="text-right">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" id="btn_add_applicant" class="btn btn-primary">Save changes</button>
    </div>
</form>
