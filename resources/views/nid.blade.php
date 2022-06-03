{{-- <div class="mb-3">
    <label class="form-label" for="applicant-id">Applicant ID</label>
    <input type="text" class="form-control" id="applicant-id" name="applicant-id" value="{{request('id')}}" readonly>
  </div> --}}
{{-- <div class="mb-3">
  <label class="form-label" for="doc-type">Document Type</label>
  <select class="form-select" id="doc-type" name="document-type" required>
    <option selected value="">Choose...</option>
    <option value="National Id Card">National Id Card</option>
    <option value="Passport">Passport</option>
  </select>
</div> --}}
<div class="mb-3">
    <label class="form-label" for="applicant-id">Type</label>
    <input type="text" class="form-control" id="applicant-id" name="National-Id" value="National Id" readonly>
</div>
<div class="mb-3">
  <label class="form-label" for="front-doc">Front Side</label>
  <input type="file" class="form-control" id="front-doc" name="nid-front-side" required>
</div>
<div class="mb-3">
  <label class="form-label" for="back-doc">Back Side</label>
  <input type="file" class="form-control" id="back-doc" name="nid-back-side" required>
</div>
