@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="m-0">Admin Information</h1>
            <div class="row mt-3">
                <div class="col-lg-3 mb-3 text-center text-lg-start">
                    <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" alt="" class="profile-image img-thumbnail rounded-circle">
                </div>
                <div class="col-lg-9">
                    <h4 class="fw-bold">Edit Profile</h4>
                    <form action="{{ route('admin.profile.update', ['admin' => Auth::user()]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-2 col-form-label">Username</label>
                            <div class="col-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
                                @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-2 col-form-label">Email</label>
                            <div class="col-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-2 col-form-label">Address</label>
                            <div class="col-10">
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" cols="30" rows="5">{{ old('address', Auth::user()->address) }}</textarea>
                                @error('address')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nrc_number" class="col-2 col-form-label">NRC Number</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="nrc_number" id="nrc_number" value="{{ old('nrc_number', Auth::user()->nrc_number) }}">
                                @error('nrc_number')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-2 col-form-label">Phone Number</label>
                            <div class="col-10">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}">
                                @error('phone_number')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profile_image" class="col-2 col-form-label">Profile Image</label>
                            <div class="col-10">
                                <input type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image" value="{{ old('profile_image') }}">
                                @error('profile_image')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex mt-2 align-items-center justify-content-between">
                                <label for="gender">Gender</label>
                                <div class="col-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male"
                                               value="Male" {{ old('gender', Auth::user()->gender) == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female"
                                               value="Female" {{ old('gender', Auth::user()->gender) == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="current_password" class="col-2 col-form-label">Current Password</label>
                            <div class="col-10">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" placeholder="Enter current password to save changes">
                                @error('current_password')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Save</button>
                    </form>
                    <div class="mt-3">
                        <h4 class="fw-bold">Change Password</h4>
                        <form action="{{ route('admin.profile.password_update', ['admin' => Auth::user()]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="old_password" class="col-2 col-form-label">Old Password</label>
                                <div class="col-10">
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password" placeholder="Enter Current Password">
                                    @error('old_password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="new_password" class="col-2 col-form-label">New Password</label>
                                <div class="col-10">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password">
                                    @error('new_password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
