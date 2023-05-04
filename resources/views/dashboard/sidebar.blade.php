<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>

                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/crm/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Company</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @role('admin')
                            <li class="nk-menu-item">
                                <a href="{{route('companies.index')}}" class="nk-menu-link"><span class="nk-menu-text"> Companies List</span></a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Employee</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @can('create-employee')
                            <li class="nk-menu-item">
                                <a href="{{route('employees.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Employee</span></a>
                            </li>
                            @endcan
                            @can('create companies')
                            <li class="nk-menu-item">
                                <a href="{{url('employees')}}" class="nk-menu-link"><span class="nk-menu-text">Employee list</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Project</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @can('create companies')
                            <li class="nk-menu-item">
                                <a href="{{url('/projects/create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Projcet</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{url('projects')}}" class="nk-menu-link"><span class="nk-menu-text">Project list</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    <!-- .nk-menu-item -->
                </ul>
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>