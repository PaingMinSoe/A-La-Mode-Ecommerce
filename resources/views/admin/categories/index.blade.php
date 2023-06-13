@extends('layouts.admin')

@section('title', 'Category List')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Categories</h1>
        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-end">
                {{-- <button class="btn btn-outline-success" id="add-category-button" onclick="toggleAddForm()">
                            <i class="fa-solid fa-plus"></i> Add category
                        </button> --}}
                <a class="btn btn-outline-success" href="{{ route('admin.categories.create') }}">
                    <i class="fa-solid fa-plus"></i> Add category
                </a>
            </div>
            {{-- <a class="btn btn-outline-success" href="{{ route('admin.categories.create') }}">
                        <i class="fa-solid fa-plus"></i> Add category
                    </a> --}}
        </div>
    </div>


    <div class="row">
        <div class="col-12 d-none add-form">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table w-100">
                        <thead>
                            <tr>
                                <th class="w-50">Name</th>
                                <th class="w-50"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{-- <a class="btn btn-outline-warning"
                                                        href="{{ route('admin.categories.show', ['category' => $category]) }}">
                                                        <i class="fa-solid fa-eye"></i> Show
                                                    </a> --}}

                                        </div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('admin.categories.edit', ['category' => $category]) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal{{ $category->id }}">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteConfirmModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $category->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('admin.categories.destroy', ['category' => $category]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa-solid fa-trash-can"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
