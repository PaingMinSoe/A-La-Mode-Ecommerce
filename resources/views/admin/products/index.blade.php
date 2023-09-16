@extends('layouts.admin')

@section('title', 'Product List')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Products</h1>
        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-success" href="{{ route('admin.products.create') }}">
                    <i class="fa-solid fa-plus"></i> Add Product
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table w-100">
                        <thead>
                            <tr>
                                <th>SKU ID</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Gender</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-bold">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>
                                        <div class="d-inline-block border border-1"
                                            style="width: 30px; height: 15px; background: {{ $product->color }}; opacity: 0.7;">
                                        </div>
                                        &nbsp;{{ $product->color }}
                                    </td>
                                    <td>{{ $product->gender }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        {{-- <a class="btn btn-outline-warning"
                                                    href="{{ route('admin.products.show', ['product' => $product]) }}">
                                                    <i class="fa-solid fa-eye"></i> Show
                                                </a> --}}
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('admin.products.edit', ['product' => $product]) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal{{ $product->id }}">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteConfirmModal{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $product->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('admin.products.destroy', ['product' => $product]) }}"
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
                                        {{-- <a class="btn btn-outline-danger"
                                                    href="{{ route('admin.products.destroy', ['product' => $product]) }}">
                                                    <i class="fa-solid fa-trash-can"></i> Delete
                                                </a> --}}
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
