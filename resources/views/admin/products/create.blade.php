@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">Catalog</p>
                <h1 class="h2 mb-0">Add product</h1>
            </div><a href="{{ route('admin.products.index') }}">← Products</a>
        </div>
        <div class="panel">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="name">Product name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="category_id">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @if ($categories->isEmpty())
                                    <option value="">No Categories Found</option>
                                @else
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif
                                {{-- <option value="2">Home</option>
                                <option value="3">Electronics</option>
                                <option value="4">Clothing</option>
                                <option value="5">Accessories</option> --}}
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="price">Price (EGP)</label>
                            <input class="form-control" id="price" name="price" type="number" min="0"
                                step="0.01" value="{{ old('price') }}" required>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input class="form-control" id="stock" name="stock" type="number" min="0"
                                step="1" value="{{ old('stock') }}" required>
                            @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3"><label class="form-label" for="image">Product image</label>
                            <input class="form-control" id="image" name="image" type="file" value="">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div><button type="submit" class="btn btn-primary">Save
                    product</button> <a class="btn btn-light" href="{{ route('admin.products.index') }}">Cancel</a>
            </form>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
