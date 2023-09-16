@extends('layouts.admin')

@section('title', 'order List')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Orders</h1>
        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-end">
{{--                <a class="btn btn-outline-success" href="{{ route('admin.orders.create') }}">--}}
{{--                    <i class="fa-solid fa-plus"></i> Add order--}}
{{--                </a>--}}
                @if($order->status == 'in progress')
                    <a href="" class="btn btn-outline-success"><i class="fa-solid fa-check"></i> Approve</a>
                @elseif($order->status == 'in delivery')
                    <a href="" class="btn btn-outline-success">Complete</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>
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
                        @foreach ($order_details as $order_detail)
                            <tr>
                                <td>{{ $order_detail->product->id }}</td>
                                <td class="p-0">
                                    <img src="{{ asset('product_images/' . $order_detail->product->front_image) }}"
                                         alt="{{ $order_detail->product->name }}" class="w-100">
                                </td>
                                <td>{{ $order_detail->product->name }}</td>
                                <td>{{ $order_detail->quantity }} Pcs</td>
                                <td>{{ $order_detail->price }} MMK</td>
                                <td>{{ $order_detail->sub_total }} MMK</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="5">Untaxed Total</th>
                            <td>{{ $order->untaxed_total }} MMK</td>
                        </tr>
                        <tr>
                            <th colspan="5">VAT</th>
                            <td>{{ $order->vat }} MMK</td>
                        </tr>
                        <tr>
                            <th colspan="5">Grand Total</th>
                            <td>{{ $order->grand_total }} MMK</td>
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
