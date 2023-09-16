@extends('layouts.admin')

@section('title', 'Add Brand')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Brand</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Brand Add Form</h3>
                </div>
                <form action="{{ route('admin.brands.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="brand_name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="brand_name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>
                            Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
