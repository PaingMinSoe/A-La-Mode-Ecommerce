@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <section class="products">
        <div class="container py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold">Products</h2>
                <p>Search whatever product you find to your liking!</p>
            </div>
            <div class="me-auto me-md-0">
                <button class="btn btn-outline-dark rounded-0 fw-semibold" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="ri-equalizer-line align-middle"></i>
                    Fliter & Sort</button>

                <div class="offcanvas offcanvas-end border-0 shadow shadow-sm" data-bs-scroll="true"
                    data-bs-backdrop="false" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">Filter & Sort</h5>
                        <a href="{{ route('products.index') }}" class="link-dark text-decoration-underline ms-auto">Clear
                            Filter</a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="" method="GET">
                            <div class="accordion" id="sortAccordion">
                                <div class="accordion-item rounded-0 border-dark">
                                    <h2 class="accordion-header" id="sortHeading">
                                        <button class="accordion-button fw-bold collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#sort" aria-expanded="true"
                                            aria-controls="sortCollapse">
                                            Sort By
                                        </button>
                                    </h2>
                                    <div id="sort" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <div>
                                                <input type="radio" class="btn-check" id="price_low_to_high"
                                                    autocomplete="off" name="sort" value="price_low_to_high"
                                                    @if (request('sort') && request('sort') == 'price_low_to_high') checked @endif>
                                                <label
                                                    class="btn check-label btn-outline-dark border-0 rounded-0 w-100 text-start"
                                                    for="price_low_to_high">Price (Low to High)</label>
                                            </div>

                                            <div>
                                                <input type="radio" class="btn-check" id="price_high_to_low"
                                                    autocomplete="off" name="sort" value="price_high_to_low"
                                                    @if (request('sort') && request('sort') == 'price_high_to_low') checked @endif>
                                                <label
                                                    class="btn check-label btn-outline-dark border-0 rounded-0 w-100 text-start"
                                                    for="price_high_to_low">Price (High to Low)</label>
                                            </div>

                                            <div>
                                                <input type="radio" class="btn-check" id="newest" autocomplete="off"
                                                    name="sort" value="newest"
                                                    @if (request('sort') && request('sort') == 'newest') checked @endif>
                                                <label
                                                    class="btn check-label btn-outline-dark border-0 rounded-0 w-100 text-start"
                                                    for="newest">Newest</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item rounded-0 border-dark">
                                    <h2 class="accordion-header" id="genderHeading">
                                        <button class="accordion-button fw-bold collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#gender" aria-expanded="true"
                                            aria-controls="genderCollapse">
                                            Gender
                                        </button>
                                    </h2>
                                    <div id="gender"class="accordion-collapse collapse"
                                         aria-labelledby="categoryHeading" data-bs-parent="#sortAccordion">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="gender[]"
                                                    value="Male" id="male"
                                                    @if (request('gender') && in_array('Male', request('gender'))) checked @endif>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="gender[]"
                                                    value="Female" id="female"
                                                    @if (request('gender') && in_array('Female', request('gender'))) checked @endif>
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item rounded-0 border-dark">
                                    <h2 class="accordion-header" id="categoryHeading">
                                        <button class="accordion-button fw-bold collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="true"
                                            aria-controls="categoryCollapse">
                                            Product Category
                                        </button>
                                    </h2>
                                    <div id="category" class="accordion-collapse collapse"
                                        aria-labelledby="categoryHeading" data-bs-parent="#sortAccordion">
                                        <div class="accordion-body">
                                            @foreach ($categories as $category)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="category[]"
                                                        value="{{ $category->name }}" id="{{ $category->name }}"
                                                        @if (request('category') && in_array($category->name, request('category'))) checked @endif>
                                                    <label class="form-check-label" for="{{ $category->name }}">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item rounded-0 border-dark">
                                    <h2 class="accordion-header" id="brandHeading">
                                        <button class="accordion-button fw-bold collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#brand" aria-expanded="true"
                                            aria-controls="brandCollapse">
                                            Brand
                                        </button>
                                    </h2>
                                    <div id="brand" class="accordion-collapse collapse"
                                        aria-labelledby="brandHeading" data-bs-parent="#sortAccordion">
                                        <div class="accordion-body">
                                            @foreach ($brands as $brand)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="brand[]"
                                                        value="{{ $brand->name }}" id="{{ $brand->name }}"
                                                        @if (request('brand') && in_array($brand->name, request('brand'))) checked @endif>
                                                    <label class="form-check-label" for="{{ $brand->name }}">
                                                        {{ $brand->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-dark rounded-0">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-0">
                @if ($products->isEmpty())
                    <div class="col-12 text-center">
                        <h4>Looks like we don't have what you're looking for <i class="fa-regular fa-face-sad-tear"></i>
                        </h4>
                        <h4> Maybe check out something else.</h4>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="col-6 col-md-6 col-lg-3">
                            <x-product-card :product=$product />
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="py-3">
                 {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
