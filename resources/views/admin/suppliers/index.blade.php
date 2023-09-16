@extends('layouts.admin')

@section('title', 'Supplier List')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Suppliers</h1>
        </div>
        <div class="col-sm-6">
            <div class=" d-flex justify-content-end">
                <a class="btn btn-outline-success" href="{{ route('admin.suppliers.create') }}">
                    <i class="fa-solid fa-plus"></i> Add Supplier
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Supplier List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th class="w-50">Name</th>
                                <th class="w-50"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{-- <a class="btn btn-outline-warning"
                                                        href="{{ route('admin.suppliers.show', ['supplier' => $supplier]) }}">
                                                        <i class="fa-solid fa-eye"></i> Show
                                                    </a> --}}

                                        </div>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('admin.suppliers.edit', ['supplier' => $supplier]) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal{{ $supplier->id }}">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteConfirmModal{{ $supplier->id }}" tabindex="-1"
                                            aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Supplier</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $supplier->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('admin.suppliers.destroy', ['supplier' => $supplier]) }}"
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
                                                    href="{{ route('admin.suppliers.destroy', ['supplier' => $supplier]) }}">
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
