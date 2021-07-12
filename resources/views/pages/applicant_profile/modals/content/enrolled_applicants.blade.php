<div class="row mb-2">
    <div class="col-md-12">
        <div class="text-left">
            <button type="button" id="btn-back-to-programs" class="btn btn-primary waves-effect waves-light">
                <span class="btn-label"><i class="mdi mdi-chevron-left"></i></span>Back to programs
            </button>
        </div>
    </div>
</div>
@if(count($applicants) > 0)
<table id="tbl_enrolled_app" class="table table-centered w-100 nowrap">    
    <thead class="thead-light">
        <tr>
            <th class="text-center">Action</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>Province</th>
            <th>Municipal</th>
            <th>Contact</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applicants as $app)
        <tr>
            <td class="text-center">
                <a href="javascript:void(0);" class="action-icon text-primary link-enrolled-remove-app" data-appid="{{ $app->Applicant_ID }}" data-progid="{{ $app->Program_ID }}"><i class="mdi mdi-account-remove"></i></a>
            </td>
            <td>{{ $app->FullName }}</td>
            <td>{{ $app->Gender }}</td>
            <td>{{ $app->Birthdate }}</td>
            <td>{{ $app->Address }}</td>
            <td>{{ $app->Province }}</td>
            <td>{{ $app->Municipal }}</td>
            <td>{{ $app->Contacts }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<table class="table table-centered w-100 mb-0 nowrap">  
    <tbody>
        <tr>
            <td>No data available...</td>
        </tr>
    </tbody>
</table>
@endif