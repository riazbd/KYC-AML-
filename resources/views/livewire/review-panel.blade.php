
{{-- <!-- MDB -->
<link id="pagestyle" href="../assets/css/mdb.min.css" rel="stylesheet" /> --}}
<main class="mt-4">
    <div class="container-fluid py-4">
        <!-- Tabs navs -->
        <div class="d-flex justify-content-between">
            <div>
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                            aria-controls="ex1-tabs-1" aria-selected="true">Individuals</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                            aria-controls="ex1-tabs-2" aria-selected="false">Actions</a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- Tabs navs -->
        <div class="card card-frame mt-5">
            <div class="card-body">
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Documents</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active Status</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Document Status</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ( $applicants as $applicant)
                                <tr>
                                    <td>
                                      <a href="/applicants/{{$applicant->applicant_unique_id}}">
                                          <div>
                                              <p class="text-decoration-underline">ID: <br>
                                                  {{$applicant->applicant_unique_id}}
                                              </p>
                                          </div>
                                          {{-- <div>
                                              France
                                          </div> --}}
                                          <div>
                                              Created at: {{$applicant->created_at}}
                                          </div>
                                      </a>
                                    </td>
                                    <td>
                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() > 0)
                                            <p class="text-xs font-weight-bold mb-0">{{$applicant->applicantsProfile()->first()->applicantsDocuments()->latest('created_at')->first()->id_type}}
                                            </p>
                                        @else
                                            <p class="text-xs font-weight-bold mb-0">None</p>
                                        @endif



                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    @if ($applicant->status == 1)
                                    <form action="{{ route('edit-status', ['id' => $applicant->applicant_unique_id ])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="badge badge-pill bg-gradient-success border-0">Online</button>
                                    </form>
                                    @endif

                                    @if ($applicant->status == 0)
                                    <form action="{{ route('edit-status', ['id' => $applicant->applicant_unique_id ])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="badge badge-pill bg-gradient-danger border-0">Offline</button>
                                    </form>
                                    @endif

                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and $applicant->is_approved == 1)

                                            <span class=""><i class="fa-solid fa-check"></i></span>
                                        @endif

                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and $applicant->is_approved == 0)

                                            <span class=""><i class="fa-solid fa-xmark"></i></span>
                                        @endif

                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() < 1)

                                            <span class="text-danger">Pending</i></span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and $applicant->is_approved == 0)
                                        <form action="{{ route('edit-validation', ['id' => $applicant->applicant_unique_id ])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="badge badge-pill bg-gradient-success border-0">Approve</button>
                                        </form>

                                        @endif

                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() > 0 and $applicant->is_approved == 1)
                                        <form action="{{ route('edit-validation', ['id' => $applicant->applicant_unique_id ])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="badge badge-pill bg-gradient-danger border-0">Decline</button>
                                        </form>

                                        @endif

                                        @if ($applicant->applicantsProfile()->first()->applicantsDocuments()->count() < 1)

                                            <span class="text-danger">Pending</i></span>
                                        @endif

                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('delete-applicant', ['id' => $applicant->applicant_unique_id ])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="badge badge-pill bg-gradient-danger border-0">Delete</button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach

                              </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        Tab 2 content
                    </div> --}}

                </div>
                <!-- Tabs content -->
            </div>
        </div>
    </div>
</main>

