<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <table class="table table-responsive" id="tableLink">
                <thead>
                <tr>
                    <th>id</th>
                    <th>لینک</th>
                    <th>لینک کوتاه</th>
                    <th>وضعیت</th>
                    <th>check</th>
                    <th>isIndex</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="h-25">
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->link); ?></td>
                        <td><?php echo e($value->slug); ?></td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:<?php echo e($value->active?'#348114':'#cb0b14'); ?>"><?php echo e($value->state); ?></td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:
                            <?php switch($value->status):
                            case ($value->isIndex()): ?>
                                #198754;
                                <?php break; ?>
                                <?php case ($value->NoIndex()): ?>
                                #6a1a21;
                                <?php break; ?>
                                <?php case ($value->NoStatus()): ?>
                                #b0adc5;
                                <?php break; ?>
                            <?php endswitch; ?>"><?php echo e($value->status); ?>

                        </td>
                        <td  style="display: flex;">
                            
                            
                            <div >
                            <form action="<?php echo e(route('destroy',['id'=>$value->id])); ?>" method="post" id="deleteForm">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$value)): ?>
                                    <input class="btn btn-danger" type="submit" value="حذف">
                                <?php endif; ?>
                            </form>
                            </div>
                            <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update' , $value)): ?>
                                <a href="<?php echo e(route('edit-link',['id'=>$value->id])); ?>" class="btn btn-info">ویرایش</a>
                            <?php endif; ?>
                            </div>
                            <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('changeState',$value)): ?>
                                <a class="btn btn-secondary" href="<?php echo e(route('changeState-link',['id'=>$value->id])); ?>">تغییر
                                    وضعیت</a>
                            <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/links/list.blade.php ENDPATH**/ ?>