<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="pcoded-hasmenu">
                        <a>
                            <span class="pcoded-mtext">Menu 1</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <a href="analytics-overview.htm">
                                    <span class="pcoded-mtext">LLL Master Insert</span>
                                </a>
                            </li>
                            <li>
                                <a href="analytics-reports.htm">
                                    <span class="pcoded-mtext">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="dashboard-crm.htm">
                            <span class="pcoded-mtext">CRM</span>
                        </a>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a>
                            <span class="pcoded-mtext">Analytics</span>
                            <span class="pcoded-badge label label-info ">NEW</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <a href="analytics-overview.htm">
                                    <span class="pcoded-mtext">Overview</span>
                                </a>
                            </li>
                            <li>
                                <a href="analytics-reports.htm">
                                    <span class="pcoded-mtext">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        @yield('sidebar')
    </div>
</nav>
