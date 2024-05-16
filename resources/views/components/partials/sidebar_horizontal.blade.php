@php
  use \App\Models\User;
  use \App\Models\Menu;
  $id = auth()->user()->id;
  $user = User::find($id);
  $menus = $user->menus;

@endphp
<aside class="left-sidebar with-horizontal">
  <!-- Sidebar scroll-->
  <div>
    <!-- Sidebar navigation-->
    <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
      <ul id="sidebarnav">
        <!-- ============================= -->
        <!-- Home -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i> 
          <span class="hide-menu">Home</span>
        </li>
        @foreach ($menus as $menu)              
        <li class="sidebar-item">
          <a class="sidebar-link @if (!$menu->submenus->isEmpty()) has-arrow @endif" href="{{ $menu->menu_url }}" aria-expanded="false">
            <span class="rounded-3">
              <i class='{{ $menu->menu_icon }}'></i>
            </span>
            <span class="hide-menu">{{ $menu->menu_label }}</span>
          </a>
          @if (!$menu->submenus->isEmpty())
          <ul aria-expanded="false" class="collapse first-level">
            @foreach ($menu->submenus as $submenu)
            <li class="sidebar-item">
              <a href="{{ $submenu->submenu_url }}" class="sidebar-link">
                <i class="{{ $submenu->submenu_icon }}"></i>
                <span class="hide-menu">{{ $submenu->submenu_label }}</span>
              </a>
            </li>
            @endforeach            
          </ul>
          @endif
        </li>
        @endforeach
        @can('Admin')
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="rounded-3">
              <i class='bx bxs-grid'></i>
            </span>
            <span class="hide-menu">Admin Menu</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                <span>
                  <i class='bx bx-user-plus fs-6'></i>
                </span>
                <span class="hide-menu">Manejemen Users</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class='bx bxs-grid fs-6'></i>
                </span>
                <span class="hide-menu">Manejemen Akses</span> 
              </a>
            </li>
          </ul>
        </li>
        @endcan
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->

</aside>