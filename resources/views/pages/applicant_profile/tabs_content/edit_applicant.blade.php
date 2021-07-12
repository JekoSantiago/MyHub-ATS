<form id="form_edit_app">
    @csrf
    <input type="hidden" name="edit_appID" id="edit_appID" value="{{ $applicant[0]->Applicant_ID }}">
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Applicant Information</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="edit_app_date">Date applied</label>
                    <input type="text" id="edit_app_date" name="edit_app_date" class="form-control flatpickr" value="{{ $applicant[0]->DateApply }}">
                    <label class="invalid-feedback" id="edit_date_app_error">Date applied is required.</label>
                </div>
                <div class="col-md-10">
                    <label for="edit_pos_app">Position applied</label>
                    <select id="edit_pos_app" name="edit_pos_app" class="form-control edit-app-select2"
                        data-placeholder="Select position">
                        <option></option>
                        @foreach ($position as $pos)
                        @php
                        $select = ($applicant[0]->Position_ID == $pos->DeptPosition_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $pos->DeptPosition_ID }} {{ $select }}>{{ $pos->Pos }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_pos_app_error">Position applied is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row align-items-baseline">
                <div class="col-md-2">
                    <label for="edit_app_status">Application Status</label>
                    <select id="edit_app_status" name="edit_app_status" class="form-control edit-app-select2-no-search"
                        data-placeholder="Select status">
                        <option></option>
                        @foreach ($hirestatus as $hs)
                        @php
                        $select = ($applicant[0]->HireStatus_ID == $hs->HireStatus_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $hs->HireStatus_ID }} {{ $select }}>{{ $hs->HireStatus }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_app_status_error">Application status is required.</label>
                </div>
                <div class="col-md-6">
                    <label for="edit_reason">Reason</label>
                    @php
                    $disabled = ($applicant[0]->HireStatus_ID == 1 ) ? 'disabled' : '';
                    @endphp
                    <input id="edit_reason" name="edit_reason" type="text" class="form-control" value="{{ $applicant[0]->Reason }}" {{ $disabled }}>
                    <label class="invalid-feedback" id="edit_reason_error">Reason is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="edit_hire_source">Hire source</label>
                    <select id="edit_hire_source" name="edit_hire_source" class="form-control edit-app-select2-no-search"
                        data-placeholder="Select hire source">
                        <option></option>
                        @foreach ($hiresource as $hrs)
                        @php
                        $select = ($applicant[0]->HireSource_ID == $hrs->HireSource_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $hrs->HireSource_ID }} {{ $select }}>{{ $hrs->HireSource }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_hire_source_error">Hire source is required.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Personal details</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="edit_first_name">First name</label>
                    <input id="edit_first_name" name="edit_first_name" type="text" class="form-control" value="{{ $applicant[0]->FirstName }}">
                    <label class="invalid-feedback" id="edit_fname_error">First name is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="edit_middle_name">Middle name</label>
                    <input id="edit_middle_name" name="edit_middle_name" type="text" class="form-control" value="{{ $applicant[0]->MiddleName }}">
                </div>
                <div class="col-md-4">
                    <label for="edit_last_name">Last name</label>
                    <input id="edit_last_name" name="edit_last_name" type="text" class="form-control" value="{{ $applicant[0]->LastName }}">
                    <label class="invalid-feedback" id="edit_lname_error">Last name is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="edit_gender">Gender</label>
                    <select id="edit_gender" name="edit_gender" class="form-control edit-app-select2-no-search"
                        data-placeholder="Select gender">
                        <option></option>
                        @foreach ($gender as $gen)
                        @php
                        $select = ($applicant[0]->Gender_ID == $gen->Gender_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $gen->Gender_ID }} {{ $select }}>{{ $gen->Gender }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_gender_error">Gender is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="edit_civil_status">Civil status</label>
                    <select id="edit_civil_status" name="edit_civil_status" class="form-control edit-app-select2-no-search"
                        data-placeholder="Select civil status">
                        <option></option>
                        @foreach ($civilstatus as $cs)
                        @php
                        $select = ($applicant[0]->CivilStatus_ID == $cs->CivilStatus_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $cs->CivilStatus_ID }} {{ $select }}>{{ $cs->CivilStatus }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_civil_status_error">Civil status is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="edit_nationality">Nationality</label>
                    <input id="edit_nationality" name="edit_nationality" type="text" class="form-control" value="{{ $applicant[0]->Citizen }}">
                    <label class="invalid-feedback" id="edit_nationality_error">Nationality is required.</label>
                </div>
                <div class="col-md-3">
                    <label for="edit_religion">Religion</label>
                    <select id="edit_religion" name="edit_religion" class="form-control edit-app-select2-no-search"
                        data-placeholder="Select religion">
                        <option></option>
                        @foreach ($religion as $rel)
                        @php
                        $select = ($applicant[0]->Religion_ID == $rel->Religion_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $rel->Religion_ID }} {{ $select }}>{{ $rel->Religion }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_religion_error">Religion is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="edit_bdate">Birth date</label>
                    <input id="edit_bdate" name="edit_bdate" type="text" class="form-control flatpickr" value="{{ $applicant[0]->Birthdate }}">
                    <label class="invalid-feedback" id="edit_bdate_error">Birth date is required.</label>
                    <label class="invalid-feedback" id="edit_age_error">Applicant must be at least 18 years old.</label>
                </div>
                <div class="col-md-5">
                    <label for="edit_bprov">Birth Province</label>
                    <select id="edit_bprov" name="edit_bprov" class="form-control edit-app-select2"
                        data-placeholder="Select birth province">
                        <option></option>
                        @foreach ($province as $prov)
                        @php
                        $select = ($applicant[0]->BirthProv_ID == $prov->Province_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $prov->Province_ID }} {{ $select }}>{{ $prov->Province }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_bprov_error">Birth province is required.</label>
                </div>
                <div class="col-md-5 {{ $applicant[0]->BirthProv_ID == 2000 ? 'd-none' : '' }}">
                    <label for="edit_bmun">Birth Municipal</label>
                    <select id="edit_bmun" name="edit_bmun" class="form-control edit-app-select2"
                        data-placeholder="Select birth municipal"">
                        <option></option>
                        @foreach ($bmunicipal as $bmun)
                        @php
                        $select = ($applicant[0]->BirthTown_ID == $bmun->Municipal_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $bmun->Municipal_ID }} {{ $select }}>{{ $bmun->Municipal }}</option>
                        @endforeach
                    </select>
                    <label class=" invalid-feedback" id="edit_bmun_error">Birth municipal is required.</label>
                </div>
                <div class="col-md-5 {{ $applicant[0]->BirthProv_ID == 2000 ? '' : 'd-none' }}">
                    <label for="edit_bothers">Birth Municipal</label>
                    <input id="edit_bothers" name="edit_bothers" type="text" class="form-control"
                        placeholder="Other municipal" value="{{ $applicant[0]->BirthTown }}">
                    <label class="invalid-feedback" id="edit_birthoth_error">Birth municipal is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="edit_address">Home address</label>
                    <input id="edit_address" name="edit_address" type="text" class="form-control" value="{{ $applicant[0]->HomeAdd }}">
                    <label class="invalid-feedback" id="edit_add_error">Home address is required.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="edit_province">Province</label>
                    <select id="edit_province" name="edit_province" class="form-control edit-app-select2"
                        data-placeholder="Select province">
                        <option></option>
                        @foreach ($province as $prov)
                        @php
                        $select = ($applicant[0]->Province_ID == $prov->Province_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $prov->Province_ID }} {{ $select }}>{{ $prov->Province }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_prov_error">Province is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="edit_municipal">Municipal</label>
                    <select id="edit_municipal" name="edit_municipal" class="form-control edit-app-select2"
                        data-placeholder="Select municipal">
                        <option></option>
                        @foreach ($municipal as $mun)
                        @php
                        $select = ($applicant[0]->Municipal_ID == $mun->Municipal_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $mun->Municipal_ID }} {{ $select }}>{{ $mun->Municipal }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_mun_error">Municipal is required.</label>
                </div>
                <div class="col-md-4">
                    <label for="edit_barangay">Barangay</label>
                    <select id="edit_barangay" name="edit_barangay" class="form-control edit-app-select2"
                        data-placeholder="Select barangay">
                        <option></option>
                        @foreach ($barangay as $brgy)
                        @php
                        $select = ($applicant[0]->Brgy_ID == $brgy->Barangay_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $brgy->Barangay_ID }} {{ $select }}>{{ $brgy->Barangay }}</option>
                        @endforeach
                    </select>
                    <label class="invalid-feedback" id="edit_brgy_error">Barangay is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="edit_taxcode">Tax Code</label>
                    <select id="edit_taxcode" name="edit_taxcode" class="form-control d-none"
                        data-placeholder="Select tax code" disabled>
                        <option></option>
                        @foreach ($taxcode as $tc)
                        @php
                        $select = ( $applicant[0]->TaxCode_ID == $tc->TaxCode_ID ) ? 'selected=selected' : '';
                        @endphp
                        <option value={{ $tc->TaxCode_ID }} {{ $select }}>{{ $tc->TaxCode }}</option>
                        @endforeach
                    </select>
                    <input id="display_edit_taxcode" name="display_edit_taxcode" type="text" class="form-control" value="{{ $applicant[0]->TaxCode }}" disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="edit_dependent">Dependent(s)</label>
                    <input id="edit_dependent" name="edit_dependent" type="text" class="form-control" value="{{ $applicant[0]->NoDependent }}">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Government Identity</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="edit_tin">TIN</label>
                    <input id="edit_tin" name="edit_tin" type="text" placeholder="xx-xxxxxxx" class="form-control"
                        maxlength="9" value="{{ $applicant[0]->TIN }}">
                    <label class="invalid-feedback" id="edit_tin_length_error">TIN requires 9 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="edit_sss">SSS Number</label>
                    <input id="edit_sss" name="edit_sss" type="text" placeholder="xx-xxxxxxx-x" class="form-control"
                        maxlength="10" value="{{ $applicant[0]->SSS }}">
                    <label class="invalid-feedback" id="edit_sss_length_error">SSS number requires 10 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="edit_hdmf">HDMF Number</label>
                    <input id="edit_hdmf" name="edit_hdmf" type="text" placeholder="xxxx-xxxx-xxxx" class="form-control"
                        maxlength="12" value="{{ $applicant[0]->HDMF }}">
                    <label class="invalid-feedback" id="edit_hdmf_length_error">HDMF number requires 12 digits.</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="edit_philhealth">Philhealth Number</label>
                    <input id="edit_philhealth" name="edit_philhealth" type="text" placeholder="xxxx-xxxx-xxxx"
                        class="form-control" maxlength="12" value="{{ $applicant[0]->PhilHealth }}">
                    <label class="invalid-feedback" id="edit_philhlength_error">Philhealth number requires 12 digits.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="text-right">
        <button type="button" id="btn_update_applicant" class="btn btn-primary mt-2">Save changes</button>
    </div>
</form>