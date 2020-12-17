<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.png') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->name }}</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Admin</small>
                <span class="status-indicator online"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['staff']) }}">
      <a class="nav-link" data-toggle="collapse" href="#staff" aria-expanded="{{ is_active_route(['staff']) }}" aria-controls="staff">
      <i class="menu-icon mdi mdi-account-plus"></i>
        <span class="menu-title">Staff Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['staff/*']) }}" id="staff">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['staff/index']) }}">
            <a class="nav-link" href="{{ url('/staff/index') }}">View Staffs</a>
          </li>
          <li class="nav-item {{ active_class(['staff/create']) }}">
            <a class="nav-link" href="{{ url('/staff/create') }}">Add Staff</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class(['customer']) }}">
      <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="{{ is_active_route(['customer']) }}" aria-controls="customer">
      <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Customer Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['customer/*']) }}" id="customer">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['customer/index']) }}">
            <a class="nav-link" href="{{ url('/customer/index') }}">View Customers</a>
          </li>
          <li class="nav-item {{ active_class(['customer/create']) }}">
            <a class="nav-link" href="{{ url('/customer/create') }}">Add Customer</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class(['stock']) }}">
      <a class="nav-link" data-toggle="collapse" href="#stock" aria-expanded="{{ is_active_route(['stock']) }}" aria-controls="stock">
      <i class="menu-icon mdi mdi-view-dashboard"></i>
        <span class="menu-title">Stock Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['stock/*']) }}" id="stock">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['stock/index']) }}">
            <a class="nav-link" href="{{ url('/stock/index') }}">View Stocks</a>
          </li>
          <li class="nav-item {{ active_class(['stock/create']) }}">
            <a class="nav-link" href="{{ url('/stock/create') }}">Add Stock</a>
          </li>
          <li class="nav-item {{ active_class(['stock/logs']) }}">
            <a class="nav-link" href="{{ url('/stock/logs') }}">Stock Logs</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ active_class(['order']) }}">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="{{ is_active_route(['order']) }}" aria-controls="order">
      <i class="menu-icon mdi mdi-cart-outline"></i>
        <span class="menu-title">Order Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['order/*']) }}" id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['order/index']) }}">
            <a class="nav-link" href="{{ url('/order/index') }}">View Orders</a>
          </li>
          <li class="nav-item {{ active_class(['order/create']) }}">
            <a class="nav-link" href="{{ url('/order/create') }}">Book Order</a>
          </li>
        </ul>
      </div>
    </li>
    <!-- <li class="nav-item {{ active_class(['basic-ui/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['basic-ui/*']) }}" id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item {{ active_class(['charts/chartjs']) }}">
      <a class="nav-link" href="{{ url('/charts/chartjs') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['tables/basic-table']) }}">
      <a class="nav-link" href="{{ url('/tables/basic-table') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['icons/material']) }}">
      <a class="nav-link" href="{{ url('/icons/material') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['user-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="{{ is_active_route(['user-pages/*']) }}" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['user-pages/*']) }}" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['user-pages/login']) }}">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/register']) }}">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/lock-screen']) }}">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html" target="_blank">
        <i class="menu-icon mdi mdi-file-outline"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="#" target="_blank">
        <i class="menu-icon mdi mdi-settings"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link">
        <i class="menu-icon mdi mdi-login"></i>
        <span href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>