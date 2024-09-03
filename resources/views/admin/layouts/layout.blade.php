<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin-asset/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-asset/plugins/select2/css/select2.min.css') }}">


    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Right navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>                   
                </ul>
                <div class="navbar-nav pl-2">
                    <!-- <ol class="breadcrumb p-0 m-0 bg-white">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                </div>
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                            <img src="{{ asset('storage/'.Auth::user()->user_image) }}" class='img-circle elevation-2' width="40" height="40" alt="" style="object-fit: cover">
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                            <h4 class="h4 mb-0"><strong>{{ Auth::user()->name }}</strong></h4>
                            <div class="mb-3">{{ Auth::user()->email }}</div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-cog mr-2"></i> Settings                               
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-lock mr-2"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item text-danger">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout  
                                    </button>
                                </form>                       
                            </a>                            
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="{{ asset('admin-asset/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">News Blog</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>                                                                
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>News</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('slider.index') }}" class="nav-link">
                                    <i class="fas fa-sliders-h mr-2 ml-1"></i> 
                                    <p>Home Slider</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('featuredNews.index') }}" class="nav-link">
                                    <i class="fas fa-heart  mr-2 ml-1"></i>
                                    <p>Feature News</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tags.index') }}" class="nav-link">
                                    <i class="fas fa-tag mr-2 ml-1"></i>
                                    <p>Tags</p>
                                </a>
                            </li>                           
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="far fa-user mr-2 ml-1"></i>
                                    <p>Editor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('widget') }}" class="nav-link">
                                    <i class="fas fa-plus mr-2 ml-1"></i>
                                    <p>Widgets</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('setting') }}" class="nav-link">
                                    <i class="fas fa-cog  mr-2 ml-1"></i> 

                                    <p>Setting</p>
                                </a>
                            </li>                          
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                
                <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
            </footer>
            
        </div>
        <!-- ./wrapper -->
        

        <!-- jQuery -->
        <script src="{{ asset('admin-asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-asset/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- select2 --}}
        <script src="{{ asset('admin-asset/plugins/select2/js/select2.min.js') }}"></script>
        
        <script src="{{ asset('admin-asset/js/demo.js') }}"></script>

        @yield('customJs')
    </body>
</html>