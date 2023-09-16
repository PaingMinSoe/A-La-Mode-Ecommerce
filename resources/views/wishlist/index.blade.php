@extends('layouts.master')

@section('title', 'Wishlist')
@section('content')
    <section class="wishlist mt-5">
        <div class="container">
            <h4 class="fw-bold">My Wishlist</h4>
            <div class="row g-0">
                @if(isset($wishlists) && !$wishlists->isEmpty())
                    @foreach($wishlists as $wishlist)
                        <div class="col-6 col-md-3">
                            <x-product-card :product="$wishlist->product" />
                        </div>
                    @endforeach
                @else
                    <div class="d-flex w-100 my-auto justify-content-center align-items-center">
                        <h4>Nothing in the Wishlist...</h4>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
