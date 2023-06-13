@extends('layouts.admin')

@section('title', 'Admin List')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class=" font-weight-bold">Admins</h1>
        </div>
        <div class="col-sm-6">
            <div class="d-flex justify-content-end">
                @can('store', Auth::user())
                    <a class="btn btn-outline-success" href="{{ route('admin.admins.create') }}">
                        <i class="fa-solid fa-plus"></i> Add Admin
                    </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin List</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="w-25">Address</th>
                            <th>NRC Number</th>
                            <th>Phone Number</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>{{ $admin->nrc_number }}</td>
                                <td>{{ $admin->phone_number }}</td>
                                <td>
                                    @can('update', Auth::user())
                                        <a href="{{ route('admin.admins.update', ['admin' => $admin]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    @endcan
                                    @can('delete', $admin)
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal{{ $admin->id }}">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteConfirmModal{{ $admin->id }}" tabindex="-1"
                                             aria-labelledby="deleteConfirmModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Admin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete {{ $admin->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('admin.admins.destroy', ['admin' => $admin]) }}"
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
