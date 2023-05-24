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

                    @role('admin')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                            <span class="nk-menu-text">Company</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('companies.index')}}" class="nk-menu-link"><span class="nk-menu-text">Compnay List</span></a>
                            </li>
                            <!-- <li class="nk-menu-item">
                                <a href="{{route('companies.search')}}" class="nk-menu-link"><span class="nk-menu-text">Search Company</span></a>
                            </li> -->

                            <li class="nk-menu-item">
                                <a href="{{url('search-company')}}" class="nk-menu-link"><span class="nk-menu-text">Search Company</span></a>
                            </li>

                        </ul>
                    </li>
                    @endrole
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Employees</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @can('create companies')
                            <li class="nk-menu-item">
                                <a href="{{route('employees.index')}}" class="nk-menu-link"><span class="nk-menu-text ">Employee List</span></a>
                            </li>
                            <!-- <li class="nk-menu-item">
                                <a href="{{url('filter')}}" class="nk-menu-link"><span class="nk-menu-text "> Filter Employee</span></a>
                            </li> -->
                            @endcan
                            @can('create-employee')
                            <li class="nk-menu-item">
                                <a href="{{route('employees.index')}}" id="add-employee-link"><span class="nk-menu-text mx-5">Add Employee</span></a>
                            </li>

                            @endcan
                        </ul>
                    </li>

                    @can('create companies')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-index-fill"></em></span>
                            <span class="nk-menu-text ">project</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{url('projects')}}" class="nk-menu-link"><span class="nk-menu-text ">Projects</span></a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>