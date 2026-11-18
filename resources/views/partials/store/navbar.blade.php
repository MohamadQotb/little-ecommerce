<nav class="navbar navbar-expand-lg ">
    <div class="container py-2">
        <a class="navbar-brand" href="index.html">little store<span class="fw-normal fs-6">.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link " href="products.html">Shop</a></li>
                <li class="nav-item"><a class="nav-link " href="orders.html">My orders</a></li>
                <li class="nav-item"><a class="nav-link " href="profile.html">Account</a></li>
            </ul>
            <div class="d-flex gap-2 py-2"><a class="btn btn-outline-primary btn-sm" href="cart.html">Cart (2)</a> <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Sign in</a></div>
        </div>
    </div>
</nav>