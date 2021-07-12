@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant Tracking System</a></li>
                        <li class="breadcrumb-item active">Applicants</li> 
                    </ol>
                </div>
                <h4 class="page-title">Applicants</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="text-sm-left">
                                    <button type="button" data-toggle="modal" data-target="#modal_new_applicant" class="btn btn-primary waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-plus-circle mr-1"></i>Add applicant</button>
                                </div>
                                <div class="text-sm-right">
                                    <button type="button" class="btn btn-primary waves-effect waves-light mb-2 mr-1" data-toggle="modal" data-target="#modal_filter_applicants"><i class="mdi mdi-filter-menu"></i></button>
                                    {{-- <button type="button" class="btn btn-light waves-effect waves-light mb-2 mr-1">Export</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="tbl_applicants" class="table table-centered w-100 nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Action</th>
                                <th>Applicant name</th>
                                <th>Date applied</th>
                                <th>Application Status</th>
                                <th>Position Applied</th>
                                <th>Department</th>
                                <th>Division</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

@include('pages.applicants.modals.filter')
@include('pages.applicants.modals.new_applicant')

@endsection

@section('js')
    <script src="{{asset('assets/js/custom/pages/applicant.js')}}"></script>
@endsection