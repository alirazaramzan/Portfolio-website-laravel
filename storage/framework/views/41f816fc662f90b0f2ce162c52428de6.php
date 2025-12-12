<?php $__env->startSection('title', 'Add Product'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5 mt-5">
        <h2>Add New Product</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($err); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">

            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (PKR)</label>
                <input name="price" type="number" value="<?php echo e(old('price', 0)); ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"><?php echo e(old('description')); ?></textarea>
            </div>

            <div class="mb-3">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($product) && $product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="100" class="mt-2">
                <?php endif; ?>
            </div>



            <button class="btn btn-primary">Save Product</button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/admin/products/create.blade.php ENDPATH**/ ?>