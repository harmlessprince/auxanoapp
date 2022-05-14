<?php $__env->startPush('styles'); ?>
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page'); ?>
    Tickets
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- With actions -->
    <div class="flex items-center justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            All tasks
        </h4>
        
    </div>

    <div id="app">
        <notifications></notifications>
        <tasks :logged-in-user="<?php echo e(json_encode(Auth::user())); ?>"></tasks>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/tasks/index.blade.php ENDPATH**/ ?>