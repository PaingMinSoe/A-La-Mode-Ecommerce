@extends('layouts.admin')

@section('title', 'Add Purchase')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Purchase</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Product to Purchase Form</h3>
                </div>
                <div class="card-body">
                    <div class="w-100 bg-gray" style="height: 1px;"></div>
                    <form action="{{ route('admin.purchases.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_id">Product</label><br>
                                <select name="product_id" id="product_id"
                                    class="selectpicker w-100 border rounded @error('product_id') is-invalid @enderror" data-style="btn-transparent" data-live-search="true" style="border-color: gray; background: transparent;">
                                    @foreach ($products as $product)
                                        <option data-tokens="{{ $product->id }}" value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name . ' - ' . $product->color . ' - ' . $product->size }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="quantity">Quantity Purchased</label>
                                <input type="number"
                                    class="form-control @error('quantity') is-invalid @enderror"id="quantity"
                                    name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="price" class="mr-2">Unit Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ old('price') }}" placeholder="150000 MMK">
                                @error('price')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>
                            Add</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th class="w-25">Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub-Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('purchase_details'))
                                @php $total = 0; @endphp
                                @foreach (Session::get('purchase_details') as $detail)
                                    @php
                                        $total += $detail['quantity'] * $detail['price'];
                                    @endphp
                                    <tr>
                                        <td>{{ $detail['product']->id }}</td>
                                        <td class="p-0">
                                            <img src="{{ asset('product_images/' . $detail['product']->front_image) }}"
                                                alt="{{ $detail['product']->name }}" class="w-100">
                                        </td>
                                        <td>
                                            {{ $detail['product']->name }}
                                        </td>
                                        <td>
                                            {{ $detail['quantity'] }}
                                        </td>
                                        <td>
                                            {{ $detail['price'] }}
                                        </td>
                                        <td>
                                            {{ $detail['sub_total'] }}
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger"
                                                href="{{ route('admin.purchases.remove', ['product' => $detail['product']]) }}"><i
                                                    class="fa-solid fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (Session::has('purchase'))
                                    <tr>
                                        <th colspan="5">Untaxed Total</th>
                                        <td colspan="2">{{ Session::get('purchase')['untaxed_total'] }} MMK</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5">VAT</th>
                                        <td colspan="2">{{ Session::get('purchase')['vat'] }} MMK</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Grand Total</th>
                                        <td colspan="2">{{ Session::get('purchase')['grand_total'] }} MMK</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <form action="{{ route('admin.purchases.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-12 col-lg-6">
                                                        <label for="purchase_date">Purchased Date</label>
                                                        <input type="date"
                                                            class="form-control @error('purchase_date') is-invalid @enderror"
                                                            id="purchase_date" name="purchase_date"
                                                            value="{{ now()->format('Y-m-d') }}">
                                                        @error('purchase_date')
                                                            <div class="form-text text-danger">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-12 col-lg-6">
                                                        <label for="admin_name">Registered By</label>
                                                        <input type="text"
                                                            class="form-control @error('admin_name') is-invalid @enderror"
                                                            id="admin_name" name="admin_name"
                                                            value="{{ old('admin_name', Auth::user()->name) }}" disabled>
                                                        @error('admin_name')
                                                            <div class="form-text text-danger">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-12 col-lg-6">
                                                        <label for="supplier_id">Supplier</label>
                                                        <select name="supplier_id" id="supplier_id"
                                                            class="form-select @error('supplier_id') is-invalid @enderror">
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}"
                                                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                                    {{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('size')
                                                            <div class="form-text text-danger">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-outline-success"><i
                                                        class="fa-solid fa-paper-plane"></i>
                                                    Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
