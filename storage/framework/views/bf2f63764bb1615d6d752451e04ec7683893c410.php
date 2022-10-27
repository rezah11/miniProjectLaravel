






<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <table class="table table-responsive" id="tableLink">
                <thead>
                <tr>
                    <th>id</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>نوع کاربر</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->name); ?></td>
                        <td><?php echo e($value->email); ?></td>
                        <td><?php echo e($value->type); ?></td>
                        <td>
                            
                            
                            <form action="<?php echo e(route('deleteUser',['id'=>$value->id])); ?>" method="post" id="remUser">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input class="btn btn-danger" type="submit" value="حذف">
                            </form>
                            <a href="<?php echo e(route('editUser',['id'=>$value->id])); ?>" class="btn btn-info">ویرایش</a>
                        </td>

                        
                        
                        
                        

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/users/list.blade.php ENDPATH**/ ?>