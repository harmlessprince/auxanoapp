<?php $__env->startSection('page'); ?>
    Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Categories
        </h4>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['@click' => 'openModal']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['@click' => 'openModal']); ?>
            Add Category
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-form-modal')->html();
} elseif ($_instance->childHasBeenRendered('z8acvNQ')) {
    $componentId = $_instance->getRenderedChildComponentId('z8acvNQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('z8acvNQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('z8acvNQ');
} else {
    $response = \Livewire\Livewire::mount('category-form-modal');
    $html = $response->html();
    $_instance->logRenderedChild('z8acvNQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div id="app">
        <notifications></notifications>
        <category-component></category-component>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/categories/index.blade.php ENDPATH**/ ?>