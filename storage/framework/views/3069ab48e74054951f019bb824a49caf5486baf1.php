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
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['@click' => 'openModal']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['@click' => 'openModal']); ?>
            Add Task
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('task-form-modal')->html();
} elseif ($_instance->childHasBeenRendered('Q9FTiXS')) {
    $componentId = $_instance->getRenderedChildComponentId('Q9FTiXS');
    $componentTag = $_instance->getRenderedChildComponentTagName('Q9FTiXS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Q9FTiXS');
} else {
    $response = \Livewire\Livewire::mount('task-form-modal');
    $html = $response->html();
    $_instance->logRenderedChild('Q9FTiXS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div id="app">
        <notifications></notifications>
        <tasks :logged-in-user="<?php echo e(json_encode(Auth::user())); ?>"></tasks>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/tasks/index.blade.php ENDPATH**/ ?>