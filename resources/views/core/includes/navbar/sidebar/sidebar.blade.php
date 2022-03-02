<!-- Sidebar -->
<ul class="navbar-nav sidebar toggled accordion sidebar-bg-color sidebar-shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('lad.dashboard') }}">
      <div class="sidebar-brand sidebar-brand-img">
        <img src="{{ asset('lad/img/logo.png') }}" alt="Lad Logo" class="brand-img" />
      </div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item sidebar-nav-item mt-2">
      <a class="nav-link sidebar-nav-link" href="{{ route('lad.dashboard') }}">
        <i class="fa fa-home sidebar-icon"></i>
        <span>Dashboard</span>
      </a>
    </li>

  
    <!-- Divider -->
    <!--<hr class="sidebar-divider">-->
  
    <!-- include sidebar navitem links for other integrated packages or modules -->
    @php
        $navitems = config('lad.sidebar_navitems', []);
    @endphp
    @if (count($navitems))
        @for ($i = 0; $i < count($navitems); $i++)
             @includeIf($navitems[$i])
        @endfor
    @else
        @includeIf('phoebi::core.includes.navbar.sidebar.packageLinks')
    @endif

  
    <!-- Divider -->
    <!--<hr class="sidebar-divider d-none d-md-block">-->

     <!-- Users Nav Item - Pages Collapse Menu -->
     <li class="nav-item sidebar-nav-item">
      <a class="nav-link sidebar-nav-link" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fa fa-fw fa-users sidebar-icon"></i>
        <span>Users</span>
      </a>
      <div id="collapseUsers" class="collapse sidebar-collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Users:</h6>
          <a class="collapse-item" href="{{ route('lad.admins') }}">Admins</a>
        </div>
      </div>
    </li>

    <!-- Settings -->
    <li class="nav-item sidebar-nav-item">
      <a class="nav-link sidebar-nav-link" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fa fa-fw fa-cog sidebar-icon"></i>
        <span>Settings</span>
      </a>
      <div id="collapseSettings" class="collapse sidebar-collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('lad.settings') }}">Lad <i class="fa fa-mars float-right" style="font-size: 0.89rem;"></i></a>
          <a class="collapse-item" href="">Students</a>
        </div>
      </div>
    </li>
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-4 sidebar-toggle-wrapper">
      <button class="rounded-circle border-0 sidebar-toggle" id="sidebarToggle"><i class="fa fa-angle-right sidebar-toggle-icon"></i></button>
    </div>
  
  </ul>
  <!-- End of Sidebar -->