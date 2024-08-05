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
                            <div class="collapse menu-dropdown" id="sidebarCalendar">

                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.ListCategory') }}" class="nav-link" data-key="t-main-calender"> Danh sách danh mục</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"
                                            data-key="t-month-grid">Thêm danh mục</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sliderNews" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sliderNews" data-key="t-calender">
                                Quản Lý Bài Viết
                            </a>
                            <div class="collapse menu-dropdown" id="sliderNews">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.news.ListNews') }}" class="nav-link" data-key="t-main-calender"> Danh sách Bài viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.news.addNews') }}" class="nav-link"
                                            data-key="t-month-grid">Thêm bài viết</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('client.home') }}" >
                    <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Quay về trang chính</span>
                </a>
            </li>


        </ul>
    </div>
    <!-- Sidebar -->
</div>
