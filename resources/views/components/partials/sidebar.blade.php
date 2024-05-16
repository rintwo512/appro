@php
    use App\Models\User;
    use App\Models\Menu;
    use App\Models\SubMenu;
    $id = auth()->user()->id;
    $user = User::find($id);
    // $menus = $user->menus1;
    $menus = $user->menus1()->orderBy('menu_location')->get();

@endphp
<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index') }}" class="text-nowrap logo-img">
                <img src="{{ asset('/assets/images/logos/logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                <img src="{{ asset('/assets/images/logos/logo2.svg') }}" class="light-logo" alt="Logo-light" />
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">NAVIGATION</span>
                </li>
                {{-- @if (!$menu->submenus->isEmpty()) has-arrow @endif --}}
                @foreach ($menus as $menu)
                    @if ($menu->is_active == 1)
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ !$menu->submenus->isEmpty() ? 'has-arrow' : '' }}"
                                href="{{ $menu->menu_url }}" aria-expanded="false">
                                <span class="d-flex">
                                    <i class='{{ $menu->menu_icon }} fs-6'></i>
                                </span>
                                <span class="hide-menu">{{ $menu->menu_label }}</span>
                            </a>
                            @if (!$menu->submenus->isEmpty())
                                <ul aria-expanded="false" class="collapse first-level">
                                    @foreach ($menu->submenus()->orderBy('submenu_location')->get() as $submenu)
                                        @if ($submenu->is_active === 1)
                                            @if ($user->submenus1->contains('id', $submenu->id))
                                                <li class="sidebar-item">
                                                    <a href="{{ $submenu->submenu_url }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="{{ $submenu->submenu_icon }}"></i>
                                                        </div>
                                                        <span class="hide-menu">{{ $submenu->submenu_label }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
                {{-- <li class="sidebar-item">
          <a class="sidebar-link link-disabled" href="#disabled" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-ban"></i>
            </span>
            <span class="hide-menu">Disabled</span>
          </a>
        </li> --}}
                @can('Admin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">ADMIN NAVIGATION</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-user-plus fs-6'></i>
                            </span>
                            <span class="hide-menu">Manejemen Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('menus.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-grid fs-6'></i>
                            </span>
                            <span class="hide-menu">Manejemen Menus</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('manajemen-akses') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-folder-plus fs-6'></i>
                            </span>
                            <span class="hide-menu">Manejemen Akses</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="40"
                        height="40" alt="{{ auth()->user()->name }}" />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">{{ auth()->user()->name }}</h6>
                    <span class="fs-2">{{ auth()->user()->jabatan->nama_jabatan }}</span>
                </div>
                <form action="{{ route('logout', ['id' => auth()->user()->id]) }}" method="post" id="autoLogout">
                    @csrf
                    <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                        aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout"
                        id="btnLog">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>

<script>
    const formLog = document.querySelector('#autoLogout');
    document.querySelector("#btnLog").onclick = function() {
        Swal.fire({
            title: "Apakah Anda yakin ingin logout ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, logout !!"
        }).then((result) => {
            if (result.isConfirmed) {
                formLog.submit();
            }
        });
    };
</script>
