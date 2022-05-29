<div class="container bg-light mt-3 p-4">
    <h2 class="text-center mb-4">Please submit your documents.</h2>

	<form method="POST" enctype="multipart/form-data" class="w-50 mx-auto" action="{{ url('upload-document') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="applicant-id">Applicant ID</label>
            <input type="text" class="form-control" id="applicant-id" name="applicant-id" value="{{request('id')}}" readonly>
          </div>
		<div class="mb-3">
		  <label class="form-label" for="doc-type">Document Type</label>
		  <select class="form-select" id="doc-type" name="document-type" required>
			<option selected value="">Choose...</option>
			<option value="National Id Card">National Id Card</option>
			<option value="Passport">Passport</option>
		  </select>
		</div>
		<div class="mb-3">
		  <label class="form-label" for="front-doc">Front Side</label>
		  <input type="file" class="form-control" id="front-doc" name="front-side" required>
		</div>
		<div class="mb-3">
		  <label class="form-label" for="back-doc">Back Side</label>
		  <input type="file" class="form-control" id="back-doc" name="back-side" required>
		</div>

		<button type="submit" class="btn btn-info">Upload</button>
	</form>

</div>
