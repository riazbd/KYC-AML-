<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            {{-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="..."> --}}
            <span class="ms-1 font-weight-bold">AML Project</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" style="overflow: unset">
        <ul class="navbar-nav">
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="me-2">
                        <i class="fa-solid fa-gauge-high" style=""></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'applicants' ? 'active' : '' }}"
                    href="{{ route('applicants') }}">
                    <div class="me-2">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">Applicants</span>
                </a>
            </li>

            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'review-panel' ? 'active' : '' }}"
                    href="{{ route('review-panel') }}">
                    <div class="me-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <span class="nav-link-text ms-1">Review Panel</span>
                </a>
            </li>


            <li class="nav-item pb-2 dropdown" style="cursor: pointer">
                <div class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="me-2">
                        <i class="fa-solid fa-bezier-curve"></i>
                    </div>
                    <span class="nav-link-text ms-1" >
                      Integrations
                    </span>
                </div>
                <ul class="dropdown-menu">
                  <li class="nav-item pb-2">
                      <a href="{{ route('applicant-levels') }}" class="nav-link {{ Route::currentRouteName() == 'applicant-levels' ? 'active' : '' }}">
                          <span class="nav-link-text ms-1">Applicant Levels</span>
                      </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item pb-2 dropdown" style="cursor: pointer">
                <div class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="me-2">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <span class="nav-link-text ms-1" >
                      Settings
                    </span>
                </div>
                <ul class="dropdown-menu">
                  <li class="nav-item pb-2">
                      <a href="{{ route('client-profile') }}" class="nav-link {{ Route::currentRouteName() == 'client-profile' ? 'active' : '' }}">
                          <span class="nav-link-text ms-1">Profile</span>
                      </a>
                  </li>
                  <li class="nav-item pb-2">
                    <a href="{{ route('account-detail') }}" class="nav-link ">
                        <span class="nav-link-text ms-1">Account Details</span>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item pb-2 dropdown" style="cursor: pointer">
                <div class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="me-2">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <span class="nav-link-text ms-1" >
                      Dev Space
                    </span>
                </div>
                <ul class="dropdown-menu">
                  <li class="nav-item pb-2" style="cursor: pointer">
                      <a href="{{ route('web-hooks') }}" class="nav-link {{ Route::currentRouteName() == 'web-hooks' ? 'active' : '' }}">
                          <span class="nav-link-text ms-1">Web Hooks</span>
                      </a>
                  </li>
                  <li class="nav-item pb-2" style="cursor: pointer">
                    <a href="{{ route('twilio-integration') }}" class="nav-link {{ Route::currentRouteName() == 'twilio-integration' ? 'active' : '' }}">
                        <span class="nav-link-text ms-1">Twilio Integration</span>
                    </a>
                </li>
                </ul>
            </li>




        </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-3 pt-3">

    </div>
</aside>
