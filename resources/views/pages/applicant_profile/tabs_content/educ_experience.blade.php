<h5 class="header-title text-uppercase ">First Job?
</h5>
<div class="row mb-3">
    <div class="col-md-2">
        <select name="first_job" id="first_job" data-placeholder="Select school type" class="form-control employment-select2-no-search" data-appid="{{ $applicant[0]->Applicant_ID }}">
            <option value="0" @if($applicant[0]->FirstJob == 0) selected @endif>No</option>
            <option value="1" @if($applicant[0]->FirstJob == 1) selected @endif>Yes</option>
        </select>
    </div>
</div>


<h5 class="header-title text-uppercase mb-3">Educational background
    <a href="javascript: void(0);" data-toggle="modal" data-target="#modal_new_education" data-appid="{{ $applicant[0]->Applicant_ID }}"
        class="float-right"><i class="mdi mdi-plus-thick"></i></a>
</h5>
<div class="table-responsive">
    <table class="table text-nowrap table-centered table-info-profile">
        <tbody>
            @if(count($appschool) > 0)
            @foreach ($appschool as $as)
            <tr>
                <td class="px-0">
                    <div class="avatar-md">
                        <span class="avatar-title bg-soft-secondary text-secondary font-20 rounded-circle">
                            <i class="mdi mdi-school mdi-36px mdi-set"></i>
                        </span>
                    </div>
                </td>
                <td class="col">
                    <div>
                        <span class="font-weight-bold">{{ $as->School }}</span>
                    </div>
                    <div>
                        @if ($as->SchoolType_ID != 1)
                        @php
                        $sctypecourse = $as->SchoolType . ' - ' . $as->Course;
                        @endphp
                        @else
                        @php
                        $sctypecourse = $as->SchoolType;
                        @endphp
                        @endif
                        <span>{{ $sctypecourse }}</span>
                    </div>
                    <div>
                        <span class="text-muted font-11">{{ date("F d, Y", strtotime($as->YrFrom)) }} - {{ date("F d, Y", strtotime($as->YrTo)) }}</span>
                    </div>
                </td>
                <td class="px-0">
                    <a href="javascript: void(0);" class="font-18" data-toggle="modal" data-target="#modal_edit_education" data-eid="{{ $as->ApplicantSchool_ID }}">
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="col">
                    <span>No records found...</span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<h5 class="header-title text-uppercase mb-3">Work Experience
    <a href="javascript: void(0);" data-toggle="modal" data-target="#modal_new_experience" data-appid="{{ $applicant[0]->Applicant_ID }}"
        class="float-right"><i class="mdi mdi-plus-thick"></i></a>
</h5>
<div class="table-responsive">
    <table class="table text-nowrap table-centered table-info-profile mb-0">
        <tbody>
            @if(count($appexp) > 0)
            @foreach ($appexp as $ae)
            <tr>
                <td class="px-0">
                    <div class="avatar-md">
                        <span class="avatar-title bg-soft-secondary text-secondary font-20 rounded-circle">
                            <i class="mdi mdi-office-building mdi-36px mdi-set"></i>
                        </span>
                    </div>
                </td>
                <td class="col">
                    <div>
                        <span class="font-weight-bold">{{ $ae->Position }}</span>
                    </div>
                    <div>
                        <span>{{ $ae->Employer }}</span>
                    </div>
                    <div>
                        <span class="text-muted font-11">{{ $ae->MonthFrom }} @if($ae->ExpDayFrom){{ $ae->ExpDayFrom . ',' }}@endif {{ $ae->ExpYrFrom }} - {{ $ae->MonthTo }} @if($ae->ExpDayTo){{ $ae->ExpDayTo . ','}}@endif {{ $ae->ExpYrTo }}</span>
                    </div>
                </td>
                <td class="px-0">
                    <a href="javascript: void(0);" class="font-18" data-toggle="modal" data-target="#modal_edit_experience" data-expid="{{ $ae->PreviousWork_ID }}">
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="col">
                    <span>No records found...</span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
