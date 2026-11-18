@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Catalog</p>
                <h1 class="h2 mb-0">Categories</h1>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row g-4">
            <div class="col-lg-8 panel">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Products</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center">No categories found.</td>
                                </tr>
                            @else
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->products_count }}</td>
                                        <td>
                                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{-- <tr>
                                <td>Home</td>
                                <td>2</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#demoModal">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Electronics</td>
                                <td>1</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#demoModal">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Clothing</td>
                                <td>1</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#demoModal">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Accessories</td>
                                <td>1</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#demoModal">Delete</button></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel">
                    <h2 class="h5 mb-4">Add category</h2>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Category name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div><button type="submit" class="btn btn-primary">Save category</button>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
