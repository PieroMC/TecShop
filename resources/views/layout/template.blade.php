<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/plugins/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e466ec6b27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="shortcut icon" href="/img/home-banner-lary.ico" type="image/x-icon">
    <title>{{$page_name}} | TecShop</title>
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="index.html">
            <p>Tec<span>Shop</span></p>
        </a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">

            {{-- Notification Menu --}}
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                        class="fa fa-bell-o fa-lg"></i></a>
                <ul class="app-notification dropdown-menu dropdown-menu-right">
                    <li class="app-notification__title">
                        You have 4 new notifications.
                    </li>
                    <div class="app-notification__content">
                        <li>
                            <a class="app-notification__item" href="javascript:;"><span
                                    class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                            class="fa fa-circle fa-stack-2x text-primary"></i><i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">
                                        Lisa sent you a mail
                                    </p>
                                    <p class="app-notification__meta">
                                        2 min ago
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="app-notification__item" href="javascript:;"><span
                                    class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                            class="fa fa-circle fa-stack-2x text-danger"></i><i
                                            class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">
                                        Mail server not working
                                    </p>
                                    <p class="app-notification__meta">
                                        5 min ago
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="app-notification__item" href="javascript:;"><span
                                    class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                            class="fa fa-circle fa-stack-2x text-success"></i><i
                                            class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">
                                        Transaction complete
                                    </p>
                                    <p class="app-notification__meta">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </li>
                        <div class="app-notification__content">
                            <li>
                                <a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">
                                            Lisa sent you a mail
                                        </p>
                                        <p class="app-notification__meta">
                                            2 min ago
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-danger"></i><i
                                                class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">
                                            Mail server not working
                                        </p>
                                        <p class="app-notification__meta">
                                            5 min ago
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-success"></i><i
                                                class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">
                                            Transaction complete
                                        </p>
                                        <p class="app-notification__meta">
                                            2 days ago
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </div>
                    <li class="app-notification__footer">
                        <a href="#">See all notifications.</a>
                    </li>
                </ul>
            </li>

            {{-- User Menu --}}
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    {{-- <li>
                        <a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a>
                    </li> --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile', $user->id) }}"><i
                                class="fa fa-user fa-lg"></i> Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                alt="User Image" />
            <div>
                <p class="app-sidebar__user-name">
                    {{ $user->name .' '.$user->lastname }}
                </p>
                <p class="app-sidebar__user-designation">
                    {{ $user->workstation->work }}
                </p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item active" href="{{ route('home') }}">
                    <i class="app-menu__icon fa fa-home"></i>
                    <span class="app-menu__label">
                        {{__('Home')}}
                    </span>
                </a>
            </li>
            @if ($user->workstation->work == "ADMINISTRATOR")          
            <!-- usuarios -->
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">
                        {{__('Employees')}}
                    </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('employee') }}"><i class="icon fa fa-user"></i>
                            {{__('Employee')}}
                        </a>
                        <a class="treeview-item" href="{{route('user')}}"><i class="icon fas fa-id-badge"></i>
                            {{__('Users')}}
                        </a>

                    </li>
                </ul>
            </li>
            @endif
            @if ($user->workstation->work == "ADMINISTRATOR" || $user->workstation->work == "SELLER")
            <!-- ventas -->
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-user-tag"></i>
                    <span class="app-menu__label">
                        {{__('Sales')}}
                    </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        {{-- <a class="treeview-item" href="{{--route('client')"><i class="icon fas fa-user-tie"></i>
                            {{__('Clients')}}
                        </a> --}}
                        <a class="treeview-item" href="{{route('sale')}}"><i class="icon fab fa-shopify"></i>
                            {{__('Make sale')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            {{--@if ($user->workstation->work == "ADMINISTRATOR" || $user->workstation->work == "BUYER")

            <!-- compras -->
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-shopping-cart"></i>
                    <span class="app-menu__label">
                        Compras
                    </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>
                            Items
                        </a>
                        <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>
                            Items
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            --}}

            @if ($user->workstation->work == "ADMINISTRATOR" || $user->workstation->work == "WAREHOUSE")

            <!-- almacen -->
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-warehouse"></i>
                    <span class="app-menu__label">
                        {{__('warehouse')}}
                    </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        {{-- <a class="treeview-item" href="#"><i class=" icon fas fa-clipboard-list"></i>
                            {{__('Category')}}
                        </a> --}}
                        <a class="treeview-item" href="{{route('product')}}"><i class="icon fas fa-boxes"></i>
                            {{__('Product')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- reportes 

            

            <li>
                <a class="app-menu__item" href="#">
                    <i class="app-menu__icon far fa-file-alt"></i>
                    <span class="app-menu__label">
                        Reportes
                    </span>
                </a>
            </li>-->
        </ul>
    </aside>
    <main class="app-content">
        <div class="app-title py-4">
            <div>
                <h1><i class="{{$page_icon}} mr-2"></i>{{$page_name}}</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">{{$page_name}}</li>
                <li class="breadcrumb-item"><a href="#">{{$page_subpage}}</a></li>
            </ul>
        </div>

        @yield('content')
    </main>
    
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Essential javascripts for application to work-->
    @yield('script')
</body>

</html>