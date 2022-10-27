

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="<?php echo e(route('store-link')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="link">link</label>
                    <input class="form-control" id="link" placeholder="آدرس اینترنتی خود را وارد کنید" name="link" required>
                </div>
                <div>
                    <label for="linkFile">attach link</label>
                    <input class="form-control" id="linkFile" name="linkFile" type="file">
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/links/create.blade.php ENDPATH**/ ?>