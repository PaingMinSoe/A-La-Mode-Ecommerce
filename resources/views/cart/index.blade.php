@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')
    <section class="cart">
        <div class="mt-4 pt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card w-100 border-0 rounded-0 bg-transparent">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">My Cart</h4>
                                <hr>
                                @if(Session::has('cart'))
                                    @foreach(Session::get('cart') as $item)
                                            <div class="container mb-3">
                                                <div class="row">
                                                    <div class="col-4 col-md-3">
                                                        <img src="{{ asset('product_images/' . $item['product']->front_image) }}" alt="{{ $item['product']->name }}" class="w-100 img-fluid" style="object-fit: cover; object-position: top;">
                                                    </div>
                                                    <div class="col-8 col-md-9">
                                                        <div class="d-flex flex-column w-100">
                                                            <div class="mb-3">
                                                                <a href="{{ route('products.show', ['product' => $item['product']]) }}" class="link-dark">
                                                                    <span class="fw-bold">{{ $item['product']->name }}</span>
                                                                </a><br>
                                                                <span class="text-muted">{{ $item['product']->id }}</span><br>
                                                                <span class="fw-bold">{{ $item['product']->price }} MMK</span>
                                                                <div class="mt-2">
                                                                    <a class="link-dark text-decoration-underline" href="{{ route('cart.remove', ['product' => $item['product']]) }}">Remove</a> &nbsp;
                                                                    <a class="link-dark text-decoration-underline" href="{{ route('cart.move', ['product' => $item['product']]) }}">Move to Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <select name="quantity" class="form-select w-25 quantity border-secondary rounded-0" id="quantity" data-id="{{ $item['product']->id }}">
                                                                @for($i=1; $i <= (($item['product']->instock <= 10) ? $item['product']->instock : 10); $i++)
                                                                    <option value="{{ $i }}" @if($i == $item['quantity']) selected @endif>{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                @else
                                    <div class="p-5 text-center w-100">
                                        <span class="fw-bold">Such Emptiness... <br> You can add something to buy :D</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(Session::has('order'))
                    <div class="col-12 col-lg-4">
                        <div class="card rounded-0 border-0 bg-transparent">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">Order Summary</h4>
                                <hr>
                                <div>
                                    <table class="table table-borderless w-100">
                                        <thead>
                                        <tr>
                                            <th colspan="2" class="h5">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ array_sum(array_column(Session::get('cart'), 'quantity')) }} Pcs</td>
                                            <td class="text-end">{{ Session::get('order')['untaxed_total'] }} MMK</td>
                                        </tr>
                                        <tr>
                                            <td>Delivery</td>
                                            <td class="text-end">FREE</td>
                                        </tr>
                                        <tr>
                                            <td>Total <br><span class="text-muted small">({{ Session::get('order')['vat'] }}MMK Exclusive Tax)</span></td>
                                            <td class="text-end">{{ Session::get('order')['grand_total'] }} MMK</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="{{ route('checkout.index') }}" class="btn btn-outline-dark w-100 rounded-0">Checkout <i class="fa-solid fa-arrow-right"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
        </div>
    </section>
@endsection
