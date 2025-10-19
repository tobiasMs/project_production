<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            @php
                $masterActive = request()->routeIs('product.index') ? 'active' : '';
            @endphp
            <li class="pcoded-hasmenu pcoded-trigger {{ $masterActive }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Master</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                        <a href="{{ route('product.index') }}">
                            <span class="pcoded-mtext">Master Product</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard-crm.htm') ? 'active' : '' }}">
                        <a href="dashboard-crm.htm">
                            <span class="pcoded-mtext">Master Price</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard-crm.htm') ? 'active' : '' }}">
                        <a href="dashboard-crm.htm">
                            <span class="pcoded-mtext">Invoice Number</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        @yield('sidebar')
    </div>
</nav>
