<?php $__env->startSection('title', 'Cart | Ali Raza'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Your Cart</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(empty($cart)): ?>
            <p class="text-center">Your cart is empty.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Project</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $item['price'] * $item['quantity']; ?>

                    <tr data-id="<?php echo e($index); ?>">
                        <td><?php echo e($item['name']); ?></td>
                        <td>PKR<?php echo e($item['price']); ?></td>

                        <td>
                            <button class="btn btn-sm btn-outline-dark update-qty" data-action="minus">-</button>
                            <span class="mx-2 qty"><?php echo e($item['quantity']); ?></span>
                            <button class="btn btn-sm btn-outline-dark update-qty" data-action="plus">+</button>
                        </td>

                        <td class="item-total">PKR<?php echo e($item['price'] * $item['quantity']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

            <h4 class="text-end mt-3 fw-bold">Total: <span id="cart-total">PKR<?php echo e($total); ?></span></h4>

            <div class="text-end mt-3">
                <a href="<?php echo e(route('cart.checkout.form')); ?>" class="btn btn-success">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </section>

    
    <script>
        document.querySelectorAll(".update-qty").forEach(btn => {
            btn.addEventListener("click", function() {
                let action = this.dataset.action;
                let row = this.closest("tr");
                let id = row.dataset.id;

                fetch("<?php echo e(route('cart.update')); ?>", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ id: id, action: action })
                })
                    .then(res => res.json())
                    .then(data => {
                        row.querySelector(".qty").innerText = data.quantity;
                        row.querySelector(".item-total").innerText = "PKR" + data.item_total;
                        document.getElementById("cart-total").innerText = "PKR" + data.cart_total;
                    });
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/cart.blade.php ENDPATH**/ ?>