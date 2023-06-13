@extends('layouts.admin')

@section('title', 'Purchase List')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Purchases</h1>
        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-success" href="{{ route('admin.purchases.create') }}">
                    <i class="fa-solid fa-plus"></i> Add Purchase
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Purchase Details</h3>
                </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_details as $purchase_detail)
                                <tr>
                                    <td>{{ $purchase_detail->product->id }}</td>
                                    <td class="p-0">
                                        <img src="{{ asset('product_images/' . $purchase_detail->product->front_image) }}"
                                            alt="{{ $purchase_detail->product->name }}" class="w-100">
                                    </td>
                                    <td>{{ $purchase_detail->product->name }}</td>
                                    <td>{{ $purchase_detail->quantity }} Pcs</td>
                                    <td>{{ $purchase_detail->price }} MMK</td>
                                    <td>{{ $purchase_detail->sub_total }} MMK</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="5">Untaxed Total</th>
                                <td>{{ $purchase->untaxed_total }} MMK</td>
                            </tr>
                            <tr>
                                <th colspan="5">VAT</th>
                                <td>{{ $purchase->vat }} MMK</td>
                            </tr>
                            <tr>
                                <th colspan="5">Grand Total</th>
                                <td>{{ $purchase->grand_total }} MMK</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
