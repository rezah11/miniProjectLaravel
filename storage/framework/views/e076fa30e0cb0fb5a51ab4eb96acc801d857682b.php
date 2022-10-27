<?php if($errors->any()): ?>
    <div class="row justify-content-sm-center">
        <div class="col-md-8">
            <ul class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/partials/errors.blade.php ENDPATH**/ ?>