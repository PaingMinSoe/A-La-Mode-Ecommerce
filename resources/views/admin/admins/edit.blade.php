@extends('layouts.admin')

@section('title', 'Edit Admin')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Admin</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Edit Form</h3>
                </div>
                <form action="{{ route('admin.admins.update', ['admin'=>$admin]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <img src="{{ asset('profile_images/' . $admin->profile_image) }}" width="200" height="200" id="profile_image" class="profile-image img-thumbnail rounded-circle @error('profile_image') is-invalid @enderror" alt="Profile Picture" style="cursor: pointer;">
                                <input type="file" class="d-none" id="profile_image_upload" name="profile_image">
                                @error('profile_image')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $admin->name) }}">
                                @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="3">{{ old('address', $admin->address) }}</textarea>
                                @error('address')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="nrc_number">NRC Number</label>
                                <input type="text"
                                       class="form-control @error('nrc_number') is-invalid @enderror" id="nrc_number" name="nrc_number"
                                       value="{{ old('nrc_number', $admin->nrc_number) }}">
                                @error('nrc_number')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="phone_number" class="mr-2">Phone Number</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                       id="phone_number" name="phone_number" value="{{ old('phone_number', $admin->phone_number) }}">
                                @error('phone_number')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="password" class="mr-2">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="gender" class="mr-2">Gender</label>
                                <div class="d-flex mt-2 align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male"
                                               value="Male" {{ old('gender', $admin->gender) == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female"
                                               value="Female" {{ old('gender', $admin->gender) == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="role" class="mr-2">Role</label>
                                <select name="role" id="role"
                                        class="form-select @error('role') is-invalid @enderror">
                                    <option value="admin" {{ ($admin->role == 'admin') ? 'selected' : '' }}>Admin</option>
                                    <option value="staff" {{ ($admin->role == 'staff') ? 'selected' : '' }}>Staff</option>
                                </select>
                                @error('role')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>
                            Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
