<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5 mt-5">
        <h2>Edit Product</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($err); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data" class="mt-3">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="<?php echo e(old('name', $product->name)); ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (PKR)</label>
                <input name="price" type="number" value="<?php echo e(old('price', $product->price)); ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $product->description)); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="" style="width:140px;height:90px;object-fit:cover;border-radius:4px;">
                <?php else: ?>
                    <div class="text-muted">No image</div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($product) && $product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="100" class="mt-2">
                <?php endif; ?>
            </div>


            <button class="btn btn-primary">Update Product</button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>