@extends('layouts.store.store')
<!-- NAVBAR END -->
<!-- PAGE CONTENT START -->
@section('content')
<main class="container py-4 py-lg-5">
    <section class="hero mb-5">
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <p class="eyebrow">The everyday collection</p>
                <h1>Small things.<br>Better days.</h1>
                <p class="mt-4 mb-4 muted">A few good essentials for your desk, your home<br class="d-none d-md-block"> and wherever the day takes you.</p><a href="products.html" class="btn btn-primary px-4">Explore the collection →</a>
            </div>
            <div class="col-md-5"><img src="{{asset('assets')}}/images/bag.svg" alt="Everyday green backpack"></div>
        </div>
    </section>
    <div class="section-top">
        <div>
            <p class="eyebrow mb-2">Made for everyday</p>
            <h1 class="h2 mb-0">Find your next essential</h1>
        </div><a href="products.html">Shop all products →</a>
    </div>
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-1.html"><img src="{{asset('assets')}}/images/bag.svg" class="card-img-top" alt="Everyday Backpack"></a>
                <div class="card-body">
                    <p class="eyebrow">Bags</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-1.html">Everyday Backpack</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 1,490</span><a class="btn btn-sm btn-outline-primary" href="product-1.html">View product</a></div>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-2.html"><img src="{{asset('assets')}}/images/mug.svg" class="card-img-top" alt="Ceramic Mug"></a>
                <div class="card-body">
                    <p class="eyebrow">Home</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-2.html">Ceramic Mug</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 290</span><a class="btn btn-sm btn-outline-primary" href="product-2.html">View product</a></div>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-3.html"><img src="{{asset('assets')}}/images/headphones.svg" class="card-img-top" alt="Wireless Headphones"></a>
                <div class="card-body">
                    <p class="eyebrow">Electronics</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-3.html">Wireless Headphones</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 890</span><a class="btn btn-sm btn-outline-primary" href="product-3.html">View product</a></div>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-4.html"><img src="{{asset('assets')}}/images/lamp.svg" class="card-img-top" alt="Desk Lamp"></a>
                <div class="card-body">
                    <p class="eyebrow">Home</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-4.html">Desk Lamp</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 650</span><a class="btn btn-sm btn-outline-primary" href="product-4.html">View product</a></div>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-5.html"><img src="{{asset('assets')}}/images/shirt.svg" class="card-img-top" alt="Cotton T-shirt"></a>
                <div class="card-body">
                    <p class="eyebrow">Clothing</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-5.html">Cotton T-shirt</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 450</span><a class="btn btn-sm btn-outline-primary" href="product-5.html">View product</a></div>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card product-card h-100"><a href="product-6.html"><img src="{{asset('assets')}}/images/watch.svg" class="card-img-top" alt="Classic Watch"></a>
                <div class="card-body">
                    <p class="eyebrow">Accessories</p>
                    <h2 class="h5"><a class="text-decoration-none text-dark" href="product-6.html">Classic Watch</a></h2>
                    <div class="d-flex justify-content-between align-items-center mt-3"><span class="price">EGP 1,200</span><a class="btn btn-sm btn-outline-primary" href="product-6.html">View product</a></div>
                </div>
            </article>
        </div>
    </div>
</main>
<!-- PAGE CONTENT END -->
@endsection