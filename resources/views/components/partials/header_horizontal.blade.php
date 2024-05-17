<div class="app-header with-horizontal">
    <nav class="navbar navbar-expand-xl container-fluid p-0">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
                <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="{{ route('dashboard.index') }}" class="text-nowrap nav-link">
                    <img src="{{ asset('/assets/images/logos/logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                    <img src="{{ asset('/assets/images/logos/logo2.svg') }}" class="light-logo" alt="Logo-light" />
                </a>
            </li>

        </ul>

        <div class="d-block d-xl-none">
            <a href="{{ route('dashboard.index') }}" class="text-nowrap nav-link">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" width="180" alt="modernize-img" />
            </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)"
                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <!-- ------------------------------- -->
                    <!-- start language Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                            <i class="ti ti-moon moon"></i>
                        </a>
                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                            <i class="ti ti-sun sun"></i>
                        </a>
                    </li>






                    <!-- ------------------------------- -->
                    <!-- start profile Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('assets/images/profile/' . auth()->user()->image) }}"
                                        class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>

                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ asset('assets/images/profile/' . auth()->user()->image) }}"
                                        class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                        <span class="mb-1 d-block">{{ auth()->user()->jabatan->nama_jabatan }}</span>
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                    <!-- ------------------------------- -->
                    <!-- end profile Dropdown -->
                    <!-- ------------------------------- -->
                </ul>
            </div>
        </div>
    </nav>
</div>
