<div class="container bg-light mt-3 p-4">
    <h2 class="text-center mb-4">Please submit your documents.</h2>

	<form method="POST" enctype="multipart/form-data" class="w-50 mx-auto" action="{{ url('upload-document') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="applicant-id">Applicant ID</label>
            <input type="text" class="form-control" id="applicant-id" name="applicant-id" value="{{request('id')}}" readonly>
          </div>

  {{-- {{ dd(var_dump(App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types)) }} --}}


      @foreach (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types as $key=>$level)
      {{-- @include('nid') --}}
        <div class="tab">
            <h3 class="mt-4 mb-4">{{$level}}</h3>
            @if (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types[$key] == 'NID')
                @include('nid')
            @elseif (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types[$key] == 'email')
                @include('email')
            @elseif (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types[$key] == 'Passport')
                @include('passport')
            @elseif (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types[$key] == 'Selfie')
                @include('selfie')
            @else
                <div>We don't know the requirement.</div>
            @endif
        </div>
      @endforeach






  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    @foreach (App\Models\KycLevel::where('id', App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->kyc_level_id)->first()->id_types as $key=>$level)
        <span class="step"></span>
    @endforeach
  </div>
        {{-- End Level Wise --}}

		<button type="submit" class="btn btn-info">Upload</button>
	</form>

</div>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
