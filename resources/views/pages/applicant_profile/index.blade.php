@extends('layouts.main')

@section('body-extra')
@endsection

@section('content')

<div id="preloader">
    <div id="status">
        <div class="spinner">Loading...</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant Tracking System</a></li>
                        <li class="breadcrumb-item active">Applicant Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Applicant Profile</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg nav-justified main-profile-tab">
                    <li class="nav-item">
                        <a href="#basicinfo" data-toggle="tab" aria-expanded="false" class="nav-link text-nowrap active">
                            Basic Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#educexp" data-toggle="tab" aria-expanded="true" class="nav-link text-nowrap">
                            Educational background & Experiences
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#traininterview" data-toggle="tab" aria-expanded="false" class="nav-link text-nowrap">
                            Trainings & Interviews
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#employment" id="tab_employment" data-toggle="tab" aria-expanded="false" class="nav-link text-nowrap {{ $applicant[0]->HireStatus_ID != 2 ? '' : 'disabled' }}">
                            Employment
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card-box text-center">
                <img src="{{asset('assets/images/app_thumbnail.jpg')}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                <h4 class="mb-0" id='appFullname'>{{ $applicant[0]->LastName }}, {{ $applicant[0]->FirstName }} {{ $applicant[0]->MiddleName }}</h4>
                <p class="text-muted">{{ $applicant[0]->Position }}</p>
                @if( $applicant[0]->isDeployed == 1 )
                <div class="mb-2">
                    <span class="badge badge-success">Deployed</span>
                </div>
                @endif
                @if( $applicant[0]->isWithRequirements == 1 && $applicant[0]->isDeployed == 0  && $applicant[0]->EmployeeNo != NULL && $applicant[0]->EmployeeNo /* && $employment[0]->Record_ID != NULL */ && $employment[0]->OnBoardingDate)
                    @if(MyHelper::checkPosition($applicant[0]->Position_ID) || (!MyHelper::checkPosition($applicant[0]->Position_ID) && $employment[0]->AFHDate != NULL))
                    <button type="button" id="btn_tag_deploy" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click this button to tag as deployed" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Deploy?</button>
                    @endif
                @endif
                @if( $applicant[0]->isWithRequirements == 0 && $reqvisible == TRUE)
                <button type="button" id="btn_tag_complete_req" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click this button to tag as complete requirements" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Complete requirements?</button>
                @endif
                @if( $applicant[0]->isWithRequirements == 1 && $applicant[0]->isDeployed == 0 )
                <button type="button" id="btn_untag_complete_req" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click this button to tag as incomplete requirements" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Incomplete requirements?</button>
                @endif
                @if( $applicant[0]->isWithRequirements == 1 || $applicant[0]->isDeployed == 1 )
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-xs btn-light dropdown-toggle waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-printer"></i> Print <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" target="_blank" href="{{ URL::to('/app-rec/show/' . $applicant[0]->Applicant_ID) }}">Applicant Record</a>
                        <a class="dropdown-item" target="_blank" href="{{ URL::to('/org-app/show/' . $applicant[0]->Applicant_ID . '/' . $employment[0]->AssignCat_ID) }}">Original Appointment</a>
                        <a class="dropdown-item" target="_blank" href="{{ URL::to('/emp-rec/show/' . $applicant[0]->Applicant_ID) }}">Employee Record</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-box">
                <h5 class="header-title text-uppercase mb-3"></i>Employment status</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap table-centered table-info-profile mb-0">
                        <tbody>
                            @php $icon = Myhelper::appStatusIcon($applicant[0]->HireStatus_ID); @endphp
                            <tr>
                                <td class="px-0">
                                    <i class="mdi {{ $icon }} mdi-24px mdi-set"></i>
                                </td>
                                <td class="col">
                                    <div><span>Application status</span></div>
                                    <div class="text-muted">{{ ucfirst(strtolower($applicant[0]->HireStatus)) }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <i class="mdi {{ $intinfo['icon'] }} mdi-24px mdi-set"></i>
                                </td>
                                <td class="col">
                                    <div><span>Interview</span></div>
                                    <div class="text-muted">{{ $intinfo['text'] }}</div>
                                </td>

                            </tr>
                            @php $reqicon = Myhelper::reqIcon($applicant[0]->isWithRequirements); @endphp
                            <tr>
                                <td class="px-0">
                                    <span><i class="mdi {{ $reqicon }} mdi-24px mdi-set"></i></span>
                                </td>
                                <td class="col">
                                    <div><span>Requirements</span></div>
                                    <div class="text-muted">{{ $applicant[0]->isWithRequirements == 1 ? 'Complete' : 'Incomplete' }}</div>
                                </td>
                            </tr>
                            @php $medicon = Myhelper::medicalResultIcon($employment[0]->ResultType); @endphp
                            <tr>
                                <td class="px-0">
                                    <span><i class="mdi {{ $medicon }} mdi-24px mdi-set"></i></span>
                                </td>
                                <td class="col">
                                    <div><span>Medical result</span></div>
                                    <div class="text-muted">{{ strlen($employment[0]->ResultType) == 0 ? 'No record' : ucwords(strtolower($employment[0]->ResultTypeName)) }}</div>
                                </td>
                            </tr>
                            @if (Myhelper::checkPosition($applicant[0]->Position_ID))
                            <tr>
                                <td class="px-0">
                                    <i class="mdi {{ $traininginfo['icon'] }} mdi-24px mdi-set"></i>
                                </td>
                                <td class="col">
                                    <div><span>Training status</span></div>
                                    <div class="text-muted">{{ $traininginfo['text'] }}</div>
                                </td>
                            </tr>
                            @else
                            @php $afhicon = Myhelper::AFHIcon($employment[0]->AFHDate); @endphp
                            <tr>
                                <td class="px-0">
                                    <i class="mdi {{ $afhicon }} mdi-24px mdi-set"></i>
                                </td>
                                <td class="col">
                                    <div><span>Approval for Hiring</span></div>
                                    <div class="text-muted">@if($employment[0]->AFHDate) Approved @else Not yet approved @endif</div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-box">
                <h5 class="header-title text-uppercase mb-3">Contact
                    <a href="javascript: void(0);" data-toggle="modal" data-target="#modal_new_contact" data-appid="{{ $applicant[0]->Applicant_ID }}"
                        class="float-right"><i class="mdi mdi-plus-thick"></i></a>
                </h5>
                <div class="table-responsive" id="contact-card-body">
                    <table class="table text-nowrap table-centered table-info-profile mb-0" id="table-contact">
                        <tbody>
                            @if(count($appcon) > 0)
                            @foreach ($appcon as $ac)
                            @php $icon = Myhelper::contactIcon($ac->ContactType_ID) @endphp
                            <tr>
                                <td class="px-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-soft-secondary text-secondary font-20 rounded-circle">
                                            <i class="{{ $icon }} mdi-24px mdi-set"></i>
                                        </span>
                                    </div>
                                </td>
                                <td class="col">
                                    <div>
                                        <span>{{ $ac->Contact }}</span>
                                    </div>
                                    <div>
                                        <span class="text-muted">{{ $ac->ContactType }}</span>
                                    </div>
                                </td>
                                <td class="pr-0">
                                    <a href="javascript: void(0);" class="font-18" data-toggle="modal" data-target="#modal_edit_contact" data-cid="{{ $ac->ApplicantContact_ID }}">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="col pr-0 pl-0">
                                    <span>No records found...</span>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content p-0">
                <div class="tab-pane fade active show" id="basicinfo">
                    <div class="card-box">
                        @include('pages.applicant_profile.tabs_content.edit_applicant')
                    </div>
                </div>
                <div class="tab-pane fade" id="educexp">
                    <div class="card-box" id="educexp_tab_body">
                        @include('pages.applicant_profile.tabs_content.educ_experience')
                    </div>
                </div>
                <div class="tab-pane fade" id="traininterview">
                    <div class="card-box" id="traininterview_tab_body">
                        @include('pages.applicant_profile.tabs_content.interview_training')
                    </div>
                </div>
                <div class="tab-pane fade" id="employment">
                    <div class="card-box">
                        @include('pages.applicant_profile.tabs_content.employment_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="hidden_AppID" id="hidden_AppID" value="{{ $applicant[0]->Applicant_ID }}">
<input type="hidden" name="hidden_HireID" id="hidden_HireID" value="{{ $applicant[0]->Hire_ID }}">
<input type="hidden" name="hidden_ParentProgID" id="hidden_ParentProgID" value="{{ $traininginfo['parent'] }}">

@include('pages.applicant_profile.modals.new_app_contact')
@include('pages.applicant_profile.modals.edit_app_contact')
@include('pages.applicant_profile.modals.new_app_educ')
@include('pages.applicant_profile.modals.edit_app_educ')
@include('pages.applicant_profile.modals.new_app_exp')
@include('pages.applicant_profile.modals.edit_app_exp')
@include('pages.applicant_profile.modals.new_app_training')
@include('pages.applicant_profile.modals.app_training_details')

@endsection

@section('js')
    <script src="{{asset('assets/js/custom/pages/profile.js')}}"></script>
@endsection
