@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant Tracking System</a></li>
                        <li class="breadcrumb-item active">Trainings</li> 
                    </ol>
                </div>
                <h4 class="page-title">Trainings</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <form id="form_filter_trainings">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input id="filter_trainings_program" name="filter_trainings_program" type="text" placeholder="Title search" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <div class="form-group mb-0">
                                            <input id="filter_trainings_date" name="filter_trainings_date" type="text" placeholder="Training date range" class="form-control trainings-flatpickr">
                                        </div> --}}
                                        <div class="form-group input-group input-group-merge">
                                            <input type="text" id="filter_trainings_date" name="filter_trainings_date" class="form-control trainings-flatpickr" placeholder="Training date range">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <a href="javascript: void(0);" id="clear_filter_trainings_date"><i class="mdi mdi-close-thick"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="btn_filter_trainings" class="btn btn-primary waves-effect waves-light">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="tbl_all_trainings" class="table table-centered w-100 nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Action</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

@include('pages.trainings.modals.enrolled_applicants')

@endsection

@section('js')
    <script src="{{asset('assets/js/custom/pages/trainings.js')}}"></script>
@endsection