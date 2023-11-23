<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Maoni App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                {{-- <li>
                    <a href="/admin/login">
                        <div class="btn text-uppercase badge bg-light p-3 justify-content-center text-green badge-outline">
                            login
                        </div>
                    </a>
                </li> --}}

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <router-link to="/admin/dashboard" class="brand-link">
                {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">My Maoni App</span>
            </router-link>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image btn btn-primary btn-lg">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="info" id="info">
                        <p class="text-uppercase fw-bold text-wrap text-white">{{ Session::get('key')[0] }}</p>
                        <p class="text-uppercase fw-bold text-wrap text-white text-sm">{{ Session::get('key')[1] }}</p>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <router-link to="/admin/dashboard" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/class&teachers" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Classes and Teachers
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/my-class" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    My Class
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </router-link>
                        </li>

                        {{-- <li class="nav-item">
                            <router-link to="/admin/profile" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </router-link>
                        </li> --}}
                        {{-- <span class="right badge badge-danger">New</span> --}}

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Logout
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <form id="logoutForm" action="http://127.0.0.1:8000/api/admin/logout" method="POST">
                                        <button id="logoutForm" type="submit"
                                            class="nav-link badge-danger align-items-center justify-content-center d-flex text-uppercase">
                                            <p>
                                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                                Logout
                                            </p>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">
            <router-view></router-view>
        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="#">MyMaoni</a>.</strong> All rights
            reserved.
        </footer>
    </div>
</body>

</html>
