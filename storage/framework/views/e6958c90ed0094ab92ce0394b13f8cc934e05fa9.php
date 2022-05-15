<?php $__env->startSection('page'); ?>
    Brands
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Brands
        </h4>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['@click' => 'openModal']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['@click' => 'openModal']); ?>
            Add Brand
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('brand')->html();
} elseif ($_instance->childHasBeenRendered('rCCpRTV')) {
    $componentId = $_instance->getRenderedChildComponentId('rCCpRTV');
    $componentTag = $_instance->getRenderedChildComponentTagName('rCCpRTV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rCCpRTV');
} else {
    $response = \Livewire\Livewire::mount('brand');
    $html = $response->html();
    $_instance->logRenderedChild('rCCpRTV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div id="app">
        <notifications></notifications>
        <brand-component></brand-component>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/brands/index.blade.php ENDPATH**/ ?>