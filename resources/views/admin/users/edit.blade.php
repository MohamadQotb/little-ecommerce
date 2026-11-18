@extends('layouts.admin.admin')
@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">People</p>
                <h1 class="h2 mb-0">Edit user</h1>
            </div>
        </div>
        <div class="panel form-shell">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">New password (leave blank to keep)</label>
                    <input class="form-control" id="password" name="password" type="password" value="">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3"><label class="form-label" for="role">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Customer</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div><button type="submit" class="btn btn-primary">Save user</button>
                <a class="btn btn-light" href="{{ route('admin.users.index') }}">Cancel</a>
            </form>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
