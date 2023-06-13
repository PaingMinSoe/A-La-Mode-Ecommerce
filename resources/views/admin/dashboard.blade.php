@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0">Admin Panel</h1>
            <div class="mt-3">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Purchases</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="archive"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="count-text mt-1 mb-3">{{ $purchaseCount }}</h1>
{{--                                <div class="mb-0">--}}
{{--                                    <span class="text-danger">--}}
{{--                                        -3.65%--}}
{{--                                    </span>--}}
{{--                                    <span class="text-muted">made this week</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Products</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="package"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="count-text mt-1 mb-3">{{ $productCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Users</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="count-text mt-1 mb-3">{{ $userCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Orders</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="shopping-bag"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="count-text mt-1 mb-3">{{ $orderCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Latest Purchases</h5>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0 w-100" id="datatable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Purchase Date</th>
                                    <th>Grand Total</th>
                                    <th>Status</th>
                                    <th>Registered By</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{ $purchase->purchase_date }}</td>
                                            <td>{{ $purchase->grand_total }}</td>
                                            <td><span class="badge @if($purchase->status == 'pending') bg-warning @elseif($purchase->status == 'approved') bg-primary @elseif($purchase->status == 'completed') bg-success @endif">{{ $purchase->status }}</span></td>
                                            <td>{{ $purchase->admin->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.purchases.show', ['purchase' => $purchase]) }}" class="btn btn-outline-warning"><i class="fa-solid fa-eye"></i> Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Monthly Sales</h5>
                            </div>
                            <div class="card-body d-flex w-100">
                                <div class="align-self-center chart chart-lg">
                                    <canvas id="chartjs-dashboard-bar"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <!-- /.row -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Bar chart
            var labels = {{ Js::from($labels) }};
            var sales = {{ Js::from($data) }};
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: sales,
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20,
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
