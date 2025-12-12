<?php $__env->startSection('title', 'Admin - Products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Products</h2>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">Add Product</a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80">#</th>
                <th>Name</th>
                <th width="120">Price</th>
                <th width="120">Image</th>
                <th width="200">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->id); ?></td>
                    <td><?php echo e($p->name); ?></td>
                    <td>PKR <?php echo e(number_format($p->price)); ?></td>
                    <td>
                        <?php if($p->image): ?>
                            <img src="<?php echo e(asset('storage/' . $p->image)); ?>" alt="" style="width:80px;height:50px;object-fit:cover;border-radius:4px;">
                        <?php else: ?>
                            —
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.products.edit', $p->id)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>

                        <form action="<?php echo e(route('admin.products.destroy', $p->id)); ?>" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this products?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="text-center">No products yet.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="mt-3">
            <?php echo e($products->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/admin/products/index.blade.php ENDPATH**/ ?>