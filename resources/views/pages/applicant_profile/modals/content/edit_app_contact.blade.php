<form id="form_edit_contact">
    @csrf
    <input type="hidden" name="app_contact_ID" id="app_contact_ID" value="{{ $details[0]->ApplicantContact_ID }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_contact_type">Contact Type</label>
                <select name="edit_contact_type" id="edit_contact_type" data-placeholder="Select contact type" class="form-control contact-select2">
                    <option></option>
                    @foreach ($contype as $cs)
                    @php
                    $select = ($details[0]->ContactType_ID == $cs->ContactType_ID ) ? 'selected=selected' : '';
                    @endphp
                    <option value="{{ $cs->ContactType_ID }}" {{ $select }}>{{ $cs->ContactType }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="edit_contact_type_error">Contact type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_contact">Contact</label>
                <input type="text" name="edit_contact" id="edit_contact" class="form-control" value="{{ $details[0]->Contact }}">
                <label class="invalid-feedback" id="edit_contact_error"></label>
            </div>
        </div>
    </div>
</form>