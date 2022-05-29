<main>
    <div class="container-fluid py-4">
        <div class="d-flex">
            <div class="card card-frame mt-5 w-50">
                <div class="card-body">
                    <form action="/create-applicant" method="POST">
                        @csrf
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Applicant Card
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="first-name">First Name</label>
                                                <input type="text" class="form-control" id="first-name"
                                                    placeholder="First Name" name="first-name">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" class="form-control" id="last-name"
                                                    placeholder="Last Name" name="last-name">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="middle-name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle-name"
                                                    placeholder="Middle Name" name="middle-name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="external-user-id">External User Id</label>
                                            <input type="text" class="form-control" id="external-user-id"
                                                placeholder="" name="external-id">
                                        </div>
                                        <div class="form-group">
                                            <label for="kyc-level">Choose Level</label>
                                            <select class="form-control" id="kyc-level" name="kyc-level" required>
                                                <option value="" selected>Choose...</option>
                                                @foreach (Auth::user()->kycLevels()->get() as $kycLevel)
                                                    <option value="{{$kycLevel->id}}">{{$kycLevel->level_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- {{dd(Auth::user()->kycLevels()->get())}} --}}

                            </div>
                        </div>
                        <div>
                            {{-- <div class="row">
                                <div class="form-group col-6"><button class="btn bg-gradient-info w-100">Add
                                        Photo</button></div>
                                <div class="form-group col-6"><button class="btn bg-gradient-info w-100">Add
                                        Document</button></div>
                            </div> --}}

                        </div>
                        <div>
                            <div class="form-group"><button type="submit" class="btn bg-gradient-secondary w-100">Create
                                    Applicant</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@livewireStyles
@livewireScripts
