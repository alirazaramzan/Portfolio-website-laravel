<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">Ali Raza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('projects') ? 'active' : ''); ?>" href="<?php echo e(route('projects')); ?>">Projects</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">Contact</a>
                </li>
                <!-- Cart Icon -->
                <li class="nav-item ms-3">
                    <a class="nav-link position-relative" href="<?php echo e(route('cart.view')); ?>">
                        <i class="bi bi-cart-fill" style="font-size: 1.4rem;"></i>


                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/components/navbar.blade.php ENDPATH**/ ?>