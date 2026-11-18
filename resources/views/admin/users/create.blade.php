@extends('layouts.admin.admin')

@section('content')
    <!-- PAGE CONTENT START -->
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">People</p>
                <h1 class="h2 mb-0">Add user</h1>
            </div>
        </div>
        <div class="panel form-shell">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}"
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
                <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div><button type="submit" class="btn btn-primary">Save
                    user</button> <a class="btn btn-light" href="{{ route('admin.users.index') }}">Cancel</a>
            </form>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
