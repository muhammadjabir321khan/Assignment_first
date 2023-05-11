<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">

        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Employee</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @can('create companies')
                            <li class="nk-menu-item">
                                <a href="{{route('employees.index')}}"><span class="nk-menu-text mx-5">Employee List</span></a>
                            </li>
                            @endcan('create companies')
                            @can('create-employee')
                            <li class="nk-menu-item">
                                <a href="{{route('employees.create')}}" data-toggle="modal" data-target="#myModal1"><span class="nk-menu-text mx-5">Add Employee</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @role('admin')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                            <span class="nk-menu-text">Company</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('companies.index')}}"><span class="nk-menu-text mx-5">Compnay List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('companies.search')}}"><span class="nk-menu-text mx-5">Search Company</span></a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @can('create companies')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text ">project</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('projects')}}"><span class="nk-menu-text mx-5">Projects</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>