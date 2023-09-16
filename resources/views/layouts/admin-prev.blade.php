<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>À La Mode Apparel Store - @yield('title')</title>

    <link href="{{ asset('img/alamode_general.png') }}" rel="icon">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/DataTables-1.13.1/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/DataTables-1.13.1/css/responsive.bootstrap4.min.css') }}">

    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select2/select2-bootstrap-5-theme.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fa-solid fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-3">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-dark">
                        <input type="checkbox" class="custom-control-input" id="darkModeSwitch">
                        <label class="custom-control-label" for="darkModeSwitch"><i
                                class="dark-mode-switch-icon fa-solid text-warning fa-sun"></i></label>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('index') }}" class="brand-link">
                <img src="{{ asset('img/alamode_general.png') }}" alt="A La Mode"
                    class="brand-image img-circle elevation-3">
                <span class="brand-text fw-bold">À La Mode</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/adidas-superstar.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('admin.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}"
                                class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-shirt"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index') }}"
                                class="nav-link {{ request()->is('admin/brands*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-award"></i>

                                <p>
                                    Brands
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}"
                                class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-border-all"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.suppliers.index') }}"
                                class="nav-link {{ request()->is('admin/suppliers*') ? 'active' : '' }}">
                                {{-- <i class="nav-icon fa-solid fa-boxes-packing"></i> --}}
                                <i class="nav-icon fa-solid fa-warehouse"></i>
                                {{-- <i class="nav-icon fa-solid fa-truck-field"></i> --}}
                                <p>
                                    Suppliers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.purchases.index') }}"
                                class="nav-link {{ request()->is('admin/purchases*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-boxes-packing"></i>
                                <p>
                                    Purchases
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-receipt"></i>
                                <p>
                                    Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/deliveries*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-truck-fast"></i>
                                <p>
                                    Deliveries
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/employees*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user-tie"></i>
                                <p>
                                    Employees
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Logout
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">A La Mode</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte/js/adminlte.min.js') }}"></script>

    <!-- Database Table -->
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });

        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            // toastr.options.timeOut = 10000;
            @if (Session::has('error'))

                toastr.error('{{ Session::get('error') }}');
            @endif

            @if (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

        if (localStorage.getItem('mode') === 'dark') {
            darkMode();
        } else {
            lightMode();
        }

        $('#darkModeSwitch').click(function() {
            if ($('#darkModeSwitch').is(':checked')) {
                darkMode();
            } else {
                lightMode();
            }
        });

        function darkMode() {
            $('body').addClass('dark-mode');
            $('.navbar').removeClass('navbar-light').addClass('navbar-dark');
            $('.main-sidebar').removeClass('sidebar-light-primary').addClass('sidebar-dark-light');
            $('.dark-mode-switch-icon').removeClass('text-warning fa-sun').addClass('text-light fa-moon');
            $('#darkModeSwitch').prop("checked", true);
            localStorage.setItem('mode', 'dark');
        }

        function lightMode() {
            $('body').removeClass('dark-mode');
            $('.navbar').removeClass('navbar-dark').addClass('navbar-light');
            $('.main-sidebar').removeClass('sidebar-dark-light').addClass('sidebar-light-primary');
            $(".dark-mode-switch-icon").removeClass('text-light fa-moon').addClass('text-warning fa-sun');
            $('#darkModeSwitch').prop("checked", false);
            localStorage.setItem('mode', 'light');
        }

        $('#front_image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#front_preview_image').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#back_image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#back_preview_image').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);

        });

        function toggleAddForm() {
            $('.add-form').toggleClass('d-none');
        }

        $('.selectpicker').selectpicker();
    </script>
    <!-- DataTables -->
    <script src="{{ asset('vendor/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/responsive.bootstrap4.min.js') }}"></script>
</body>

</html>
