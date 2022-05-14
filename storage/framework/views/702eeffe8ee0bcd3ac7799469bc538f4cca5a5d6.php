<?php
$isTaskActive = strpos(Route::currentRouteName(), 'tasks.index') === 0 || strpos(Route::currentRouteName(), 'tasks.show') === 0 || strpos(Route::currentRouteName(), 'tasks.edit') === 0;
?>
<?php if (isset($component)) { $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SideMenu::class, ['url' => 'tasks.index','title' => 'Tasks','active' => $isTaskActive]); ?>
<?php $component->withName('side-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor">
        <!--! Font Awesome Pro 6.1.1 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
        <path
            d="M152.1 38.16C161.9 47.03 162.7 62.2 153.8 72.06L81.84 152.1C77.43 156.9 71.21 159.8 64.63 159.1C58.05 160.2 51.69 157.6 47.03 152.1L7.029 112.1C-2.343 103.6-2.343 88.4 7.029 79.03C16.4 69.66 31.6 69.66 40.97 79.03L63.08 101.1L118.2 39.94C127 30.09 142.2 29.29 152.1 38.16V38.16zM152.1 198.2C161.9 207 162.7 222.2 153.8 232.1L81.84 312.1C77.43 316.9 71.21 319.8 64.63 319.1C58.05 320.2 51.69 317.6 47.03 312.1L7.029 272.1C-2.343 263.6-2.343 248.4 7.029 239C16.4 229.7 31.6 229.7 40.97 239L63.08 261.1L118.2 199.9C127 190.1 142.2 189.3 152.1 198.2V198.2zM224 96C224 78.33 238.3 64 256 64H480C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H256C238.3 128 224 113.7 224 96V96zM224 256C224 238.3 238.3 224 256 224H480C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H256C238.3 288 224 273.7 224 256zM160 416C160 398.3 174.3 384 192 384H480C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416zM0 416C0 389.5 21.49 368 48 368C74.51 368 96 389.5 96 416C96 442.5 74.51 464 48 464C21.49 464 0 442.5 0 416z" />
    </svg>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978)): ?>
<?php $component = $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978; ?>
<?php unset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978); ?>
<?php endif; ?>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/partials/aside/desktop/task.blade.php ENDPATH**/ ?>