@extends('layouts.admin')

@section('title', 'Edit Supplier ' . $supplier->name)


@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Supplier</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Supplier Edit Form</h3>
                </div>
                <form action="{{ route('admin.suppliers.update', ['supplier' => $supplier]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="supplier_name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="supplier_name" name="name" value="{{ old('name', $supplier->name) }}">
                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $supplier->phone_number) }}">
                            @error('phone_number')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="3"
                                class="form-control @error('address') is-invalid @enderror">{{ old('address', $supplier->address) }}</textarea>
                            @error('address')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-pen-to-square"></i>
                            Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
