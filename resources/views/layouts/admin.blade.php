<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('img/alamode_file_small.png') }}">
    <title>À La Mode Apparel Store | @yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('vendor/adminkit/css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/DataTables-1.13.1/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/DataTables-1.13.1/css/responsive.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('index') }}">
                    <span class="align-middle">
                        À La Mode
                    </span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>

                    <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.profile') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Functions
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/products*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.products.index') }}">
                            <i class="align-middle" data-feather="package"></i> <span
                                class="align-middle">Products</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/brands*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.brands.index') }}">
                            <i class="align-middle" data-feather="award"></i> <span class="align-middle">Brands</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                            <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Categories</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/suppliers*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.suppliers.index') }}">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Suppliers</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/purchases*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.purchases.index') }}">
                            <i class="align-middle" data-feather="archive"></i> <span
                                class="align-middle">Purchases</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.orders.index') }}">
                            <i class="align-middle" data-feather="shopping-bag"></i> <span
                                class="align-middle">Orders</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('admin/admins*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.admins.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span
                                class="align-middle">Admins</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="align-middle text-danger" data-feather="log-out"></i> <span
                                class="align-middle">Log out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light bg-white">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}"
                                    class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" style="object-fit:cover; object-position:top;" /> <span
                                    class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="align-middle me-1"
                                        data-feather="settings"></i> Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="align-middle me-1"
                                        data-feather="log-out"></i>Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>

            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="message" class="toast align-items-center text-bg-{{ Session::get('class') }} border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ Session::get('message') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="https://adminkit.io/"
                                    target="_blank"><strong>À La Mode</strong></a> - <a class="text-muted"
                                    href="https://adminkit.io/" target="_blank"><strong> Admin
                                        Panel</strong></a> &copy;
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- AdminKit -->
    <script src="{{ asset('vendor/adminkit/js/app.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.3.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('vendor/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.1/js/responsive.bootstrap.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('vendor/chart.js/chart.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "responsive": true
            });

            @if(Session::has('message'))
                $('#message').toast("show", {delay: 0, autoHide: true,});
            @endif

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

            $('#product_id').selectpicker();

            $('#profile_image').click(function () {
                $('#profile_image_upload').click();
            });

            $('#profile_image_upload').change(function (){
                if ( this.files && this.files[0] ){
                    $('#profile_image').attr('src',
                        window.URL.createObjectURL(this.files[0]) );
                }
            });

        });
    </script>
</body>

</html>
