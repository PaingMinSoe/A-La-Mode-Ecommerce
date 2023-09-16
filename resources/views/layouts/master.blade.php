<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>À La Mode Apparel Store - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img/alamode_general.png" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Vesperr - v4.7.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="d-flex flex-column h-100">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                {{-- <h1><a href="index.html">À La Mode</a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{ route('index') }}"><img src="{{ asset('img/alamode_nav_logo.png') }}" alt=""
                        class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li><a href="{{ route('products.index') }}" class="nav-link">Products</a></li>
                    <li class="ps-3">
                        <form action="{{ route('products.index') }}" method="GET"
                            class="d-flex justify-content-center align-items-center">
                            <input type="text" class="form-control form-control-sm rounded-0" name="search"
                                placeholder="Enter keyword" value="{{ request('search') }}">
                            <button class="btn btn-outline-dark border-0">
                                <i class="bi bi-search fs-5"></i>
                            </button>
                        </form>
                    </li>
                    <li class="dropdown"><a href="#"><i class="bi bi-person-circle fs-4"></i></a>
                        <ul>
                            @if (Auth::check())
                                <li><a href="{{ route('home') }}">Profile</a>
                                </li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @elseif (Auth::guard('admin')->check())
                                <li><a href="{{ route('admin.dashboard') }}">Profile</a>
                                </li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li><a href="{{ route('login') }}">Log in</a>
                                </li>
                                <li><a href="{{ route('register') }}">Sign up</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{ route('wishlist.index') }}" class="nav-link"><i class="bi bi-heart fs-4"></i></a></li>
                    <li><a href="{{ route('cart.index') }}" class="nav-link position-relative">
                            <i class="bi bi-bag fs-4"></i>
                            @if(Session::has('cart') && !empty(Session::get('cart')))
                                <span class="d-inline d-lg-none badge rounded-pill bg-danger">{{ array_sum(array_column(Session::get('cart'), 'quantity')) }}</span>
                                <span class="position-absolute d-none d-lg-inline top-25 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ array_sum(array_column(Session::get('cart'), 'quantity')) }}
                            </span>
                            @endif
                        </a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main" class="py-4 flex-shrink-0">
            @yield('content')
    </main><!-- End #main -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="message" class="toast align-items-center text-bg-{{ Session::get('class') }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ Session::get('message') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer mt-auto">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>À La Mode</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('vendor/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>

        // Show Notification Message
        $(document).ready(function () {
            @if(Session::has('message'))
                $('#message').toast("show", {delay: 0, autoHide: true,});
            @endif

            // CVC Regex
            $("#cvc").keydown(function(e)
            {
                var test = /[A-Za-z ]/; //regex
                var value = String.fromCharCode(e.keyCode); //get the charcode and convert to char
                if (value.match(test)) {
                    return false; //dont display key if it is a number
                }
            });
        });

        // Responsive Cart Quantity Change
        (function(){
            const cart_quantity = document.querySelectorAll('.quantity');

            Array.from(cart_quantity).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id');
                    axios.patch(`/cart/update/${id}`, {
                        quantity: this.value
                    })
                        .then(function (response) {
                            console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
            });

            var $form = $(".checkout_form");

            $('form.checkout_form').bind('submit', function(e) {
                var $form = $(".checkout_form"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        cvc: $('#cvc').val(),
                        exp_month: $('#expiration_month').val(),
                        exp_year: $('#expiration_year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        })();
    </script>
</body>

</html>
