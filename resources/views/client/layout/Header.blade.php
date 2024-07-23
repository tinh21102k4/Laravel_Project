<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="{{ route('client.home') }}">
            <img class="img-fluid" width="100px" src="{{ asset('clients/images/logo.png') }}"
                alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('client.home') }}" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Trang Chủ <i class="ti-angle-down ml-1"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Danh Mục <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($category as $cate)
                            <a class="dropdown-item"
                                href="{{ route('client.productCate', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">Shop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Tài Khoản <i class="ti-angle-down ml-1"></i>
                        @endauth
                    </a>
                    <div class="dropdown-menu">
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a>
                        @else
                            @if (Auth::user()->role == 1)
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị website</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </li>

            </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">
            <select class="m-2 border-0 bg-transparent" id="select-language">
                <option id="en" value="" selected>En</option>
                <option id="fr" value="">Fr</option>
            </select>

            <!-- search -->
            <form class="search-bar" action='{{ route('client.resultSearch') }}' method='GET'>
                @csrf
                <input id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
                <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                    data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
            </form>
        </div>

    </nav>
</div>
