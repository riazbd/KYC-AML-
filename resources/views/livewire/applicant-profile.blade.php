<main>
    <div class="container-fluid py-4">

        <form action="{{ route('update-token', ['id' => request('id') ])}}" method="POST">
            @csrf
            {{-- Session::get('applicant') --}}
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-info">Generate Applicant Link</button>
        </form>
        @if (App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->access_token != '')
            <p class="p-1 text-sm text-white text-bolder bg-success d-inline-block rounded me-5">{{ url('')}}/givedocs/{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->access_token}} </p> <p>This link is temporary, and will not be effective after 15 minutes.</p>
        @endif
        {{-- <div>{{request('id')}}</div> --}}
        <div class="d-flex">
            {{-- Applicant Info --}}
            <div class="w-100 h-100">
                <div class="card card-frame mt-5 w-100 h-100">
                    <div class="card-body">
                        <form action="{{ route('ApplicantEdit', ['id' => request('id') ])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="accordion" id="accordionProfileData">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                            data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Applicant Info
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-mdb-parent="#accordionProfileData">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="id">ID</label>
                                                    <input type="text" class="form-control" id="id"
                                                        placeholder="ID" name="id" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicant_unique_id : ''}}" readonly>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="created-for">Created For</label>
                                                    <input type="text" class="form-control" id="created-for"
                                                        placeholder="Created For" name="created-for" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->user()->first()->email : ''}}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="external-user">External User</label>
                                                    <input type="text" class="form-control" id="external-user"
                                                        placeholder="External User" name="external-id" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicant_extrnal_unique_id : ''}}" readonly>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="created Date">Created Date</label>
                                                    <input type="text" class="form-control" id="created Date"
                                                        placeholder="Created Date" name="creation-date" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->created_at->toDateString() : ''}}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- <div class="form-group col-6">
                                                    <label for="entity-type">Entity Type</label>
                                                    <input type="text" class="form-control" id="entity-type"
                                                        placeholder="Entity Type" value="Person" name="entity-type">
                                                </div> --}}
                                                <div class="form-group col-6">
                                                    <label for="language">Language</label>
                                                    <input type="text" class="form-control" id="language"
                                                        placeholder="Language" name="language" disabled>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email"
                                                        placeholder="Email" name="email" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->email : ''}}">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <button type="submit" class="btn btn-info">Save Info</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Personal Info --}}
                <div class="card card-frame mt-5 w-100">
                    <div class="card-body">
                        <form action="{{ route('edit-profile', ['id' => request('id') ])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="accordion" id="accordionPersonalInfo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                            data-mdb-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Personal Info
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-mdb-parent="#accordionPersonalInfo">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="first-name">First Name</label>
                                                    <input type="text" class="form-control" id="first-name"
                                                        placeholder="First Name" name="first-name" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->first_name}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country"
                                                        placeholder="country" name="country" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->country}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="last-name">Last Name</label>
                                                    <input type="text" class="form-control" id="last-name"
                                                        placeholder="Last Name" name="last-name" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->last_name}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="country-of-birth">Country of Birth</label>
                                                    <input type="text" class="form-control" id="country-of-birth"
                                                        placeholder="Country of birth" name="country-of-birth" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->birth_country}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="middle-name">Middle Name</label>
                                                    <input type="text" class="form-control" id="middle-name"
                                                        placeholder="Middle Name" name="middle-name" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->middle_name}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="state-of-birth">State of Birth</label>
                                                    <input type="text" class="form-control" id="state-of-birth"
                                                        placeholder="State of Birth" name="state-of-birth" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->state_of_birth}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="legal-name">Legal Name</label>
                                                    <input type="text" class="form-control" id="legal-name"
                                                        placeholder="Legal Name" name="legal-name" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->legal_name}}">
                                                </div>
                                                {{-- <div class="form-group col-6">
                                                    <label for="place-of-birth">Place of Birth</label>
                                                    <input type="text" class="form-control" id="place-of-birth"
                                                        placeholder="Place of Birth" name="place-of-birth">
                                                </div> --}}
                                                {{-- <div class="form-group col-6">
                                                    <label for="tin">Tin</label>
                                                    <input type="text" class="form-control" id="tin"
                                                        placeholder="TIN" name="tin">
                                                </div> --}}
                                                <div class="form-group col-6">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        placeholder="Phone" name="phone" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->phone}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="date-of-birth">Date of Birth</label>
                                                    <input type="text" class="form-control" id="date-of-birth"
                                                        placeholder="Date of Birth" name="date-of-birth" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->date_of_birth}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="nationality">Nationality</label>
                                                    <input type="text" class="form-control" id="nationality"
                                                        placeholder="Nationality" name="nationality" value="{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->nationality}}">
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="form-group col-6">
                                                    <label>Gender</label>
                                                    <div class="radio-group"><label class="radio-item"><input type="radio" name="gender" value="M" class="has-value" {{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->gender == 'M' ? 'checked' : null}}>Male </label><label class="radio-item"><input type="radio" name="gender" value="F" class="has-value" {{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->gender == 'F' ? 'checked' : null}}> Female </label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button type="submit" class="btn btn-info">Save Info</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="h-100 w-100">
                <div class="card card-frame h-100 mt-5 ms-3 w-100">
                    <div class="card-body">
                        <div class="accordion" id="accordionManualApprove">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingApprove">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#collapseManualApprove" aria-expanded="true" aria-controls="collapseManualApprove">
                                        Manual Validation
                                    </button>
                                </h2>
                                <div id="collapseManualApprove" class="accordion-collapse collapse show"
                                    aria-labelledby="headingApprove" data-mdb-parent="#accordionManualApprove">
                                    <div class="accordion-body">
                                        <div class="w-100">
                                            <h5>{{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() > 0 ? App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->latest('created_at')->first()->id_type : ''}}</h3>
                                            <div class="w-100 mt-5">
                                                <p>Front</p>
                                                <img src="{{ asset(App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() > 0 ? 'storage/'.App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->latest('created_at')->first()->front_path : 'storage/public/files/no_id_front.png') }}" alt="front-doc" class="w-100">
                                            </div>
                                            <div class="w-100 mt-5">
                                                <p>Back</p>
                                                <img src="{{ asset(App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() > 0 ? 'storage/'.App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->latest('created_at')->first()->back_path : 'storage/public/files/no_id_front.png') }}" alt="back-doc" class="w-100">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around mt-4">
                                            <div class="w-100">
                                                <form action="{{ route('approve-document', ['id' => request('id') ])}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-success w-100" {{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() < 1 ? 'disabled' : ''}}>Approve</button>
                                                </form>
                                            </div>
                                            <div class="w-100 ms-3">
                                                <form action="{{ route('decline-document', ['id' => request('id') ])}}" method="POST">
                                                    @method('PUT')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger w-100" {{App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() < 1 ? 'disabled' : ''}}>Decline</button>
                                                </form>
                                            </div>

                                        </div>
                                        <div>
                                            @if (App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() < 1)
                                                <p>Please add documents to validate...</p>
                                            @endif
											@if (App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->is_approved == 1)
											<div class="text-center text-2xl">
												<i class="fa-solid fa-check text-success" class="font-size: 36px;"></i>
												<p>Approved</p>
											</div>
											@endif
											@if (App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and App\Models\Applicant::where('applicant_unique_id', request('id'))->first()->is_approved == 0)
											<div class="text-center text-2xl">
												<i class="fa-solid fa-xmark text-danger"class="font-size: 36px;"></i>
												<p>Declined</p>
											</div>
											@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="d-flex">

        </div> --}}
    </div>
</main>
