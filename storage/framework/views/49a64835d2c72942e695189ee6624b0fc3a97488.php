
<a class="btn btn-primary w-25" href="<?php echo e(route('links')); ?>">نمایش لینک ها</a>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create',\App\Models\Link::class)): ?>
    <a class="btn btn-primary w-25" href="<?php echo e(route('create-link')); ?>">ایجاد لینک</a>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny',\App\Models\User::class)): ?>
    <a class="btn btn-primary w-25" href="<?php echo e(route('allUsers')); ?>">نمایش کاربران</a>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create',\App\Models\User::class)): ?>
    <a class="btn btn-primary w-25" href="<?php echo e(route('createUser')); ?>">اضافه کردن کاربر</a>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('changeIndexStatus',\App\Models\Link::class)): ?>
    <br>
    <br>
    <a class="btn btn-primary w-25" href="<?php echo e(route('status-show')); ?>">عملیات index</a>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/partials/dashboard.blade.php ENDPATH**/ ?>