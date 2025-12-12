<?php $__env->startSection('title', 'Checkout | Ali Raza'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Checkout Form</h2>


        <form action="<?php echo e(route('cart.checkout.submit')); ?>" method="POST" class="w-50 mx-auto shadow p-4 rounded bg-light">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <h4
                class="text-center mb-4 fw-bold">Card Details</h4>
            <div class="mb-3">
                <label for="phone" class="form-label">Card Number</label>
                <input type="text" id="card" name="card" class="form-control" maxlength="16" pattern="\d{16}" required>
            </div>


            <div class="mb-3">
                <label for="phone" class="form-label">CVV</label>
                <input type="text" id="cvv" name="cvv" class="form-control" maxlength="3" pattern="\d{3}" required>
            </div>


            <div class="mb-3">
                <label for="phone" class="form-label">Expiry date</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Submit Order</button>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/checkout.blade.php ENDPATH**/ ?>