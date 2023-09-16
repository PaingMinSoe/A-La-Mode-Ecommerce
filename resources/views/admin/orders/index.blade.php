@extends('layouts.admin')

@section('title', 'Order List')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Orders</h1>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover w-100">
                        <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Untaxed Total</th>
                            <th>VAT</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th>Ordered By</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($order->order_date)) }}</td>
                                <td>{{ $order->untaxed_total }} MMK</td>
                                <td>{{ $order->vat }} MMK</td>
                                <td>{{ $order->grand_total }} MMK</td>
                                <td><span class="badge @if($order->status == 'in progress')
                                                                bg-warning
                                                            @elseif($order->status == 'in delivery')
                                                                bg-primary
                                                            @elseif($order->status == 'completed')
                                                                bg-success @endif">{{ $order->status }}</span></td>
                                <td>{{ $order->user->name }}</td>
                                <td>
                                    <a class="btn btn-outline-warning"
                                       href="{{ route('admin.orders.show', ['order' => $order]) }}">
                                        <i class="fa-solid fa-eye"></i> Show
                                    </a>
                                    @if($order->status == 'in progress')
                                        <a href="{{ route('admin.orders.deliver', ['order' => $order]) }}" class="btn btn-outline-success"><i class="fa-solid fa-truck-fast"></i> Deliver</a>
                                    @elseif($order->status == 'in delivery')
                                        <a href="{{ route('admin.orders.complete', ['order' => $order]) }}" class="btn btn-outline-success"><i class="fa-solid fa-check"></i> Complete</a>
                                    @endif
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal{{ $order->id }}">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                    <div class="modal fade" id="deleteConfirmModal{{ $order->id }}" tabindex="-1"
                                         aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Order</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete {{ $order->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    <form
                                                        action="{{ route('admin.orders.destroy', ['order' => $order]) }}"
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
