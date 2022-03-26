<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('template/assets/css/tailwind.output.css')); ?>" />
    <script src="<?php echo e(asset('template/assets/js/init-alpine.js')); ?>"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <!-- Session Status -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>

</html>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/layouts/guest.blade.php ENDPATH**/ ?>