<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/"><img alt="Settlement Apps" src="{{ asset('assets/img/images.jpg') }}" class="logo-bcl"></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Sett</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="@yield('sdbar-dashboard')"><a href="/dashboard"><i class="fas fa-chart-area"></i><span>Dashboard</span></a></li>

          <li class="menu-header">Operation & Maintenance</li>
          <li class="nav-item dropdown @yield('drop-om')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-industry"></i><span>Data O&M</span></a>
            <ul class="dropdown-menu">
              <li class="@yield('sdbar-list-om')"><a class="nav-link" href="/data-om"><i class="fas fa-book"></i><span>List Sett O&M</span></a></li>
              <li class="@yield('sdbar-input-tagihan-om')"><a class="nav-link" href="/data-om-tg/create"><i class="fas fa-file-invoice"></i><span>Input Tagihan</span></a></li>
              <li class="@yield('sdbar-input-reimburse-om')"><a class="nav-link" href="/data-om/create"><i class="fas fa-money-bill-wave"></i><span>Input Reimburse</span></a></li>
              <li class="@yield('sdbar-input-vo-om')"><a class="nav-link" href="/data-om/create"><i class="far fa-folder-open"></i><span>Input VO</span></a></li>
            </ul>
          </li>

          <li class="menu-header">Proyek</li>
          <li class="nav-item dropdown @yield('drop-customer')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Data Proyek</span></a>
            <ul class="dropdown-menu">
              <li class="@yield('sdbar-list-customer')"><a class="nav-link" href="/data-customer/"><i class="fas fa-book"></i><span>List Sett Proyek</span></a></li>
              <li class="@yield('sdbar-input-customer')"><a class="nav-link" href="/data-monitoring/create"><i class="fas fa-file-invoice"></i><span>Input Tagihan</span></a></li>
              <li class="@yield('sdbar-input-customer')"><a class="nav-link" href="/data-monitoring/create"><i class="fas fa-money-bill-wave"></i><span>Input Reimburse</span></a></li>
              <li class="@yield('sdbar-input-customer')"><a class="nav-link" href="/data-monitoring/create"><i class="far fa-folder-open"></i><span>Input VO</span></a></li>
            </ul>
          </li>

          <li class="menu-header">Customer</li>
          <li class="nav-item dropdown @yield('drop-customer')">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-address-card"></i></i><span>Data Customer</span></a>
            <ul class="dropdown-menu">
              <li class="@yield('sdbar-list-customer')"><a class="nav-link" href="/data-customer/"><i class="fas fa-id-card"></i><span>List Data</span></a></li>
              <li class="@yield('sdbar-input-customer')"><a class="nav-link" href="/data-customer/create"><i class="fas fa-id-card-alt"></i><span>Input Data</span></a></li>
            </ul>
          </li>

          <?php 
          if (auth()->user()->role == 'Super Admin') {
          echo '<li class="menu-header">PIC</li>
          <li class="nav-item dropdown'?> @yield('drop-pic') <?php echo'">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Data PIC</span></a>
            <ul class="dropdown-menu">
              <li class="'?> @yield('sdbar-list-pic') <?php echo'"><a class="nav-link" href="/data-pic/"><i class="far fa-id-badge"></i><span>List Data</span></a></li>
              <li class="'?> @yield('sdbar-input-pic') <?php echo '"><a class="nav-link" href="/data-pic/create"><i class="fas fa-user-plus"></i><span>Input Data</span></a></li>
            </ul>
          </li> ';
          }
          else {
            echo '';
          }
          ?>

          <li class="menu-header">User Setting</li>
            <li class="nav-item">
            <a href="{{ route('edit_user', auth()->user()->id) }}" class="nav-link"><i class="fas fa-cogs"></i><span>User Setting</span></a>
          </li> 

          <?php 
          if (auth()->user()->role == 'Super Admin') {
            echo '<li class="menu-header">User Aplikasi</li>
            <li class="nav-item dropdown'?> @yield('drop-user') <?php echo'">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-secret"></i><span>Data User Aplikasi</span></a>
            <ul class="dropdown-menu">
              <li class="'?>@yield('sdbar-list-user')<?php echo'"><a class="nav-link" href="/data-user/"><i class="fas fa-user-lock"></i><span>List Data</span></a></li>
              <li class="'?>@yield('sdbar-input-user')<?php echo'"><a class="nav-link" href="/data-user/create"><i class="fas fa-user-tie"></i><span>Input Data</span></a></li>
            </ul>
          </li> ';
          }
          else {
            echo '';
          }
          ?>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="{{url('logout')}}" class="btn btn-info btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
    </aside>
  </div>