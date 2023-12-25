<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>


    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">PAGES</span></li>
    <!-- Forms -->
    <!-- Child Menu Items -->
    <li class="menu-item {{ request()->routeIs('datainventories') ? 'active' : '' }}">
        <a href="{{ route('datainventories') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Elements">Inventories</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('sales.index') ? 'active' : '' }}">
        <a href="{{ route('sales.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Layouts">Sales</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('purchase.index') ? 'active' : '' }}">
        <a href="{{ route('purchase.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Layouts">Purchase</div>
        </a>
    </li>

</ul>