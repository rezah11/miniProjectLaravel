
<?php $__env->startSection('content'); ?>
    <h1>
        how to register
    </h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto aspernatur blanditiis
        dolore, excepturi expedita, ipsam libero nemo nisi officiis omnis perferendis porro provident quis quod repellat
        ut veritatis.</p>
    <h2>
        how to generate a link
    </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, atque commodi consectetur consequatur
        dolorem dolores doloribus dolorum est, ipsa laboriosam maiores necessitatibus nostrum perspiciatis quam
        reiciendis tempora tenetur unde ut!</p>
    <?php echo e(auth()->guest() ? 'none' :auth()->user()->type); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sayad azami laravel\mini project\mini-project\resources\views/partials/mainPage.blade.php ENDPATH**/ ?>