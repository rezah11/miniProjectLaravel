<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <form action="<?php echo e(route('status-link')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <table class="table table-responsive" id="tableLink">
                <thead>
                <tr class="">
                    <th>انتخاب</th>
                    <th>id</th>
                    <th>لینک</th>
                    <th>isIndex</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="h-25">
                        <td><input name="<?php echo e($value->id); ?>" type="checkbox" value="<?php echo e($value->id); ?>"></td>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->link); ?></td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:
                            <?php switch($value->status):
                            case ($value->isIndex()): ?>
                                #198754;
                            <?php break; ?>
                            <?php case ($value->NoIndex()): ?>
                                #bb2d3b;
                            <?php break; ?>
                            <?php case ($value->NoStatus()): ?>
                                #b0adc5;
                            <?php break; ?>
                            <?php endswitch; ?>"><?php echo e($value->status); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <input class="btn btn-success" type="submit">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/links/allStatus.blade.php ENDPATH**/ ?>