<h4 class="header-title text-uppercase mb-3">Interview</h4>
<div id="rootwizard">
    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
        <li class="nav-item" data-target-form="#first_form">
            <a href="#first" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                <div class="avatar-sm m-auto">
                    <span class="avatar-title bg-white text-secondary font-20 rounded-circle">1</span>
                </div>
            </a>
        </li>
        <li class="nav-item" data-target-form="#second_form">
            <a href="#second" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 {{ $seconddisable }}">
                <div class="avatar-sm m-auto">
                    <span class="avatar-title bg-white text-secondary font-20 rounded-circle">2</span>
                </div>
            </a>
        </li>
        <li class="nav-item" data-target-form="#third_form">
            <a href="#third" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 {{ $thirddisable }}">
                <div class="avatar-sm m-auto">
                    <span class="avatar-title bg-white text-secondary font-20 rounded-circle">3</span>
                </div>
            </a>
        </li>
    </ul>
    <div class="tab-content mb-0 b-0 pt-0">
        <div class="tab-pane fade active show" id="first">
            @include('pages.applicant_profile.tabs_content.first_int_form', ['interview' => $interview])
        </div>
        <div class="tab-pane fade" id="second">
            @include('pages.applicant_profile.tabs_content.second_int_form', ['interview' => $interview])
        </div>
        <div class="tab-pane fade" id="third">
            @include('pages.applicant_profile.tabs_content.third_int_form', ['interview' => $interview])
        </div>
        <div class="text-right">
            <div class="text-right">
                <button type="button" id="btn_save_interview" class="btn btn-primary mt-2">Save changes</button>
            </div>
        </div>
    </div>
</div>
<h4 class="header-title text-uppercase mt-4 mb-3">Trainings
    @if( $traininginfo['bool'] && Myhelper::checkPosition($applicant[0]->Position_ID))
    <a href="javascript: void(0);" data-toggle="modal" data-target="#modal_new_training" data-parentid="{{ $traininginfo['parent'] }}" data-appid="{{ $applicant[0]->Applicant_ID }}"
        style="float: right"><i class="mdi mdi-plus-thick"></i></a>
    @endif
</h4>
<div class="table-responsive">
    <table class="table table-borderless text-nowrap mb-0">
        @if(count($training) > 0)
        <thead class="thead-light">
            <tr>
                <th class="text-center">Actions</th>
                <th>Title</th>
                <th>Date</th>
                <th>Location</th>
                <th>Ratings</th>
                <th>Recommendation</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 1 @endphp
            @foreach ($training as $train)
            <tr>
                <td class="text-center">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_app_training_details" data-appid="{{ $train->Applicant_ID }}" data-progid="{{ $train->Program_ID }}" class="action-icon text-primary"><i class="mdi mdi-eye"></i></a>
                    @if(Myhelper::minusDaysToDate($train->MinDate, 1) > date('Y-m-d') && $train->AveRating == '' && $employment[0]->EmployeeNo == '')
                    <a href="javascript:void(0);" class="action-icon text-primary link-remove-applicant" data-progid="{{ $train->Program_ID }}"><i class="mdi mdi-account-remove"></i></a>
                    @endif
                </td>
                <td>{{ $train->Program }}</td>
                <td>{{ $train->Date }}</td>
                <td>{{ $train->Location }}</td>
                <td class="text-right">{{ $train->AveRating }}</td>
                <td>{{ $train->Recommendation }}</td>
                <td>{{ $train->Remarks }}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td>No records found...</td>
            </tr>
        </tbody>
        @endif
    </table>
</div>
