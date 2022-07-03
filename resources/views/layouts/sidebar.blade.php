<head>
    <style>
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            display: block;
            overflow-y: auto;
            width: 100%;
            max-width: 200px;
            padding-right: 1rem 0;
            left: 0;
            border-width: 0 1px 0 0;
            flex-flow: row nowrap;
            justify-content: flex-start;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>

</head>
<nav id="sidebarMenu" class="d-lg-block sidebar bg-white">
    <div class="position-sticky">
        <div class="text-center mt-4">
            <a class="navbar-brand " href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="{{ route('index') }}"
                class="{{ request()->routeIs('index') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('task.index') }}"
                class="{{ request()->routeIs('task.*') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>Tasks</span>
            </a>
            <a href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.*') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-user fa-fw me-3"></i><span>Customers</span></a>
            <a href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.index') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-lock fa-fw me-3"></i><span>Customers</span></a>
            <a href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.index') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-lock fa-fw me-3"></i><span>Customers</span></a> <a
                href="{{ route('company.settings') }}"
                class="{{ request()->routeIs('company.settings') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-gear fa-fw me-3"></i><span>Settings</span></a>

        </div>
    </div>
</nav>
