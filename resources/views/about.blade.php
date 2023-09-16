@extends('layouts.master')
@section('title', 'About')
@section('content')
    <section class="cart">
        <div class="mt-4 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="fw-bold">About Us</h2>
                        &emsp;&emsp;&emsp;&emsp;&emsp;À La Mode first started out as a local apparel store that sells imported retailed clothing to the local region.
                        Currently, multiple physical stores are running across the country with fair amount of sucess and popularity.
                        It was founded in 2001 where they had been selling retail products they had imported from multiple brands to the local region.
                        Multiple branch stores are opened in different location of the country with several shareholders working together to improve the business locally.
                    </div>
                    <div class="col-12 col-lg-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('img/undraw_window_shopping_re_0kbm.svg') }}" alt="Illustration" width="40%">
                    </div>
                </div>
                <div class="row mt-3 mx-3 g-4">
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-body">
                                <h1 class="display-4 card-title text-center"><i class="fa-regular fa-comments"></i></h1>
                                <h5 class="card-title fw-bold text-center">Reliable Customer Services</h5>
                                <p class="card-text">
                                    The store takes pride in its abilities to be able to provide customers
                                    with all the support and services they need 24/7. The business is always
                                    there whenever our customers need something to ask or have a request concerning
                                    our products or complaints concerning our services.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-body">
                                <h1 class="display-4 card-title text-center"><i class="fa-solid fa-bag-shopping"></i></h1>
                                <h5 class="card-title fw-bold text-center">Top-Notch Quality</h5>
                                <p class="card-text">
                                    We guarantee the qualities of the product is top-notch and will not disappoint
                                    our customers. We are transparent with our products, their origins and their
                                    appearances are displayed in how it would come out in a real life. Each and every customers
                                    can trust our products.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-body">
                                <h1 class="display-4 card-title text-center"><i class="fa-solid fa-truck-fast"></i></h1>
                                <h5 class="card-title fw-bold text-center">Fast Delivery</h5>
                                <p class="card-text">
                                    The business will prepare the customers with all the items they ordered and
                                    deliver them to the desired locations. The products will be handled with care
                                    and will not be damaged in the slightest upon received by the customers. The
                                    products will be delivered only taking a short amount of time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 g-4" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="fw-bold">Physical Stores</h4>
                    <div class="col-12 col-lg-4">
                        <b>Street:</b> 2, Yadanar Thukha St. Kanna Middle Ward<br>
                        <b>Township:</b> Insein <br>
                        <b>State/province/area:</b> Yangon <br>
                        <b>Phone no:</b> +959265554412

                    </div>
                    <div class="col-12 col-lg-4">
                        <b>Street:</b> 22 Yuzana Street<br>
                        <b>Township:</b> Ta Ta 5 <br>
                        <b>State/province/area:</b> Mandalay <br>
                        <b>Phone no:</b> +95991555473
                    </div>
                    <div class="col-12 col-lg-4">
                        <b>Street:</b> 3 Kambawza St<br>
                        <b>Township:</b> Yay Aye Kwin Qtr <br>
                        <b>State/province/area:</b> Taunggyi <br>
                        <b>Phone no:</b> +959972447851
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
