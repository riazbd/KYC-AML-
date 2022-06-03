<div>
    <form class="w-50 ms-5" action="{{ route('create-hook') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="hook-name" class="form-label">Name</label>
          <input type="text" class="form-control" id="hook-name" name="hook-name" value="">
        </div>
        <div class="mb-3">
            <label for="receiver" class="form-label">Receiver</label>
            <input type="text" class="form-control" id="receiver" name="receiver" value="">
          </div>
          <div class="mb-3">
            <label for="target" class="form-label">Target</label>
            <input type="text" class="form-control" id="target" name="target">
          </div>
          <div class="mb-3">
            <label for="applicant-type" class="form-label">Applicant Type</label>
            <Select class="form-control" id="applicant-type" name="applicant-type">
                <option value="">Choose...</option>
                <option value="Indivisual">Individual</option>
                <option value="Company">Company</option>
            </Select>
          </div>
          <div class="mb-3">
            <label for="types" class="form-label">Types</label>
            <div class="ms-3">
                <div><label><input type="checkbox" name="types[]" value="applicant pending"> Applicant Pending</label></div>
                <div><label><input type="checkbox" name="types[]" value="appicant reviewed"> Applicant Reviewed</label></div>

            </div>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Try to resend</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="resend" id="yes" value="1">
                <label class="form-check-label" for="yes">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="resend" id="no" value="0">
                <label class="form-check-label" for="no">
                  No
                </label>
              </div>
          </div>

        <button type="submit" class="btn btn-info">Save</button>
      </form>
</div>
