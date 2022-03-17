<?php
$isDashboardActive = strpos(Route::currentRouteName(), 'home') === 0 || strpos(Route::currentRouteName(), 'dashboard') === 0;
?>
<?php if (isset($component)) { $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SideMenu::class, ['url' => 'dashboard','title' => 'Dashboard','active' => $isDashboardActive]); ?>
<?php $component->withName('side-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978)): ?>
<?php $component = $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978; ?>
<?php unset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978); ?>
<?php endif; ?>



<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/partials/aside/desktop/dashboard.blade.php ENDPATH**/ ?>