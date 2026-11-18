@extends('layouts.admin.admin')
<!-- NAVBAR END -->
<!-- PAGE CONTENT START -->
@section('content')
    <main class="container py-4 py-lg-5">
        <div class="section-top">
            <div>
                <p class="eyebrow mb-2">People</p>
                <h1 class="h2 mb-0">Users</h1>
            </div><a class="btn btn-primary" href="{{ route('admin.users.create') }}">+ Add user</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">No users found</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span
                                            class="badge badge-soft">{{ $user->role == 'admin' ? 'admin' : 'customer' }}</span>
                                    </td>
                                    <td><a class="btn btn-sm btn-outline-primary me-2"
                                            href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
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
                            <td>Sara Ahmed</td>
                            <td>sara@example.com</td>
                            <td><span class="badge badge-soft">customer</span></td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="user-edit-2.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Omar Ali</td>
                            <td>omar@example.com</td>
                            <td><span class="badge badge-soft">customer</span></td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="user-edit-3.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Mona Hassan</td>
                            <td>mona@example.com</td>
                            <td><span class="badge badge-soft">customer</span></td>
                            <td><a class="btn btn-sm btn-outline-primary me-2" href="user-edit-4.html">Edit</a><button
                                    type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#demoModal">Delete</button></td>
                        </tr> --}}
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- PAGE CONTENT END -->
@endsection
