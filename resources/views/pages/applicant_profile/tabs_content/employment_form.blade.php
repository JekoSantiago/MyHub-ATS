<form id="form_edit_employment">
    @csrf
    <input type="hidden" id="edit_employmentID" name="edit_employmentID" value="{{ $employment[0]->Hire_ID }}">
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Employment Information</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_ass_cat">Assignment category</label>
                    <select id="edit_emp_ass_cat" name="edit_emp_ass_cat" class="form-control employment-select2-no-search"
                        data-placeholder="Select category" {{ $empdisable }}>
                        <option></option>
                        @foreach ($asscat as $ac)
                        @php
                        $select = ($employment[0]->AssignCat_ID == $ac->AssignCat_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $ac->AssignCat_ID }} {{ $select }}>{{ $ac->AssignCat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_empno">Employee number</label>
                    <input id="edit_emp_empno" name="edit_emp_empno" type="text" placeholder="xxxxxxxxx-x"
                        class="form-control" maxlength="10" value="{{ $employment[0]->EmployeeNo }}" {{ $empdisable }}>
                    <label class="invalid-feedback" id="edit_emp_empno_error"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_datehire">Date hired</label>
                    <input id="edit_emp_datehire" name="edit_emp_datehire" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->DateHired }}" {{ $empdisable }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_dateend">Date end <span class="text-muted">(For seasonal
                            employees)</span></label>
                    <select name="edit_emp_dateend" id="edit_emp_dateend" class="form-control employment-select2-no-search" data-placeholder="Select date" {{ $empdisable == '' && $employment[0]->AssignCat_ID == 2 ? '' : 'disabled' }}>
                        <option></option>
                        @if( $employment[0]->DateHired != '')
                        @php
                        $select30 = ($employment[0]->Seasonal_DateHired_To == Myhelper::addDaysToDate($employment[0]->DateHired, 30) ) ? 'selected=selected' : '';
                        $select60 = ($employment[0]->Seasonal_DateHired_To == Myhelper::addDaysToDate($employment[0]->DateHired, 60) ) ? 'selected=selected' : '';
                        $select90 = ($employment[0]->Seasonal_DateHired_To == Myhelper::addDaysToDate($employment[0]->DateHired, 90) ) ? 'selected=selected' : '';
                        @endphp
                            <option value="{{ Myhelper::addDaysToDate($employment[0]->DateHired, 30) }}" {{ $select30 }}>{{ Myhelper::addDaysToDate($employment[0]->DateHired, 30) . ' (30 Days)' }}</option>
                            <option value="{{ Myhelper::addDaysToDate($employment[0]->DateHired, 60) }}" {{ $select60 }}>{{ Myhelper::addDaysToDate($employment[0]->DateHired, 60) . ' (60 Days)' }}</option>
                            <option value="{{ Myhelper::addDaysToDate($employment[0]->DateHired, 90) }}" {{ $select90 }}>{{ Myhelper::addDaysToDate($employment[0]->DateHired, 90) . ' (90 Days)' }}</option>
                        @endif
                    </select>
                    <label class="invalid-feedback" id="edit_emp_dateend_error">Date end for seasonal employees is required.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_company">Company</label>
                    <select id="edit_emp_company" name="edit_emp_company" class="form-control employment-select2-no-search"
                        data-placeholder="Select company" {{ $othdisable }}>
                        <option></option>
                        @foreach ($company as $comp)
                        @php
                        $select = ($employment[0]->Company_ID == $comp->Company_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $comp->Company_ID }} {{ $select }}>{{ $comp->Company }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_location">Location</label>
                    <select id="edit_emp_location" name="edit_emp_location" class="form-control employment-select2"
                        data-placeholder="Select location" {{ $othdisable }}>
                        <option></option>
                        @foreach ($location as $loc)
                        @php
                        $select = ($employment[0]->Location_ID == $loc->Location_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $loc->Location_ID }} {{ $select }}>{{ $loc->Location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_superior">Superior</label>
                    <select id="edit_emp_superior" name="edit_emp_superior" class="form-control employment-select2"
                        data-placeholder="Select superior" {{ $othdisable }}>
                        <option></option>
                        @foreach ($superior as $sup)
                        @php
                        $select = ($employment[0]->SuperiorID == $sup->Employee_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $sup->Employee_ID }} {{ $select }}>{{ $sup->FullName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_PRF">PRF Control Number</label>
                    @if($employment[0]->isDeployed == 1)
                    <input id="edit_emp_PRF" name="edit_emp_PRF" type="hidden" class="form-control" value="{{ $employment[0]->Record_ID }}" {{ $empdisable }}>
                    <input type="text" class="form-control" value="{{ $prfDep }}">
                    @else
                    <select id="edit_emp_PRF" name="edit_emp_PRF" class="form-control employment-select2"
                        data-placeholder="Select PRF">
                        <option></option>
                        @foreach ($prf as $pr)
                        @php
                        $select = ($employment[0]->Record_ID == $pr->Record_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $pr->Record_ID }} {{ $select }}>{{ $pr->ControllNumber }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Payroll Information</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_paytype">Type</label>
                    <input id="edit_emp_paytype" name="edit_emp_paytype" type="text" class="form-control" value="{{ $employment[0]->PayrollType }}" {{ $othdisable }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_paymode">Mode<span class="text-muted"></span></label>
                    <select id="edit_emp_paymode" name="edit_emp_paymode" class="form-control employment-select2-no-search"
                        data-placeholder="Select payroll mode" {{ $othdisable }}>
                        <option></option>
                        @foreach ($paymode as $prm)
                        @php
                        $select = ($employment[0]->PayrollMode_ID == $prm->PayrollMode_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $prm->PayrollMode_ID }} {{ $select }}>{{ $prm->PayrollMode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_basic">Basic</label>
                    <input id="edit_emp_basic" name="edit_emp_basic" type="number" class="form-control" value="{{ $employment[0]->Basic }}" {{ $othdisable }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_cola">Cola</label>
                    <input id="edit_emp_cola" name="edit_emp_cola" type="number" class="form-control" value="{{ $employment[0]->COLA }}" {{ $othdisable }}>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="edit_emp_bank">Bank</label>
                    <select id="edit_emp_bank" name="edit_emp_bank" class="form-control employment-select2-no-search"
                        data-placeholder="Select bank">
                        <option></option>
                        @php
                        $select = ($employment[0]->Bank_ID == 1 ) ? 'selected=selected' : '';
                        @endphp
                        <option value=1 {{ $select }}>BDO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="edit_emp_bank_code">Bank Branch code</label>
                    <input id="edit_emp_bank_code" name="edit_emp_bank_code" type="text" class="form-control" maxlength="5" value="{{ $employment[0]->BankCode }}">
                    <label class="invalid-feedback" id="edit_emp_bank_code_error"></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="edit_emp_acctype">Account Type</label>
                    <select id="edit_emp_acctype" name="edit_emp_acctype" class="form-control employment-select2-no-search"
                        data-placeholder="Select account type">
                        <option></option>
                        @foreach ($accttype as $act)
                        @php
                        $select = ($employment[0]->AcctType == $act->AcctTypeID) ? 'selected=selected' :  ($act->AcctTypeID == 1 ) ?  'selected=selected' : '';
                        @endphp
                            <option value={{ $act->AcctTypeID }} {{ $select }}>{{ $act->AcctType }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_bank_name">Bank Branch Name</label>
                    <input id="edit_emp_bank_name" name="edit_emp_bank_name" type="text" class="form-control" maxlength="16" value="{{ $employment[0]->BankName }}">
                    <label class="invalid-feedback" id="edit_emp_bank_name_error"></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_accno">Account Number</label>
                    <input id="edit_emp_accno" name="edit_emp_accno" type="text" class="form-control" maxlength="12" value="{{ $employment[0]->AcctNo }}">
                    <label class="invalid-feedback" id="edit_emp_accno_error">Account number must be 12 digits</label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Medical Information</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_meddate">Date</label>
                    <input id="edit_emp_meddate" name="edit_emp_meddate" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->DateMedical }}" {{ $othdisable }}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_physician">Physician</label>
                    <input id="edit_emp_physician" name="edit_emp_physician" type="text" class="form-control" value="{{ $employment[0]->Physician }}" {{ $othdisable }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_restype">Result type</label>
                    <select id="edit_emp_restype" name="edit_emp_restype" class="form-control employment-select2-no-search"
                        data-placeholder="Select result type" {{ $othdisable }}>
                        <option></option>
                        @foreach ($result as $res)
                        @php
                        $select = ($employment[0]->ResultType == $res->ResultType_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $res->ResultType_ID }} {{ $select }}>{{ $res->ResultType }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edit_emp_clinic">Clinic</label>
                    <select id="edit_emp_clinic" name="edit_emp_clinic" class="form-control employment-select2"
                        data-placeholder="Select clinic" {{ $othdisable }}>
                        <option></option>
                        @foreach ($clinic as $cli)
                        @php
                        $select = ($employment[0]->Clinic_ID == $cli->Clinic_ID ) ? 'selected=selected' : '';
                        @endphp
                            <option value={{ $cli->Clinic_ID }} {{ $select }}>{{ $cli->Clinic }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $employment[0]->ResultType < 3 ? 'd-none' : '' }}">
                    <label for="edit_emp_resremarks">Result remarks</label>
                    <input id="edit_emp_resremarks" name="edit_emp_resremarks" type="text" class="form-control" value="{{ $employment[0]->Result }}" {{ $othdisable }}>
                    <label class="invalid-feedback" id="edit_emp_resremarks_error">Result remarks is required.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group d-none">
                    <label for="edit_emp_othclinic">Other clinic</label>
                    <input id="edit_emp_othclinic" name="edit_emp_othclinic" type="text" class="form-control" {{ $othdisable }}>
                    <label class="invalid-feedback" id="edit_emp_othclinic_error">Other clinic is required.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <h5 class="mb-3 text-uppercase bg-light p-2">Others</h5>
        <div class="row">
            @if(!MyHelper::checkPosition($applicant[0]->Position_ID))
            <div class="col-md-4">
                <div class="form-group">
                    <label for="app_afh_date">Approved for Hiring Date</label>
                    <input id="app_afh_date" name="app_afh_date" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->AFHDate }}"  {{ $empdisable }}>
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <div class="form-group">
                    <label for="app_ob_date">On-board Date</label>
                    <input id="app_ob_date" name="app_ob_date" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->OnBoardingDate }}" {{ $othdisable }}>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="app_emp_status">Employee Status</label>
                    <select id="app_emp_status" name="app_emp_status" class="form-control employment-select2" data-placeholder="Select Status"  @if($applicant[0]->isDeployed != 1) disabled @endif>
                    <option></option>
                    @foreach ( $empStatus as $stats )
                    @php
                    $select = ($employment[0]->EmploymentStatus_ID == $stats->EmploymentStatus_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value={{ $stats->EmploymentStatus_ID }} {{ $select }}>{{ $stats->EmploymentStatus }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="app_req_date">Requirements Date Submitted</label>
                    <input id="app_req_date" name="app_req_date" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->RequirementsDate }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="app_dep_date">Deployment Date</label>
                    <input id="app_dep_date" name="app_dep_date" type="text" class="form-control employment-flatpickr" value="{{ $employment[0]->DeployDate }}" disabled>
                </div>
            </div>
        </div>

    </fieldset>
    <div class="text-right">
        <button type="button" id="btn_save_employment" class="btn btn-primary mt-2">Save changes</button>
    </div>
</form>
