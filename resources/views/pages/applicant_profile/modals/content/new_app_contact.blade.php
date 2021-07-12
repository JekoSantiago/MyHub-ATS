<form id="form_new_contact">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_contact_type">Contact Type</label>
                <select name="new_contact_type" id="new_contact_type" data-placeholder="Select contact type" class="form-control contact-select2">
                    <option></option>
                    @foreach ($contype as $cs)
                    <option value="{{ $cs->ContactType_ID }}">{{ $cs->ContactType }}</option>
                    @endforeach
                </select>
                <label class="invalid-feedback" id="new_contact_type_error">Contact type is required.</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="new_contact">Contact</label>
                <input type="text" name="new_contact" id="new_contact" class="form-control">
                <label class="invalid-feedback" id="new_contact_error"></label>
            </div>
        </div>
    </div>
</form>