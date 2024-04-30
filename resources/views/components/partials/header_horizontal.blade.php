<div class="app-header with-horizontal">
      <nav class="navbar navbar-expand-xl container-fluid p-0">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
            <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="nav-item d-none d-xl-block">
            <a href="../main/index.html" class="text-nowrap nav-link">
              <img src="{{asset('/assets/images/logos/dark-logo.svg')}}" class="dark-logo" width="180" alt="modernize-img" />
              <img src="{{asset('/assets/images/logos/light-logo.svg')}}" class="light-logo" width="180" alt="modernize-img" />
            </a>
          </li>
          <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
            <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="ti ti-search"></i>
            </a>
          </li>
        </ul>
       
        <div class="d-block d-xl-none">
          <a href="../main/index.html" class="text-nowrap nav-link">
            <img src="{{ asset('assets/images/logos/dark-logo.svg')}}" width="180" alt="modernize-img" />
          </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="p-2">
            <i class="ti ti-dots fs-7"></i>
          </span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
            <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
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
              <!-- start shopping cart Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item nav-icon-hover-bg rounded-circle">
                <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <i class='bx bx-envelope'></i>
                  <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
                </a>
              </li>
              <!-- ------------------------------- -->
              <!-- end shopping cart Dropdown -->
              <!-- ------------------------------- -->

              <!-- ------------------------------- -->
              <!-- start notification Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                <a class="nav-link position-relative" href="javascript:void(0)" id="drop2" aria-expanded="false">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="d-flex align-items-center justify-content-between py-3 px-7">
                    <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                    <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                  </div>
                  <div class="message-body" data-simplebar>
                    <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                      <span class="me-3">
                        <img src="{{ asset('assets/images/profile/user-2.jpg') }}" alt="user" class="rounded-circle" width="48" height="48" />
                      </span>
                      <div class="w-100">
                        <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!</h6>
                        <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                      </div>
                    </a>
                   
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
                      <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                  <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                      <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                      <img src="{{ asset('assets/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                      <div class="ms-3">
                        <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                        <span class="mb-1 d-block">Designer</span>
                        <p class="mb-0 d-flex align-items-center gap-2">
                          <i class="ti ti-mail fs-4"></i> info@modernize.com
                        </p>
                      </div>
                    </div>
                    <div class="message-body">
                      <a href="../main/page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                        <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                          <img src="{{ asset('assets/images/svgs/icon-account.svg')}}" alt="modernize-img" width="24" height="24" />
                        </span>
                        <div class="w-100 ps-3">
                          <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                          <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                        </div>
                      </a>
                      <a href="../main/app-email.html" class="py-8 px-7 d-flex align-items-center">
                        <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                          <img src="{{ asset('assets/images/svgs/icon-inbox.svg')}}" alt="modernize-img" width="24" height="24" />
                        </span>
                        <div class="w-100 ps-3">
                          <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                          <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                        </div>
                      </a>
                      <a href="../main/app-notes.html" class="py-8 px-7 d-flex align-items-center">
                        <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                          <img src="{{ asset('assets/images/svgs/logout.svg')}}" alt="modernize-img" width="24" height="24" />
                        </span>
                        <div class="w-100 ps-3">
                          <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                          <span class="fs-2 d-block text-body-secondary">To-do and Daily Tasks</span>
                        </div>
                      </a>
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