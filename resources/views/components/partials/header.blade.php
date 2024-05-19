@php
    use App\Models\User;
    use App\Models\SubMenu;
    $userOnline = User::where('status_login', 'online')->get();
    $currentUserId = auth()->user()->id;

    $userOnlineCount = User::where('status_login', 'online')
        ->where('id', '!=', $currentUserId)
        ->whereNotIn('role', [1])
        ->count();

    $currentUser = User::with('submenus1')->find($currentUserId);
    $submenuEditProfile = $currentUser->submenus1->firstWhere('submenu_label', 'Edit Profile');
@endphp

<div class="with-vertical"><!-- ---------------------------------- -->
    <!-- Start Vertical Layout Header -->
    <!-- ---------------------------------- -->
    <nav class="navbar navbar-expand-lg p-0">
        <ul class="navbar-nav">
            <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
                <a class="nav-link" href="javascript:void(0)" href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#modalDetailUsers">
                    <i class="ti ti-search"></i>
                </a>
            </li>
        </ul>


        <div class="d-block d-lg-none py-4">
            <a href="{{ route('dashboard.index') }}" class="text-nowrap logo-img">
                <img src="{{ asset('/assets/images/logos/logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                <img src="{{ asset('/assets/images/logos/logo2.svg') }}" class="light-logo" alt="Logo-light" />
            </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="ti ti-dots fs-7"></i>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">

                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <!-- ------------------------------- -->
                    <!-- start language Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                        <a class="nav-link moon dark-layout" href="javascript:void(0)" id="moon">
                            <i class="ti ti-moon gelap"></i>
                        </a>
                        <a class="nav-link sun light-layout" href="javascript:void(0)" id="sun">
                            <i class="ti ti-sun terang"></i>
                        </a>
                    </li>

                    <!-- ------------------------------- -->
                    <!-- start shopping cart Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                        <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class='bx bx-envelope'></i>
                            <div class="notification bg-primary rounded-circle"></div>
                        </a>
                    </li>
                    <!-- ------------------------------- -->
                    <!-- end shopping cart Dropdown -->
                    <!-- ------------------------------- -->
                    <!-- ------------------------------- -->
                    <!-- start notification Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                        <a class="nav-link position-relative" href="javascript:void(0)" id="drop2"
                            aria-expanded="false">
                            <i class="ti ti-bell-ringing"></i>

                            <span class="popup-badge rounded-pill bg-danger text-white fs-2"
                                id="JumlahOnline">{{ $userOnlineCount }}</span>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">

                            <div class="message-body" data-simplebar id="online-users-list">
                                {{-- @foreach ($userOnline as $uOnline)
                                    @if ($uOnline->id_jabatan != 1)
                                        @if (auth()->user()->name != $uOnline->name)
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="{{ asset('assets/images/profile/user-2.jpg') }}"
                                                        alt="user" class="rounded-circle" width="48"
                                                        height="48" />
                                                </span>
                                                <div class="w-100">
                                                    <h6 class="mb-1 fw-semibold lh-base">{{ $uOnline->name }}</h6>
                                                    <span
                                                        class="fs-2 d-block text-body-secondary">{{ $uOnline->user_time_online? Illuminate\Support\Carbon::parse($uOnline->user_time_online)->locale('id')->diffForHumans(): '' }}</span>
                                                </div>
                                            </a>
                                        @endif
                                    @endif
                                @endforeach --}}
                            </div>
                    </li>
                    <!-- ------------------------------- -->
                    <!-- end notification Dropdown -->
                    <!-- ------------------------------- -->
                    <!-- ------------------------------- -->
                    <!-- start profile Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    @if (auth()->user()->image != 'default.jpg')
                                        <img src="{{ asset('/uploads/profile_images/' . auth()->user()->image) }}"
                                            class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                    @else
                                        <img src="{{ asset('/assets/images/profile/user-1.jpg') }}"
                                            class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    @if (auth()->user()->image != 'default.jpg')
                                        <img src="{{ asset('/uploads/profile_images/' . auth()->user()->image) }}"
                                            class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                    @else
                                        <img src="{{ asset('/assets/images/profile/' . auth()->user()->image) }}"
                                            class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                    @endif
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                        <span class="mb-1 d-block">{{ auth()->user()->jabatan->nama_jabatan }}</span>
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    @if ($submenuEditProfile)
                                        <a href="{{ route('edit.profile') }}"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/images/svgs/icon-account.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                            </div>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#modalDetailUsers"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/images/svgs/icon-account.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                            </div>
                                        </a>
                                    @endif
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#modalDetailUsers"
                                        class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                            <img src="{{ asset('assets/images/svgs/icon-inbox.svg') }}"
                                                alt="modernize-img" width="24" height="24" />
                                        </span>
                                        <div class="w-100 ps-3">
                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                            <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                                        </div>
                                    </a>
                                    <x-logout>
                                        Logout
                                    </x-logout>
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
    <!-- ---------------------------------- -->
    <!-- End Vertical Layout Header -->
    <!-- ---------------------------------- -->

    <!-- ------------------------------- -->
    <!-- apps Dropdown in Small screen -->
    <!-- ------------------------------- -->

</div>
