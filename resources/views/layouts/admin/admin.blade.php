<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overview | Little Store</title>
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
</head>

<body>
    <!-- NAVBAR START: intentionally repeated in every page for the layouts lesson. -->
    @include('partials.admin.navbar')
    <!-- NAVBAR END -->
    <!-- PAGE CONTENT START -->
    @yield('content')
    <!-- PAGE CONTENT END -->
    <!-- FOOTER START: intentionally repeated. -->
    @include('partials.admin.footer')