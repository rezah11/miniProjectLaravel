
<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="<?php echo e(route('storeUser')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">نام</label>
                    <input class="form-control" id="link" placeholder="نام" name="name" required>
                    <label for="email">ایمیل</label>
                    <input class="form-control" id="link" placeholder="ایمیل" name="email" required>
                    <label for="password">پسورد</label>
                    <input class="form-control" id="link" placeholder="پسوورد" type="password" name="password" required>
                    <label for="repass">تکرار پسورد</label>
                    <input class="form-control" id="link" placeholder="تکرار پسوورد" type="password" name="repass" required>
                    <label for="type">نوع کاربر</label>
                    <select class="form-control form-select" name="type" id="">
                        <option class="form-control" value="admin">admin</option>
                        <option value="manager">manager</option>
                        <option value="user" selected>user</option>
                    </select>

                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/users/create.blade.php ENDPATH**/ ?>