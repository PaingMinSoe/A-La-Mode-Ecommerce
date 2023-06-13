@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <section class="cart">
        <div class="mt-4 pt-4">
            <div class="container">
                <div class="row">
                    <div class='error d-none'>
                        <div class='alert-danger alert'>Please correct the errors and try
                            again.</div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <form action="{{ route('checkout.store') }}" class="checkout_form" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                            @csrf
                            <h3 class="fw-bold">Delivery Address</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" class="form-control rounded-0 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" class="form-control rounded-0 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="delivery_address">Address</label>
                                        <textarea name="delivery_address" class="form-control rounded-0 @error('delivery_address') is-invalid @enderror" id="delivery_address" cols="30" rows="3">{{ old('address') }}</textarea>
                                        @error('delivery_address')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" id="phone_number" class="form-control rounded-0 @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="fw-bold mt-3">Payment Method</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 required">
                                        <label for="card_number">Card Number</label>
                                        <input type="text" name="card_number" id="card_number" class="form-control rounded-0" value="{{ old('card_number') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 required">
                                        <label for="name_on_card">Name on Card</label>
                                        <input type="text" name="name_on_card" id="name_on_card" class="form-control rounded-0" value="{{ old('name_on_card') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex mb-3">
                                        <div class="me-3 required">
                                            <label for="expiration_month">Expiration Month</label>
                                            <input type="text" maxlength="2" name="expiration_month" id="expiration_month" class="form-control rounded-0" value="{{ old('expiration_month') }}">
                                        </div>
                                        <div class="me-3 required">
                                            <label for="expiration_year">Expiration Year</label>
                                            <input type="text" maxlength="4" name="expiration_year" id="expiration_year" class="form-control rounded-0" value="{{ old('expiration_year') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 required">
                                        <label for="cvc">CVC</label>
                                        <input type="text" name="cvc" id="cvc" class="form-control rounded-0" maxlength="3" value="{{ old('cvc') }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-dark rounded-0">Place Order <i class="fa-solid fa-arrow-right align-middle"></i></button>
                        </form>
                    </div>
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
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h4 class="fw-bold">Order Details</h4>
                                <div class="d-flex flex-column">
                                        @foreach(Session::get('cart') as $item)
                                            @php $product = $item['product']; $quantity = $item['quantity']; @endphp
                                            <x-order-item class="mb-3" :product=$product :quantity=$quantity />
                                       @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
