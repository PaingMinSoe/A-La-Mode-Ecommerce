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
                    <h3 class="card-title">Purchase List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>Purchase Date</th>
                                <th>Untaxed Total</th>
                                <th>VAT</th>
                                <th>Grand Total</th>
                                <th>Status</th>
                                <th>Registered By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($purchase->purchase_date)) }}</td>
                                    <td>{{ $purchase->untaxed_total }} MMK</td>
                                    <td>{{ $purchase->vat }} MMK</td>
                                    <td>{{ $purchase->grand_total }} MMK</td>
                                    <td><span class="badge @if($purchase->status == 'pending')
                                                                bg-warning
                                                            @elseif($purchase->status == 'approved')
                                                                bg-primary
                                                            @elseif($purchase->status == 'completed')
                                                                bg-success @endif">{{ $purchase->status }}</span></td>
                                    <td>{{ $purchase->admin->name }}</td>
                                    <td>
                                        <a class="btn btn-outline-warning"
                                            href="{{ route('admin.purchases.show', ['purchase' => $purchase]) }}">
                                            <i class="fa-solid fa-eye"></i> Show
                                        </a>
                                        @can('update', $purchase)
                                            @if($purchase->status == 'pending')
                                                <a href="{{ route('admin.purchases.approve', ['purchase' => $purchase]) }}" class="btn btn-outline-success"><i class="fa-solid fa-thumbs-up"></i> Approve</a>
                                            @elseif($purchase->status == 'approved')
                                                <a href="{{ route('admin.purchases.complete', ['purchase' => $purchase]) }}" class="btn btn-outline-success"><i class="fa-solid fa-check"></i> Complete</a>
                                            @endif
                                        @endcan
                                        @can('delete', $purchase)
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmModal{{ $purchase->id }}">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                            <div class="modal fade" id="deleteConfirmModal{{ $purchase->id }}" tabindex="-1"
                                                 aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Purchase</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete {{ $purchase->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            <form
                                                                action="{{ route('admin.purchases.destroy', ['purchase' => $purchase]) }}"
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
                                        @endcan
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
