@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class=" font-weight-bold">Product Details</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="{{ route('admin.products.create') }}">
                        <i class="fa-solid fa-plus"></i> Add Color Variant
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $product->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="font-weight-bold">Price: </span>{{ $product->price }} MMK
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold">Quantity: </span>{{ $product->instock }} Pcs
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold">Category: </span>{{ $product->category->name }}
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold">Brand: </span>{{ $product->brand->name }}
                                </div>
                                <div class="col">
                                    <span class="font-weight-bold">Gender: </span>{{ $product->gender }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="mb-3">
                                        <h5 class="font-weight-bold">Colors Available of {{ $product->name }}</h5>
                                    </div>
                                    <table id="datatable"
                                        class="table table-hover table-bordered dataTable dt-responsive w-100">
                                        <thead>
                                            <tr>
                                                <th>Color</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($color_variants as $color_variant)
                                                <tr>
                                                    <th>
                                                        <div class="d-inline-block border border-1"
                                                            style="width: 30px; height: 15px; background: {{ $color_variant->color }};">
                                                        </div>
                                                        &nbsp;{{ $color_variant->color }}
                                                    </th>
                                                    <td>
                                                        <a href="" class="btn btn-outline-success">Add</a>
                                                        <a href="" class="btn btn-outline-primary">Edit</a>
                                                        <a href="" class="btn btn-outline-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                <thead>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                </thead>
                                                @foreach ($size_variants as $size_variant)
                                                    @if ($size_variant->color_variant_id == $color_variant->id)
                                                        <tr>
                                                            <td>{{ $size_variant->size }}</td>
                                                            <td>{{ $size_variant->quantity }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
