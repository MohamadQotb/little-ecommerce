@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Order details</p>
                <h1 class="h2 mb-0">Order #{{ $order->id }}</h1>
            </div><span class="badge badge-soft">{{ $order->status }}</span>
        </div>
        <div class="panel mb-4">
            <p><strong>{{ $order->recipient_name }}</strong> · {{ $order->created_at }}</p>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit price</th>
                            <th scope="col">Line total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->pivot->product_name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>EGP {{ $product->pivot->unit_price }}</td>
                                <td>EGP {{ $product->pivot->unit_price * $product->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <div class="d-flex justify-content-between">
                            <p>Subtotal</p>
                            <p>EGP {{ $order->subtotal }} </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Shipping</p>
                            <p>EGP {{ $order->shipping_cost }}</p>
                        </div>
                        <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
                            <p>Total</p>
                            <p>EGP {{ $order->total }} </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel">
            <h2 class="h5">Delivery details</h2>
            <p>{{ $order->shipping_address . ',' . $order->city }}<br>Phone:
                {{ $order->phone }}<br>{{ $order->payment_method }}</p>
        </div>
        <div class="panel mt-4">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="status">Update order status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save status</button>
            </form>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
