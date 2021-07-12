<div class="table-responsive">
    @if(count($trainings) > 0)
    <table id="tbl_training_details" class="table table-centered table-borderless w-100 mb-0 text-nowrap">    
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th class="text-right">Hours</th>
                <th class="text-right">Rating</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @php $trainNo = 1; @endphp
            @foreach ($trainings as $trn)
            <tr>
                <td>{{ $trainNo++ }}</td>
                <td>{{ $trn->Training }}</td>
                <td>{{ $trn->TrainingDate }}</td>
                <td class="text-right">{{ $trn->NoOfHours }}</td>
                <td class="text-right">{{ $trn->Ratings }}</td>
                <td>{{ $trn->Status }}</td>
                <td>{{ $trn->Remarks }}</td>
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
</div>
