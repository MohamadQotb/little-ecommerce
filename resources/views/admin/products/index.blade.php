@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Catalog</p>
                <h1 class="h2 mb-0">Products</h1>
            </div><a class="btn btn-primary" href="{{ route('admin.products.create') }}">+ Add product</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="panel">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No products found.</td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if ($product->image)
                                            <img class="thumb me-2" src="{{ asset('storage/' . $product->image) }}"
                                                alt="">
                                        @else
                                            <img class="thumb me-2" src="{{ asset('images/no-image.png') }}" alt="">
                                        @endif
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ 'EGP ' . $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td><a class="btn btn-sm btn-outline-primary me-2"
                                            href="{{ route('admin.products.edit', $product) }}">Edit
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        {{-- <tr>
                            <td><img class="thumb me-2" src="../assets/images/mug.svg" alt="">Ceramic Mug</td>
                            <td>Home</td>
                            <td>EGP 290</td>
                            <td>60</td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="product-edit-2.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img class="thumb me-2" src="../assets/images/headphones.svg" alt="">Wireless
                                Headphones</td>
                            <td>Electronics</td>
                            <td>EGP 890</td>
                            <td>18</td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="product-edit-3.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img class="thumb me-2" src="../assets/images/lamp.svg" alt="">Desk Lamp</td>
                            <td>Home</td>
                            <td>EGP 650</td>
                            <td>12</td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="product-edit-4.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img class="thumb me-2" src="../assets/images/shirt.svg" alt="">Cotton T-shirt</td>
                            <td>Clothing</td>
                            <td>EGP 450</td>
                            <td>40</td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="product-edit-5.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td><img class="thumb me-2" src="../assets/images/watch.svg" alt="">Classic Watch</td>
                            <td>Accessories</td>
                            <td>EGP 1,200</td>
                            <td>9</td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="product-edit-6.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr> --}}
                    </tbody>
                </table>
                @if ($products->hasPages())
                    <div class="card-footer bg-white py-3">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
