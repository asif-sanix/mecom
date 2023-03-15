<div class="dashboard-menu">
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link @yield('dashboard')"  href="{{ route('user.dashboard') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#orders"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#address"><i class="fi-rs-marker mr-10"></i>My Address</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('profile')" href="{{ route('user.profile') }}"><i class="fi-rs-user mr-10"></i>Account details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('password-change')" href="{{ route('user.password.change') }}"><i class="fi-rs-lock mr-10"></i>Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
        </li>
    </ul>
</div>