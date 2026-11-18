@extends('layouts.store.store')
@section('content')
<!-- PAGE CONTENT START -->
<main class="container py-4 py-lg-5">
    <div class="form-shell panel">
        <p class="eyebrow">Little store</p>
        <h1 class="h2 mb-4">Create an account</h1>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Full name</label>
                <input class="form-control"
                    id="name" name="name" type="text" value="{{ @old('name') }}">

            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control"
                    id="email" name="email" type="email" value="{{ @old('email') }}">

            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control"
                    id="password" name="password" type="password" value="">

            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Confirm password</label>
                <input
                    class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                    value="">

            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
        <hr><a href="{{ route('login') }}">Already have an account? Sign in</a>
    </div>
</main>
<!-- PAGE CONTENT END -->
@endsection