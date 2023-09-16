@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1>Add Category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Add Form</h3>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="category_name" name="name" value="{{ old('name') }}">
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
