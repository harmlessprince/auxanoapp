<?php if($message = Session::get('success')): ?>
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-green-600 dark:bg-green-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green" role="alert">
        <div class="flex items-center">
            <?php echo e($message); ?>

        </div>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
<?php endif; ?>


<?php if($message = Session::get('error')): ?>
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red" role="alert">
        <div class="flex items-center">
            <?php echo e($message); ?>

        </div>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-orange-700 bg-orange-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-orange" role="alert">
        <div class="flex items-center">
            <?php echo e($message); ?>

        </div>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-blue-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-blue" role="alert">
        <div class="flex items-center">
            <?php echo e($message); ?>

        </div>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red" role="alert">
        <div class="flex items-center">
            Please check the form below for errors
        </div>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
<?php endif; ?>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/flash-message.blade.php ENDPATH**/ ?>