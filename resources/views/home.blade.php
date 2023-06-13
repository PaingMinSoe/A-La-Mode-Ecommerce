@extends('layouts.master')

@section('title', 'Profile')
@section('content')
    <section class="profile mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="nav flex-row flex-lg-column nav-pills nav-justified mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active rounded-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                        <button class="nav-link rounded-0" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Password</button>
                        <button class="nav-link rounded-0" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Orders</button>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <h4 class="fw-bold">Personal Information</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card mb-3 py-2">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Name</h5>
                                                <p class="card-text">
                                                    {{ Auth::user()->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mb-3 py-2">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Email</h5>
                                                <p class="card-text">
                                                    {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mb-3 py-2">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Address</h5>
                                                <p class="card-text">
                                                    {{ Auth::user()->address }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mb-3 py-2">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Phone Number</h5>
                                                <p class="card-text">
                                                    {{ Auth::user()->phone_number }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!-- Button trigger modal -->
                                        <a type="button" class="link-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Profile</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('home.update', ['user' => Auth::user()]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label text-md-end">{{ __('Name') }}</label>
                                                                <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" autofocus>
                                                                @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label text-md-end">{{ __('Email') }}</label>
                                                                <input id="email" type="text" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="email" autofocus>
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="form-label text-md-end">{{ __('Address') }}</label>
                                                                <textarea name="address" id="address" cols="30"
                                                                          rows="3" class="form-control rounded-0 @error('address') is-invalid @enderror">{{ old('address', Auth::user()->address) }}</textarea>
                                                                @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="phone_number" class="form-label text-md-end">{{ __('Phone Number') }}</label>
                                                                <input id="phone_number" type="text" class="form-control rounded-0 @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}" required autocomplete="name" autofocus>
                                                                @error('phone_number')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="old_password" class="form-label text-md-end">{{ __('Current Password') }}</label>
                                                                <input id="old_password" type="password" class="form-control rounded-0 @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" placeholder="Enter current password">
                                                                @error('current_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark rounded-0" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-dark rounded-0">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
                            <h4 class="fw-bold">Change Password</h4>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('home.password_update', ['user' => Auth::user()]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" name="old_password" id="old_password" class="form-control rounded-0 @error('old_password') is-invalid @enderror bg-transparent" placeholder="Enter Current Password" required>
                                            @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_password">New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control rounded-0 @error('new_password') is-invalid @enderror bg-transparent" required>
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark rounded-0"><i class="fa-solid fa-key"></i> Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <div class="container">
                                <div class="row">
                                    @if($orders->isEmpty())
                                        <div>Such Emptiness. Order something and fill the space :)))</div>
                                    @else
                                        @foreach($orders as $order)
                                            <div class="col-12">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div>Order Number: {{ $order->id }}</div>
                                                        <div>Order Date: {{ $order->order_date }}</div>
                                                        <div>Status: <span class="badge @if($order->status == 'in progress')
                                                                bg-warning
                                                            @elseif($order->status == 'approved')
                                                                bg-primary
                                                            @elseif($order->status == 'completed')
                                                                bg-success @endif">{{ $order->status }}</span>
                                                        </div>

                                                        <div class="container">
                                                            <div class="row">
                                                                @foreach($order_details as $detail)
                                                                    @php $product = $detail->product; $quantity = $detail->quantity; @endphp
                                                                    @if($detail->order_id == $order->id)
                                                                        <div class="col">
                                                                            <x-order-item class="mt-3" :product=$product :quantity=$quantity />
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
