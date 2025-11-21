<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Ali Raza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
                <!-- Cart Icon -->
                <li class="nav-item ms-3">
                    <a class="nav-link position-relative" href="{{ route('cart.view') }}">
                        <i class="bi bi-cart-fill" style="font-size: 1.4rem;"></i>


                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
