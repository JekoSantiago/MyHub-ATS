@if(count($applicants) > 0)
<table id="tbl_enrolled_app" class="table table-centered w-100 nowrap">    
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>Province</th>
            <th>Municipal</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Recommendation</th>
            <th>Remarks</th>
            <th>Contact</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applicants as $app)
        <tr>
            <td>{{ $app->FullName }}</td>
            <td>{{ $app->Gender }}</td>
            <td>{{ $app->Birthdate }}</td>
            <td>{{ $app->Address }}</td>
            <td>{{ $app->Province }}</td>
            <td>{{ $app->Municipal }}</td>
            <td>{{ $app->AveRating }}</td>
            <td>{{ $app->Status }}</td>
            <td>{{ $app->Recommendation }}</td>
            <td>{{ $app->Remarks }}</td>
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