@extends('layouts.main')

@section('css_plugins')
    <link href="{{asset('assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css"/>
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
                        <li class="breadcrumb-item active">Dashboard</li> 
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-3">
            <div class="card-box bg-pattern">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-blue rounded">
                            <i class="fe-users avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $cardcount[0]->TotalApplicants }}</span></h3>
                            <p class="text-muted mb-0 text-truncate">Total Applicants</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card-box bg-pattern">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-danger rounded">
                            <i class="fe-thumbs-down avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $cardcount[0]->FailedApplicants }}</span></h3>
                            <p class="text-muted mb-0 text-truncate">Failed Applicants</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card-box bg-pattern">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-success rounded">
                            <i class="fe-star-on avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $cardcount[0]->AppDeployed }}</span></h3>
                            <p class="text-muted mb-0 text-truncate">Applicants Deployed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card-box bg-pattern">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-info rounded">
                            <i class="fe-user-plus avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $cardcount[0]->EncodedToday }}</span></h3>
                            <p class="text-muted mb-0 text-truncate">Encoded Today</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-3">
            <div class="card-box h-100">
                <h4 class="header-title mb-3">Top 5 Interview Count</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2">Employee</th>
                                <th>Cluster</th>
                                <th class="text-right">Interview Count</th>
                                <th>Lead</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($intcount as $ic)
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{asset('assets/images/app_thumbnail.jpg')}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal">{{ $ic->FullName }}</h5>
                                        <p class="mb-0 text-muted"><small>{{ $ic->EmployeeNo }}</small></p>
                                    </td>
                                    <td>{{ $ic->HRCluster }}</td>
                                    <td class="text-right">{{ $ic->InterviewCount }}</td>
                                    <td>{{ $ic->LeadName }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card-box h-100">
                <h4 class="header-title mb-3">Applicant Source</h4>
                <div id="app_source_pie" dir="ltr">
                    <div class="alert alert-warning bg-warning text-white border-0" role="alert">
                        This is a <strong>warning</strong> alert—check it out!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 mb-3">
            <div class="card-box h-100">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-xs btn-primary waves-effect waves-light mb-2 mr-1" data-toggle="dropdown"><i class="mdi mdi-filter-menu"></i></button>
                    <div class="dropdown-menu dropdown-usage-filter">
                        <form class="px-4 py-3">
                            <div class="form-group">
                                <label for="filter_usage_emp">Employee</label>
                                <input type="text" class="form-control" id="filter_usage_emp" name="filter_usage_emp" placeholder="Name or number">
                            </div>
                            <div class="form-group">
                                <label for="filter_usage_date">Date range</label>
                                <input type="text" class="form-control dashboard-flatpickr" id="filter_usage_date" name="filter_usage_date">
                            </div>
                            <button type="button" id="btn_filter_usage" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                <h4 class="header-title mb-3">Employee Usage</h4>
                <table  id="tbl_hr_usage" class="table table-borderless table-hover w-100 nowrap table-centered m-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Employee</th>
                            <th>Date</th>
                            <th class="text-right">Total Encoded</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="header-title mb-3">Recent Encoded Applicants</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2">Applicant</th>
                                <th>Status</th>
                                <th>Date applied</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recapp as $rc)
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{asset('assets/images/app_thumbnail.jpg')}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal">{{ $rc->AppName }}</h5>
                                        <p class="mb-0 text-muted"><small>{{ $rc->Position }}</small></p>
                                    </td>
                                    @php
                                        $color = '';
                                            if ($rc->HireStatus_ID == 1) :
                                                $color = 'badge badge-soft-success';
                                            endif;
                                            if ($rc->HireStatus_ID == 2) :
                                                $color = 'badge badge-soft-danger';
                                            endif;
                                            if ($rc->HireStatus_ID == 3) :
                                                $color = 'badge badge-soft-warning';
                                            endif;
                                    @endphp
                                    <td><span class="{{ $color }}">{{ $rc->HireStatus }}</span></td>
                                    <td>{{ Myhelper::convertStringToDate($rc->DateApply) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-box">
                <h4 class="header-title mb-3">Other Reports</h4>
                <a target="_blank" href="{{ URL::to('/app-monitoring/show') }}" class="btn btn-block btn-lg btn-primary waves-effect waves-light">Applicant Monitoring</a>
                <a target="_blank" href="{{ URL::to('/app-source/show') }}" class="btn btn-block btn-lg btn-success waves-effect waves-light">Applicant Source</a>
                <a target="_blank" href="{{ URL::to('/failed-app/show') }}" class="btn btn-block btn-lg btn-danger waves-effect waves-light">Failed Applicants</a>
                <a target="_blank" href="{{ URL::to('/int-count/show') }}" class="btn btn-block btn-lg btn-info waves-effect waves-light">Interview Count</a>
                <a target="_blank" href="{{ URL::to('/trained-app/show') }}" class="btn btn-block btn-lg btn-warning waves-effect waves-light">Trained Applicants</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js_plugins')
    <script src="{{asset('assets/libs/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/libs/c3/c3.min.js')}}"></script>
@endsection

@section('js')
    <script src="{{asset('assets/js/custom/pages/dashboard.js')}}"></script>
@endsection