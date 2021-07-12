<form id="form_filter_applicants">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="filter_fname">First Name</label>
                <input id="filter_fname" name="filter_fname" type="text" class="form-control" value="{{ $fname }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="filter_mname">Middle Name</label>
                <input id="filter_mname" name="filter_mname" type="text" class="form-control" value="{{ $mname }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="filter_lname">Last Name</label>
                <input id="filter_lname" name="filter_lname" type="text" class="form-control" value="{{ $lname }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="filter_position">Position applied</label>
                <input id="filter_position" name="filter_position" type="text" class="form-control" value="{{ $position }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="filter_address">Address</label>
                <input id="filter_address" name="filter_address" type="text" class="form-control" value="{{ $address }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="filter_apply_date">Apply date</label>
                <input id="filter_apply_date" name="filter_apply_date" type="text" class="form-control filter-flatpickr" value="{{ $applydate }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="filter_encode_date">Encode date</label>
                <input id="filter_encode_date" name="filter_encode_date" type="text" class="form-control filter-flatpickr" value="{{ $encodedate }}">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div>
            <button type="button" id="btn_filter_app_reset" class="btn btn-light waves-effect waves-light">Reset filter</button>
        </div>
        <div>
            <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Close</button>
            <button type="button" id="btn_filter_applicants" class="btn btn-primary waves-effect waves-light">Apply</button>
        </div>
    </div>
</form>