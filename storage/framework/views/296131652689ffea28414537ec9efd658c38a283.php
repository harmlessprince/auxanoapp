<?php
$isCustomerActive = strpos(Route::currentRouteName(), 'customers.index') === 0 || strpos(Route::currentRouteName(), 'customers.show') === 0 || strpos(Route::currentRouteName(), 'customers.edit') === 0;
?>

<?php if (isset($component)) { $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SideMenu::class, ['url' => 'customers.index','title' => 'Customers','active' => $isCustomerActive]); ?>
<?php $component->withName('side-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
        </path>
    </svg>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978)): ?>
<?php $component = $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978; ?>
<?php unset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978); ?>
<?php endif; ?>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/partials/aside/desktop/customer.blade.php ENDPATH**/ ?>