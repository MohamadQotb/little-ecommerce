@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Sales</p>
                <h1 class="h2 mb-0">Orders</h1>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
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
                        @if ($orders->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No orders found</td>
                            </tr>
                        @else
                            @foreach ($orders as $order)
                                @php
                                    $badgeClass = match ($order->status) {
                                        'pending' => 'badge-warm',
                                        'shipped' => 'bg-info-subtle text-info-emphasis',
                                        'delivered' => 'badge-soft',
                                        'cancelled' => 'bg-danger-subtle text-danger-emphasis',
                                        default => 'badge-soft',
                                    };
                                @endphp


                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td><span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td>EGP {{ $order->total }}</td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}">Details →</a></td>
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
                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
