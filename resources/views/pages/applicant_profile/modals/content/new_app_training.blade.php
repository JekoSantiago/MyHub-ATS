@if(count($trainings) > 0)
<table id="tbl_trainings" class="table table-centered w-100 nowrap">
    <thead class="thead-light">
        <tr>
            <th class="text-center">Action</th>
            <th>Title</th>
            <th>Date</th>
            <th>Location</th>
            <th>Hours</th>
            <th>Slots taken</th>
            <th>Slots available</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainings as $trn)
        <tr>

            <td class="text-center">
                @if($trn->SlotsAvailable != 0 || $trn->SlotsAvailable == null )
                    <a href="javascript: void(0);"
                        class="action-icon text-primary link-add-applicant"
                        data-progid="{{ $trn->Program_ID }}"><i class="mdi mdi-account-plus"></i>
                    </a>
                @endif
                <a href="javascript: void(0);"
                    class="action-icon text-primary link-view-enrolled-app"
                    data-progid="{{ $trn->Program_ID }}" data-parentid="{{ $parentID }}" ><i class="mdi mdi-eye"></i>
                </a>
            </td>
            <td>{{ $trn->Program }}</td>
            <td>{{ $trn->Date }}</td>
            <td>{{ $trn->Location }}</td>
            <td class="text-right">{{ $trn->TotalHours }}</td>
            <td class="text-right">{{ $trn->Attendees }}</td>
            <td class="text-right">{{ $trn->SlotsAvailable }}</td>
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
