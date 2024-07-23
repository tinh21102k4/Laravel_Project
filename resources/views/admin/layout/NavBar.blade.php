<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('admins/assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('admins/assets/images/logo-dark.png') }}" alt="" height="17">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('admins/assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('admins/assets/images/logo-light.png') }}" alt="" height="17">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarDashboards">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link" data-key="t-analytics">
                                Analytics </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.UserManager') }}" class="nav-link" data-key="t-crm">Quản Lý Người Dùng </a>
                        </li>
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarApps">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Ứng Dụng</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                Quản Lý Danh Mục
                            </a>
                            {{-- <div class="collapse menu-dropdown" id="sidebarCalendar">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-calendar.html" class="nav-link" data-key="t-main-calender"> Main
                                            Calender </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-calendar-month-grid.html" class="nav-link"
                                            data-key="t-month-grid"> Month Grid </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Quản Lý Tin Tức </a>
                        </li>
                        
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span> <span
                        class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarLayouts">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="layouts-horizontal.html" target="_blank" class="nav-link"
                                data-key="t-horizontal">Horizontal</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-detached.html" target="_blank" class="nav-link"
                                data-key="t-detached">Detached</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-two-column.html" target="_blank" class="nav-link"
                                data-key="t-two-column">Two Column</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-vertical-hovered.html" target="_blank" class="nav-link"
                                data-key="t-hovered">Hovered</a>
                        </li>
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bảo Mật</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAuth">
                    <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAuth">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="maps-google.html" class="nav-link" data-key="t-google">
                                Google
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarLanding">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="landing.html" class="nav-link" data-key="t-one-page"> One Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="nft-landing.html" class="nav-link" data-key="t-nft-landing"> NFT
                                Landing </a>
                        </li>
                        <li class="nav-item">
                            <a href="job-landing.html" class="nav-link" data-key="t-job">Job</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMaps">
                    <i class="ri-map-pin-line"></i> <span data-key="t-maps">Maps</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarMaps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="maps-google.html" class="nav-link" data-key="t-google">
                                Google
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
    <!-- Sidebar -->
</div>
