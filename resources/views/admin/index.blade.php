@extends('layouts.admin.admin')

<!-- PAGE CONTENT START -->
@section('content')
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Store management</p>
                <h1 class="h2 mb-0">Overview</h1>
            </div><a class="btn btn-primary" href="{{ route('admin.products.create') }}">+ Add product</a>
        </div>
        <div class="row g-3 mb-5">
            <div class="col-6 col-lg-3">
                <div class="panel">
                    <p class="muted mb-1">Products</p>
                    <div class="stat-number">{{ $productsCount }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="panel">
                    <p class="muted mb-1">Customers</p>
                    <div class="stat-number">{{ $usersCount }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="panel">
                    <p class="muted mb-1">Orders</p>
                    <div class="stat-number">{{ $ordersCount }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="panel">
                    <p class="muted mb-1">Order value</p>
                    <div class="stat-number">{{ 'EGP ' . $ordersValue }}</div>
                </div>
            </div>
        </div>
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Latest activity</p>
                <h1 class="h2 mb-0">Recent orders</h1>
            </div><a href="{{ route('admin.orders.index') }}">View all →</a>
        </div>
        <div class="panel">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($recentOrders->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted mb-1">No recent orders</p>
                                    <p class="small text-muted">Orders will appear here once customers start placing them.
                                    </p>
                                </td>
                            </tr>
                        @else
                            @foreach ($recentOrders as $order)
                                <tr>
                                    @php
                                        $badgeClass = match ($order->status) {
                                            'pending' => 'badge-warm',
                                            'shipped' => 'bg-info-subtle text-info-emphasis',
                                            'delivered' => 'badge-soft',
                                            'cancelled' => 'bg-danger-subtle text-danger-emphasis',
                                            default => 'badge-soft',
                                        };
                                    @endphp
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td><span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span></td>
                                    <td>EGP {{ $order->total }}</td>
                                    <td><a href="{{ route('admin.orders.show', $order) }}">Details →</a></td>
                                </tr>
                            @endforeach
                        @endif
                        {{-- <tr>
                        <td>#1002</td>
                        <td>Omar Ali</td>
                        <td>2026-11-02</td>
                        <td><span class="badge badge-soft">Shipped</span></td>
                        <td>EGP 940</td>
                        <td><a href="order-1002.html">Details →</a></td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td>Sara Ahmed</td>
                        <td>2026-11-03</td>
                        <td><span class="badge badge-soft">Delivered</span></td>
                        <td>EGP 950</td>
                        <td><a href="order-1003.html">Details →</a></td>
                    </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </main>

@endsection
<!-- PAGE CONTENT END -->
