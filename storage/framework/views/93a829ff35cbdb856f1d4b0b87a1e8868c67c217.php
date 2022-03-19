<?php $__env->startSection('page'); ?>
    Tickets
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- With actions -->
    <div class="flex items-center justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            All tickets
        </h4>
        <?php if (isset($component)) { $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Link::class, []); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('tickets.create')).'']); ?>
            Create Ticket
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff)): ?>
<?php $component = $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff; ?>
<?php unset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff); ?>
<?php endif; ?>
    </div>

    <div id="app">
        <notifications></notifications>
        <ticket-component></ticket-component>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/tickets/index.blade.php ENDPATH**/ ?>