@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Catalog</p>
                <h1 class="h2 mb-0">Edit product</h1>
            </div><a href="{{ route('admin.products.index') }}">← Products</a>
        </div>
        <div class="panel">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="name">Product name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="category_id">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @if ($categories->isEmpty())
                                    <option value="">no categories found</option>
                                @else
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="price">Price (EGP)</label>
                            <input class="form-control" id="price" name="price" type="number" min="0"
                                step="0.01" value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input class="form-control" id="stock" name="stock" type="number" min="0"
                                step="1" value="{{ old('stock', $product->stock) }}" required>
                            @error('stock')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image">Product image</label>

                            @if ($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="rounded border" style="max-height: 100px; object-fit: cover;">
                                </div>
                            @endif

                            <input class="form-control" id="image" name="image" type="file" accept="image/*">
                            <small class="text-muted">Leave it empty to keep the current image.</small>

                            @error('image')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save product</button>
                <a class="btn btn-light" href="{{ route('admin.products.index') }}">Cancel</a>
            </form>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
