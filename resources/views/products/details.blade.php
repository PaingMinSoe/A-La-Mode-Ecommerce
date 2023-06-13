@extends('layouts.master')

@section('title', $product->name)

@section('content')
    <section class="product-details">
        <div class="row g-0">
            <div class="col-12 col-lg-7">
                <div class="mb-3 d-flex flex-column flex-md-row">
                    <!-- Simple image -->
                    <a href="{{ asset('product_images/' . $product->front_image) }}" class="glightbox border border-white"
                        data-gallery="shoe-gallery">
                        <img src="{{ asset('product_images/' . $product->front_image) }}" class="w-100" alt="image" />
                    </a>
                    <a href="{{ asset('product_images/' . $product->back_image) }}"
                        class="glightbox border border-white" data-gallery="shoe-gallery">
                        <img src="{{ asset('product_images/' . $product->back_image) }}" class="w-100"
                            alt="image" />
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="p-5">
                    <h1 class="fw-bold">{{ $product->name }}</h1>
                    <span class="fw-bold">{{ $product->price }} MMK</span><br>
                    <span>by <b>{{ $product->brand->name }}</b></span><br>
                    @if($product->instock <= 5)
                        <span class="fw-bold text-danger">Only {{ $product->instock }} left Instock</span>
                    @endif
                    <div class="my-3">
                        <h6 class="fw-bold">Color</h6>
                        @foreach ($colors as $color)
                            <a href="{{ route('products.show', ['product' => $color]) }}">
                                <div class=" d-inline-block rounded rounded-circle border border-secondary"
                                    style="background: {{ $color->color }}; width: 30px; height: 30px; opacity: 0.7;">
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Sizes</h6>
                        <div class="d-flex flex-wrap">
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">XS</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">S</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">M</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">L</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">XL</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">2XL</button>--}}
{{--                                <button type="button" class="btn btn-outline-dark rounded-0">3XL</button> --}}
                            @foreach ($sizes as $size)
                                <a href={{ route('products.show', ['product' => $size]) }}
                                    class="btn btn-outline-dark rounded-0 {{ ($product->id == $size->id) ? 'active' : '' }}">{{ $size->size }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5
                                    d-flex">
                        <a href="{{ route('cart.add', ['product' => $product]) }}"
                            class="btn btn-dark add-to-cart fw-bold rounded-0 w-50 d-flex justify-content-between me-2">Add
                            to Cart <i class="bi bi-bag"></i></a>
                        @if(Auth::check())
                            <a href="{{ route(\App\Models\Wishlist::where('product_id', $product->id)
                                                      ->where('user_id', Auth::user()->id)->exists() ? 'wishlist.remove' : 'wishlist.add', ['product' => $product]) }}"
                               class="btn btn-outline-dark rounded-0">
                                <i class="bi bi-{{ \App\Models\Wishlist::where('product_id', $product->id)
                                                      ->where('user_id', Auth::user()->id)->exists() ? 'heart-fill' : 'heart' }}"></i>
                            </a>
                        @else
                            <a href="{{ route('wishlist.add', ['product' => $product]) }}" class="btn btn-outline-dark rounded-0">
                                <i class="bi bi-heart"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">Reviews ({{ $reviews->count() }})</h5>
                        <div>
                            @for($i=0; $i < $product->average_rating; $i++)
                                <i class="fa-solid fa-star text-warning"></i>
                            @endfor
                            <span class="fw-bold">({{ round($product->average_rating, 1) }})</span>
                        </div>
                    </div>
                    <form action="{{ route('reviews.store', ['product' => $product]) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <span>How do you rate this product?</span>
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" class="rate" name="rating" value="4"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label d-none"></label>
                            <textarea class="form-control @error('comment') is-invalid @enderror rounded-0" name="comment" id="comment" cols="30" rows="3" placeholder="Describe your experience."></textarea>
                            @if($errors->any())
                                <span class="invalid-feedback" role="alert">
                                    @foreach($errors->all() as $error)
                                        <strong>{{ $error }}</strong>
                                        <br>
                                    @endforeach
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-outline-dark rounded-0">Submit</button>
                    </form>
                    @foreach($reviews as $review)
                        <div class="d-flex flex-column p-2">
                            <div class="d-flex flex-row justify-content-between">
                                <span class="fw-bold">{{ $review->user->name }}</span>
                                <span class="text-muted">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <div>
                                @for($i = 0; $i < $review->rating; $i++)
                                    <i class="fa-solid fa-xs fa-star text-warning"></i>
                                @endfor
                            </div>
                            <div>
                                {{ $review->comment }}
                            </div>
                            @can('delete', $review)
                                <div>
                                    <a href="{{ route('reviews.destroy', ['review' => $review]) }}" class="link-dark text-decoration-underline">Remove</a>
                                </div>
                            @endcan
                        </div>
                    @endforeach
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
        <div class="p-3">
            <h4 class="fw-bold">You Might Also Like</h4>
            <div class="container py-3">
                <x-product-carousel>
                    @foreach ($suggests as $suggest)
                        <div class="item col">
                            <x-product-card :product=$suggest />
                        </div>
                    @endforeach
                </x-product-carousel>
            </div>
        </div>
    </section>
@endsection
