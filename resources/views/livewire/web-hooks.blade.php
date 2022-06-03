<div>
    <div class="mt-5"><a href="{{ route('create-web-hooks') }}" class="btn btn-success">Create Web Hook</a></div>

    <div class="mt-5">
        @if (count(Auth::user()->webHooks()->get()) > 0)
            @foreach ( Auth::user()->webHooks()->get() as $hook)
            <div class="ms-5 mt-5">

                <div class="card w-50 p-4">
                    <form class="" action="{{ route('update-hook', ['id' => $hook->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="hook-name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="hook-name" name="hook-name" value="{{ $hook->hook_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="receiver" class="form-label">Receiver</label>
                            <input type="text" class="form-control" id="receiver" name="receiver" value="{{ $hook->reciever }}">
                          </div>
                          <div class="mb-3">
                            <label for="target" class="form-label">Target</label>
                            <input type="text" class="form-control" id="target" name="target" value="{{ $hook->target }}">
                          </div>
                          <div class="mb-3">
                            <label for="applicant-type" class="form-label">Applicant Type</label>
                            <Select class="form-control" id="applicant-type" name="applicant-type">
                                <option value="">Choose...</option>
                                <option value="individual" {{ $hook->applicant_type == 'individual' ? 'selected' : '' }}>Individual</option>
                                <option value="company" {{ $hook->applicant_type == 'company' ? 'selected' : '' }}>Company</option>
                            </Select>
                          </div>
                          <div class="mb-3">
                            <label for="types" class="form-label">Types</label>
                            <div class="ms-3">

                                <div><label><input type="checkbox" name="types[]" value="applicant pending" {{ in_array("applicant pending", $hook->types) ? 'checked' : '' }}> Applicant Pending</label></div>
                                <div><label><input type="checkbox" name="types[]" value="appicant reviewed" {{ in_array("appicant reviewed", $hook->types) ? 'checked' : '' }}> Applicant Reviewed</label></div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Try to resend</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resend" id="yes" value="1" {{ $hook->will_resend == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="yes">
                                  Yes
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="resend" id="no" value="0" {{ $hook->will_resend == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="no">
                                  No
                                </label>
                              </div>
                          </div>
                        <button type="submit" class="btn btn-info">Update</button>
                      </form>
                </div>
            </div>
            @endforeach

        @endif
    </div>


</div>
