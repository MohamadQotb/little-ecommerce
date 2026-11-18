@extends('layouts.store.store')
<!-- PAGE CONTENT START -->
@section('content')
    <main class="container py-4 py-lg-5">
        <div class="form-shell panel">
            <p class="eyebrow">Little store</p>
            <h1 class="h2 mb-4">Welcome back</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{ @old('email') }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" value="" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <hr><a href="{{ route('register') }}">New here? Create an account</a>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
