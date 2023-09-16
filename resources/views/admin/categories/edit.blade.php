@extends('layouts.admin')

@section('title', 'Edit Category ' . $category->name)

@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1>Edit Category</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Edit Form</h3>
                </div>
                <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="category_name" name="name" value="{{ old('name', $category->name) }}">
                            @error('name')
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
