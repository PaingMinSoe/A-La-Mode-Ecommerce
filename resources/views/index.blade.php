@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="fw-bold display-5">The Marketplace for Cool Apparel</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400" class="fs-4">Browse through a collection of clothing from multiple
                        major brands
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800" class="mt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg rounded-0">Get
                            Started <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex justify-content-center align-items-center"
                    data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('img/trio 21 track jacket removed bg.png') }}" class="img-fluid" width="75%"
                        alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <h2 class="fw-bold" data-aos="fade-up">New Arrivals</h2>
            <div class="row content">
                <div class="col-12"  data-aos="fade-left" data-aos-delay="150">
                    <x-product-carousel>
                        @foreach ($products as $product)
                            <div class="item col">
                                <x-product-card :product=$product />
                            </div>
                        @endforeach
                    </x-product-carousel>
                </div>
            </div>
        </div>
    </section>
    <section id="category-section" class="category-section">
        <div class="container">
            <h4 data-aos="fade-up" class="fw-bold">Shop by categories</h4>
            <div class="row content">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
                    <div class="row g-2">
                        @foreach($categories as $category)
                            <div class="col-lg-3">
                                <a href="/products?category[]={{ $category->name }}" class="link-dark">
                                    <div class="card category-card">
                                        <div class="card-body">
                                            {{ $category->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <p>
                        The business has been running since 2001 with royal customers and great popularity. The
                        business takes great pride upon these qualities.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> On-Time Delivery of your product</li>
                        <li><i class="ri-check-double-line"></i> Multiple stores located across the city</li>
                        <li><i class="ri-check-double-line"></i> Customer royalty satisfied with transparency and truthfulness</li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <p>
                        À La Mode first started out as a local apparel store that sells imported retailed clothing
                        to the local region. Currently, multiple physical stores are running across the country
                        with fair amount of sucess and popularity.
                    </p>
                    <a href="#" class="btn btn-outline-dark rounded-0">Learn More <i class="fa-solid fa-arrow-right align-middle"></i></a>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
@endsection
