<?php $__env->startSection('title', $product->name . ' | Product Details'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <div class="row">

            <div class="col-md-6">
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="img-fluid rounded shadow" alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('images/placeholder.png')); ?>" class="img-fluid rounded shadow" alt="No image">
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold"><?php echo e($product->name); ?></h2>
                <p class="mt-3"><?php echo e($product->description); ?></p>

                <h4 class="fw-bold mt-4">PKR <?php echo e(number_format($product->price)); ?></h4>

                <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="mt-3">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">

                    <div class="mb-3" style="max-width:150px;">
                        <label class="form-label fw-bold">Quantity</label>
                        <select name="quantity" class="form-select">
                            <?php for($i=1;$i<=10;$i++): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <button class="btn btn-dark btn-lg" type="submit">Add to Cart</button>
                </form>

                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary mt-3">
                    ← Back to Products
                </a>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/products/show.blade.php ENDPATH**/ ?>
