<?php $__env->startSection('title', 'Testimonials | Ali Raza'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Testimonials</h2>

        
        <form action="<?php echo e(route('testimonials.store')); ?>" method="POST" class="mb-4">
            <?php echo csrf_field(); ?>
            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-7">
                    <input type="text" name="message" class="form-control" placeholder="Message" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">Add</button>
                </div>
            </div>
        </form>

        <div class="row g-4">
            
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($testimonial->name); ?></h5>
                            <p class="card-text"><?php echo e($testimonial->message); ?></p>

                            
                            <form action="<?php echo e(route('testimonials.destroy', $testimonial->id)); ?>" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/pages/testimonials.blade.php ENDPATH**/ ?>