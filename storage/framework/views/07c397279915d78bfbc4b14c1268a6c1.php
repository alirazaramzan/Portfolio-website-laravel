<?php $__env->startSection('title', 'Projects | Ali Raza'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">My Design Projects</h2>

        <!-- Search Bar -->
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <input type="text" id="projectSearch" class="form-control" placeholder="Search projects by name or description...">
            </div>
        </div>

        <!-- Image Upload -->
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form id="uploadForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </div>
                </form>
                <div id="uploadMessage" class="mt-2"></div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="row g-4" id="projectsContainer">
            <?php
                $projects = [
                    [
                        'id' => 1,
                        'name' => 'BYKEA App Redesign',
                        'price' => 20000,
                        'image' => 'images/img1.avif',
                        'desc' => 'Enhancing UX and visual appeal of Bykea app.'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employee Dashboard Design',
                        'price' => 15000,
                        'image' => 'images/img44.png',
                        'desc' => 'Streamlined HR and analytics dashboard.'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Financial Dashboard',
                        'price' => 25000,
                        'image' => 'images/img33.png',
                        'desc' => 'Tracks revenue, expenses, and key metrics.'
                    ],
                ];
            ?>

            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 project-card">
                    <div class="card shadow-sm">
                        <img src="<?php echo e(asset($project['image'])); ?>" class="card-img-top" alt="<?php echo e($project['name']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo e($project['name']); ?></h5>
                            <p class="card-text"><?php echo e($project['desc']); ?></p>
                            <p class="fw-bold">PKR <?php echo e($project['price']); ?></p>

                            <a href="<?php echo e(route('products.show', $project['id'])); ?>" class="btn btn-outline-primary btn-sm mb-2">View Details</a>

                            <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($project['id']); ?>">
                                <input type="hidden" name="name" value="<?php echo e($project['name']); ?>">
                                <input type="hidden" name="price" value="<?php echo e($project['price']); ?>">
                                <button type="submit" class="btn btn-dark btn-sm mt-2">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?php echo e(route('cart.view')); ?>" class="btn btn-outline-dark">View Cart →</a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

            // ===== Front-end Search =====
            $('#projectSearch').on('keyup', function(){
                var query = $(this).val().toLowerCase();
                $('.project-card').each(function(){
                    var name = $(this).find('.card-title').text().toLowerCase();
                    var desc = $(this).find('.card-text').text().toLowerCase();
                    if(name.includes(query) || desc.includes(query)){
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // ===== Image Upload =====
            $('#uploadForm').on('submit', function(e){
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?php echo e(route("projects.upload")); ?>',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                    success: function(response){
                        $('#uploadMessage').html('<span class="text-success">'+response.message+'</span>');
                    },
                    error: function(xhr){
                        $('#uploadMessage').html('<span class="text-danger">Upload failed.</span>');
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alira\OneDrive\Desktop\app\app\resources\views/pages/projects.blade.php ENDPATH**/ ?>