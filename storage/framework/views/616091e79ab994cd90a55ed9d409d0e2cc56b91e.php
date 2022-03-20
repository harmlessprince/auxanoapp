<?php $__env->startSection('page'); ?>
    Customer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- With actions -->
    <div class="flex justify-between mb-4 items-center">
        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Customers
        </h4>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['@click' => 'openModal']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['@click' => 'openModal']); ?>
            Add Customer
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-form', [])->html();
} elseif ($_instance->childHasBeenRendered('7ToiSrv')) {
    $componentId = $_instance->getRenderedChildComponentId('7ToiSrv');
    $componentTag = $_instance->getRenderedChildComponentTagName('7ToiSrv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7ToiSrv');
} else {
    $response = \Livewire\Livewire::mount('company-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('7ToiSrv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone Number</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 capitalize">
                                <?php echo e($customer->name); ?>

                            </td>
                            <td class="px-4 py-3 lowercase">
                                <?php echo e($customer->email); ?>

                            </td>
                            <td class="px-4 py-3 capitalize">
                                <?php echo e($customer->phone_number); ?>

                            </td>
                            <td class="px-4 py-3 capitalize">
                                <?php echo e($customer->type); ?>

                            </td>
                            <td class="px-4 py-3 capitalize">
                                <address>
                                    <?php echo e($customer->address); ?>

                                </address>
                            </td>

                            <td class="px-4 py-3 capitalize">
                                <?php echo e($customer->created_at->format('Y-m-d')); ?>

                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" href="<?php echo e(route('customers.edit', ['customer' => $customer])); ?>">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" title="Click to delete this customer"
                                        onclick="destroy(name = '<?php echo e($customer->name); ?>', url = '<?php echo e(route('customers.destroy', ['customer' => $customer])); ?>')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100">No data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo e($customers->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/customers/index.blade.php ENDPATH**/ ?>