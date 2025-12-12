

<?php $__env->startSection('title', 'Projects | Ali Raza'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">My Design Projects</h2>
        <div class="row g-4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="<?php echo e(asset($product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text"><?php echo e($product->description); ?></p>
                            <p class="fw-bold">PKR <?php echo e($product->price); ?></p>

                            <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                                <button type="submit" class="btn btn-dark btn-sm mt-2">Add to Cart</button>
                            </form>

                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-outline-primary btn-sm mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-4">
            <?php echo e($products->links()); ?> <!-- pagination -->
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/products/index.blade.php ENDPATH**/ ?>