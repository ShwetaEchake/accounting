<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}" >
                        <i class="mdi mdi-monitor"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('departments.index')  || request()->routeIs('tax-master.index') || request()->routeIs('tax-group.index') || request()->routeIs('tax-category.index') || request()->routeIs('demand-classification.index') || request()->routeIs('calculation-method.index') || request()->routeIs('applicable-at.index') || request()->routeIs('workflow-mode.index') || request()->routeIs('units.index') || request()->routeIs('events.index') || request()->routeIs('organizations.index') ? 'active' : 'collapsed' }}" href="#sidebarLayout" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-collapse-all"></i>
                        <span data-key="t-layouts">Common</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('departments.index') || request()->routeIs('tax-master.index') || request()->routeIs('tax-group.index') || request()->routeIs('tax-category.index') || request()->routeIs('demand-classification.index') || request()->routeIs('calculation-method.index') || request()->routeIs('applicable-at.index') || request()->routeIs('workflow-mode.index') || request()->routeIs('units.index')  || request()->routeIs('events.index') || request()->routeIs('organizations.index') || request()->routeIs('component-name.index') ? 'show' : '' }}" id="sidebarLayout">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('departments.index') }}" class="nav-link {{ request()->routeIs('departments.index') ? 'active' : '' }}" data-key="t-horizontal">Departments</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tax-master.index') }}" class="nav-link {{ request()->routeIs('tax-master.index') ? 'active' : '' }}" data-key="t-horizontal">Tax Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tax-group.index') }}" class="nav-link {{ request()->routeIs('tax-group.index') ? 'active' : '' }}" data-key="t-horizontal">Tax Group</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tax-category.index') }}" class="nav-link {{ request()->routeIs('tax-category.index') ? 'active' : '' }}" data-key="t-horizontal">Tax Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('demand-classification.index') }}" class="nav-link {{ request()->routeIs('demand-classification.index') ? 'active' : '' }}" data-key="t-horizontal">Demand Classification</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('calculation-method.index') }}" class="nav-link {{ request()->routeIs('calculation-method.index') ? 'active' : '' }}" data-key="t-horizontal">Calculation Method</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('applicable-at.index') }}" class="nav-link {{ request()->routeIs('applicable-at.index') ? 'active' : '' }}" data-key="t-horizontal">Applicable At</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('workflow-mode.index') }}" class="nav-link {{ request()->routeIs('workflow-mode.index') ? 'active' : '' }}" data-key="t-horizontal">Workflow Mode</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('units.index') }}" class="nav-link {{ request()->routeIs('units.index') ? 'active' : '' }}" data-key="t-horizontal">Units</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}" data-key="t-horizontal">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('organizations.index') }}" class="nav-link {{ request()->routeIs('organizations.index') ? 'active' : '' }}" data-key="t-horizontal">Oragnizations</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('component-name.index') }}" class="nav-link {{ request()->routeIs('component-name.index') ? 'active' : '' }}" data-key="t-horizontal">Component Names</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('financial-year.index') ||  request()->routeIs('services.index') || request()->routeIs('banks.index')  || request()->routeIs('taxes.index')  ? 'active' : 'collapsed' }}" href="#sidebarLayout1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('financial-year.index') ||  request()->routeIs('services.index') || request()->routeIs('banks.index')  || request()->routeIs('taxes.index') || request()->routeIs('workflow.index') ? 'show' : '' }}" id="sidebarLayout1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('masters.index') }}" class="nav-link {{ request()->routeIs('masters.index') ? 'active' : '' }}" data-key="t-horizontal">Masters</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('financial-year.index') }}" class="nav-link {{ request()->routeIs('financial-year.index') ? 'active' : '' }}" data-key="t-horizontal">Financial Year</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}" data-key="t-horizontal">Service Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('banks.index') }}" class="nav-link {{ request()->routeIs('banks.index') ? 'active' : '' }}" data-key="t-horizontal">Bank Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('taxes.index') }}" class="nav-link {{ request()->routeIs('taxes.index') ? 'active' : '' }}" data-key="t-horizontal">Taxes</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('workflow.index') }}" class="nav-link {{ request()->routeIs('workflow.index') ? 'active' : '' }}" data-key="t-horizontal">Workflow</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('chart-of-account.index') ||  request()->routeIs('field-master.index') || request()->routeIs('function-master.index')  || request()->routeIs('fund-master.index') || request()->routeIs('primary-account-head.index') || request()->routeIs('secondary-account-head.index') ? 'active' : 'collapsed' }}" href="#sidebarLayout2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-chart-bar"></i>
                        <span data-key="t-layouts">Chart of Account</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('chart-of-account.index') ||  request()->routeIs('field-master.index') || request()->routeIs('function-master.index')  || request()->routeIs('fund-master.index') || request()->routeIs('primary-account-head.index') || request()->routeIs('secondary-account-head.index') ? 'show' : '' }}" id="sidebarLayout2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('chart-of-account.index') }}" class="nav-link {{ request()->routeIs('chart-of-account.index') ? 'active' : '' }}" data-key="t-horizontal">Chart of Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('field-master.index') }}" class="nav-link {{ request()->routeIs('field-master.index') ? 'active' : '' }}" data-key="t-horizontal">Field Master</a>
                            </li>
                            {{--
                            <li class="nav-item">
                                <a href="{{ route('function-master.index') }}" class="nav-link {{ request()->routeIs('function-master.index') ? 'active' : '' }}" data-key="t-horizontal">Function Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fund-master.index') }}" class="nav-link {{ request()->routeIs('fund-master.index') ? 'active' : '' }}" data-key="t-horizontal">Fund Master</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('primary-account-head.index') }}" class="nav-link {{ request()->routeIs('primary-account-head.index') ? 'active' : '' }}" data-key="t-horizontal">Primary Account Head</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('secondary-account-head.index') }}" class="nav-link {{ request()->routeIs('secondary-account-head.index') ? 'active' : '' }}" data-key="t-horizontal">Secondary Account Head</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('voucher_template_entry')  ? 'active' : 'collapsed' }}" href="#sidebarLayout3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri ri-stack-fill"></i>
                        <span data-key="t-layouts">Others</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('voucher_template_entry')  ? 'show' : '' }}" id="sidebarLayout3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('voucher_template_entry.index') }}" class="nav-link {{ request()->routeIs('voucher_template_entry') ? 'active' : '' }}" data-key="t-horizontal">Voucher Template Entry</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('receipt-details.index') }}" class="nav-link {{ request()->routeIs('receipt-details') ? 'active' : '' }}" data-key="t-horizontal">Receipt Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('grant-details.index') }}" class="nav-link {{ request()->routeIs('grant-details') ? 'active' : '' }}" data-key="t-horizontal">Grant Details</a>
                            </li>
                        </ul>
                    </div>
                </li>


                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('users.index')  || request()->routeIs('roles.index') ? 'active' : 'collapsed' }}" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('users.index') || request()->routeIs('roles.index') ? 'show' : '' }}" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
