<!-- Brand Logo -->
<a href="/" class="brand-link">
  <img src="/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Task Management System</span>
</a>

<!-- Sidebar -->
<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <li class="nav-item">
          <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
          </a>
      </li>
      @if(Auth::user()->hasRole('superadmin'))
      <li class="nav-item">
        <a href= "{{ url('/') }}" class="nav-link {{ Request::path() == 'role' ? 'active' :'' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>

                Admin
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('role.index') }} " class="nav-link {{ Route::current()->getName() == 'role.index' ? 'active' :'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Role</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('office.index') }}" class="nav-link {{ Route::current()->getName() == 'office.index' ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Office</p>
              </a>
          </li>
            <li class="nav-item">
                <a href="{{ route('adminuser') }}" class="nav-link {{ Route::current()->getName() == 'adminuser' ? 'active' :'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('valuer.index') }}" class="nav-link {{ Route::current()->getName() == 'valuer.index' ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Valuer</p>
              </a>
          </li>

        </ul>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO'))
      <li class="nav-item">
        <a  href="{{ route('billservice.index') }} " class="nav-link {{ Route::current()->getName() == 'billservice.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Bill Service
          </p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO'))
      <li class="nav-item">
        <a  href="{{ route('circlerate.index') }} " class="nav-link {{ Route::current()->getName() == 'circlerate.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Circle Rate
          </p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO'))
      <li class="nav-item">
        <a  href="{{ route('client.index') }} " class="nav-link {{ Route::current()->getName() == 'client.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Clients
          </p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO'))
      <li class="nav-item">
        <a  href="{{ route('owner.index') }} " class="nav-link {{ Route::current()->getName() == 'owner.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Owners
           
          </p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO'))
      <li class="nav-item">
        <a  href="{{ route('property.index') }} " class="nav-link {{ Route::current()->getName() == 'property.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Property
           
          </p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','Teamleader'))
      <li class="nav-item">
        <a href= "{{ url('/') }}" class="nav-link {{ Request::path() == 'assignval' ? 'active' :'' }}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>

                Assign Job
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
              <a  href="{{ route('assignval.index') }} " class="nav-link {{ Route::current()->getName() == 'assignval.index' ? 'active' :'' }}">
                <i class="far fa-circle nav-icon"></i><p>Jobs</p>
              </a>
            </li>
           

        </ul>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','DEO','Surveyur'))
      <li class="nav-item">
        <a  href="{{ route('valuationform') }} " class="nav-link {{ Route::current()->getName() == 'valuationform' ? 'active' :'' }}">
          <i class="nav-icon fas fa-edit"></i><p>Survey Forms</p>
        </a>
      </li>
      @endif
      @if(Auth::user()->hasRole('superadmin','Valuer'))
      <li class="nav-item">
        <a  href="{{ route('valuationreport.index') }} " class="nav-link {{ Route::current()->getName() == 'valuationreport.index' ? 'active' :'' }}">
          <i class="nav-icon fas fa-file-alt"></i><p> Valuation Reports</p>
        </a>
      </li>
      @endif
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->