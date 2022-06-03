<div>
    <div class="card p-4 w-50">
        <form action="{{ route('create-level-controller') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="level-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="level-name" name="level-name" value="">
            </div>

            <div class="mb-3">
                <label for="types" class="form-label">Steps</label>
                <div class="ms-3">
                    <div><label><input type="checkbox" name="types[]" value="NID"> NID</label></div>
                    <div><label><input type="checkbox" name="types[]" value="Passport"> Passport</label></div>
                    <div><label><input type="checkbox" name="types[]" value="email"> Email</label></div>
                    <div><label><input type="checkbox" name="types[]" value="Selfie"> Selfie</label></div>

                </div>
            </div>

            <button type="submit" class="btn btn-info">Save</button>
        </form>
    </div>
</div>
