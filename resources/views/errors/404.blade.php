@extends('layouts.master')

@section('title', '404')
@section('content')
    <section class="mt-5 d-flex justify-content-center align-items-center">
        <div class="card p-3 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <span class="card-title fw-bold display-1">404</span>
                <span class="text-muted">Page not Found</span>
                <p class="mt-3">
                    Looks like what you're looking for doesn't exist, or it's under maintenance.
                </p>
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-0 align-middle">Go Back <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
@endsection
