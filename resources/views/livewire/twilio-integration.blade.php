<div>
    <div class="card p-4 w-50">
        <form action="{{ route('update-twilio-integration', ['id' => Auth::user()->first()->twilio()->first()->id ]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="sid" class="form-label">Sid</label>
                <input type="text" class="form-control" id="sid" name="sid" value="{{ Auth::user()->twilio()->first()->sid }}">
            </div>
            <div class="mb-3">
                <label for="auth-token" class="form-label">Auth Tokenb</label>
                <input type="text" class="form-control" id="auth-token" name="auth-token" value="{{ Auth::user()->twilio()->first()->auth_token }}">
            </div>
            <div class="mb-3">
                <label for="from-number" class="form-label">'From' Number</label>
                <input type="text" class="form-control" id="from-number" name="from-number" value="{{ Auth::user()->twilio()->first()->from_number }}">
            </div>

            <button type="submit" class="btn btn-info">Save</button>
        </form>
    </div>
</div>
