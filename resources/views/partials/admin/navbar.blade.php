<nav class="navbar navbar-expand-lg admin-nav" data-bs-theme="dark">
    <div class="container py-2">
        <a class="navbar-brand" href="{{ route('dashboard') }}">little store<span class="fw-normal fs-6"> /
                admin</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('dashboard') }}">Overview</a></li>
                <li class="nav-item"><a
                        class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item"><a
                        class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"
                        href="{{ route('admin.categories.index') }}">Categories</a>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}"
                        href="{{ route('admin.orders.index') }}">Orders</a></li>
            </ul>
            <div class="d-flex gap-2 py-2"><a class="btn btn-sm btn-light" href="../user/index.html">View store ↗</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
