<div class="ms-5">
    <h4>Business Information</h1>
    <p>Client: {{ Auth::user()->name }}</p>
    <form class="w-50 ms-5" action="{{ route('edit-detail') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="account-name" class="form-label">Account Name</label>
          <input type="text" class="form-control" id="account-name" name="account-name" value="">
        </div>
        <div class="mb-3">
            <label for="public-business-name" class="form-label">Public Business Name</label>
            <input type="text" class="form-control" id="public-business-name" name="public-business-name" value="">
          </div>
          <div class="mb-3">
            <label for="company-number" class="form-label">Company Number</label>
            <input type="text" class="form-control" id="company-number" name="company-number">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Business Address</label>
            <div class="mb-3"><input type="text" class="form-control" id="country" name="country" placeholder="Country"></div>
            <div class="mb-3"><input type="text" class="form-control" id="street" name="street" placeholder="Street"></div>
            <div class="mb-3"><input type="text" class="form-control" id="street2" name="street2" placeholder="Street(Line 2)"></div>
            <div class="mb-3"><input type="text" class="form-control" id="city" name="city" placeholder="City"></div>
            <div class="mb-3"><input type="text" class="form-control" id="zip" name="zip" placeholder="Postal/ZIP"></div>

          </div>
          <div class="mb-3">
            <label for="legal-mail" class="form-label">Legal Mail</label>
            <input type="email" class="form-control" id="legal-mail" name="legal-mail" value="{{ Auth::user()->accountDetail()->first()->legal_mail }}">
          </div>
          <div class="mb-3">
            <label for="business-website" class="form-label">Business Website</label>
            <input type="text" class="form-control" id="business-website" name="business-website" placeholder="http://website.com">
          </div>

          <div class="mb-3">
            <label for="company-regulations" class="form-label">Company Regulations</label>
            <Select class="form-control" id="company-regulations" name="company-regulations">
                <option value="">Select...</option>
                <option value="1" {{ Auth::user()->accountDetail()->first()->is_regulated == 1 ? 'selected' : '' }}>Company is regulated</option>
                <option value="0" {{ Auth::user()->accountDetail()->first()->is_regulated == 0 ? 'selected' : '' }}>Company is not regulated</option>
            </Select>
          </div>
        <button type="submit" class="btn btn-info">Update</button>
      </form>
</div>
