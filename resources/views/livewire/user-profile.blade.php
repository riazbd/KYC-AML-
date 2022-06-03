<div class="ms-5">
    <form class="w-50" action="{{ route('edit-profile') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="first-name" class="form-label">First Name</label>
          <input type="text" class="form-control" id="first-name" name="first-name" value="{{ Auth::user()->userProfile->first_name }}">
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="last-name" value="{{ Auth::user()->userProfile->last_name }}">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Change Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        <button type="submit" class="btn btn-info">Update</button>
      </form>
</div>
