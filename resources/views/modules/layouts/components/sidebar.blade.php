<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NSOL BPO</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('read-permissions')
                <li class="nav-item">
                    <a href="{{route('permissions.index')}}" class="nav-link">
                        <i class="nav-icon  fas fa-lock"></i>
                        <p>Permissions</p>
                    </a>
                </li> 
                @endcan
                @can('read-roles')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="nav-icon  fas fa-user-tag"></i>
                        <p>Roles</p>
                    </a>
                </li> 
                @endcan
                @can('read-employees')
                <li class="nav-item">
                    <a href="{{route('employees.index')}}" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Employee</p>
                    </a>
                </li> 
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>