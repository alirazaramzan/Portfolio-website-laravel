
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ali Raza')</title>

{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Your custom CSS --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

{{-- Include Navbar --}}
@include('components.navbar')

{{-- Main page content --}}
<main style="padding-top: 80px;"> {{-- small offset for fixed navbar --}}
    @yield('content')
</main>

{{-- Include Footer --}}
@include('components.footer')

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
