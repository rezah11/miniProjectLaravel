<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="<?php echo e(route('update-link')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group">
                    <label for="id">id</label>
                    <input class="form-control" type="text" id="id" value="<?php echo e($link->id); ?>" readonly name="id">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input class="form-control" type="text" id="slug" value="<?php echo e($link->slug); ?>" readonly name="slug">
                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input class="form-control" id="link" value="<?php echo e($link->link); ?>" name="link" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">تایید</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/links/edit.blade.php ENDPATH**/ ?>