<!-- Sidebar -->
<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar"
>
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ url('index') }}"
    >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Components -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
        >
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('buttons') }}">Buttons</a>
                <a class="collapse-item" href="{{ url('cards') }}">Cards</a>
            </div>
        </div>
    </li>

    <!-- Utilities -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseUtilities"
        >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('utilities-color') }}">Colors</a>
                <a class="collapse-item" href="{{ url('utilities-border') }}">Borders</a>
                <a class="collapse-item" href="{{ url('utilities-animation') }}">Animations</a>
                <a class="collapse-item" href="{{ url('utilities-other') }}">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Pages -->
    <li class="nav-item">
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapsePages"
        >
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ url('login') }}">Login</a>
                <a class="collapse-item" href="{{ url('register') }}">Register</a>
                <a class="collapse-item" href="{{ url('forgot-password') }}">Forgot Password</a>

                <div class="collapse-divider"></div>

                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="{{ url('404') }}">404 Page</a>
                <a class="collapse-item" href="{{ url('blank') }}">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('charts') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>

    <!-- Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('tables') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img
            class="sidebar-card-illustration mb-2"
            src="{{ asset('img/undraw_rocket.svg') }}"
            alt="..."
        />
        <p class="text-center mb-2">
            <strong>SB Admin Pro</strong> is packed with premium features,
            components, and more!
        </p>
        <a
            class="btn btn-success btn-sm"
            href="https://startbootstrap.com/theme/sb-admin-pro"
        >
            Upgrade to Pro!
        </a>
    </div>
</ul>
<!-- End of Sidebar -->
