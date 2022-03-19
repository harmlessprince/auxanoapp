<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('template/assets/css/tailwind.output.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link href="<?php echo e(asset('css/app.css')); ?><?php echo e('?' . time()); ?>" rel="stylesheet">
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php echo $__env->make('partials.aside.desktop.desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.aside.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="flex flex-col flex-1 w-full">
            <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <div class="flex justify-between my-6">
                        <h2 class=" text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            <?php echo $__env->yieldContent('page'); ?>
                        </h2>

                        <?php if (isset($component)) { $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Link::class, ['type' => 'secondary']); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(url()->previous()).'']); ?>
                            back
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff)): ?>
<?php $component = $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff; ?>
<?php unset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff); ?>
<?php endif; ?>
                    </div>
                    <!-- CTA -->
                    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
        </div>
    </div>
</body>


<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo \Livewire\Livewire::scripts(); ?>

<script>
    window.Laravel = {
        csrfToken: '<?php echo e(csrf_token()); ?>'
    }
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="<?php echo e(asset('template/assets/js/init-alpine.js')); ?>"></script>
<!-- You need focus-trap.js to make the modal accessible -->
<script src="<?php echo e(asset('template/assets/js/focus-trap.js')); ?>" defer></script>

<script src="<?php echo e(asset('/js/custom.js')); ?>"></script>
<script src="<?php echo e(mix('/js/app.js')); ?>"></script>

</html>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/layouts/app.blade.php ENDPATH**/ ?>