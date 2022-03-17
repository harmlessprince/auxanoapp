<?php
$isCategoryActive = strpos(Route::currentRouteName(), 'categories.index') === 0 || strpos(Route::currentRouteName(), 'categories.show') === 0 || strpos(Route::currentRouteName(), 'categories.edit') === 0;
?>
<?php if (isset($component)) { $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SideMenu::class, ['url' => 'categories.index','title' => 'Categories','active' => $isCategoryActive]); ?>
<?php $component->withName('side-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" fill="currentColor" viewBox="0 0 640 512">
        <!--! Font Awesome Pro 6.1.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
        <path
            d="M48 136C48 149.3 37.25 160 24 160C10.75 160 0 149.3 0 136V32C0 14.33 14.33 0 32 0H136C149.3 0 160 10.75 160 24C160 37.25 149.3 48 136 48H48V136zM127.8 176C127.8 149.5 149.3 128 175.8 128C202.3 128 223.8 149.5 223.8 176C223.8 202.5 202.3 224 175.8 224C149.3 224 127.8 202.5 127.8 176V176zM218.7 256C227.8 256 236.5 258.3 244 262.4C211.6 274.3 186.8 301.9 178.8 336H122.7C107.9 336 96 324.1 96 309.3C96 279.9 119.9 256 149.3 256H218.7zM517.3 336H461.2C453.2 301.9 428.4 274.3 395.1 262.4C403.5 258.3 412.2 256 421.3 256H490.7C520.1 256 544 279.9 544 309.3C544 324.1 532.1 336 517.3 336H517.3zM432 360C432 373.3 421.3 384 408 384H232C218.7 384 208 373.3 208 360C208 351.6 209.4 343.5 212.1 336C220.7 311.7 241.1 293.4 267.1 288.1C271.9 288.3 275.9 288 280 288H360C364.1 288 368.1 288.3 372 288.1C398 293.4 419.3 311.7 427.9 336C430.6 343.5 432 351.6 432 360zM416 176C416 149.5 437.5 128 464 128C490.5 128 512 149.5 512 176C512 202.5 490.5 224 464 224C437.5 224 416 202.5 416 176zM384 192C384 227.3 355.3 256 320 256C284.7 256 256 227.3 256 192C256 156.7 284.7 128 320 128C355.3 128 384 156.7 384 192zM480 24C480 10.75 490.7 0 504 0H608C625.7 0 640 14.33 640 32V136C640 149.3 629.3 160 616 160C602.7 160 592 149.3 592 136V48H504C490.7 48 480 37.25 480 24zM48 464H136C149.3 464 160 474.7 160 488C160 501.3 149.3 512 136 512H32C14.33 512 0 497.7 0 480V376C0 362.7 10.75 352 24 352C37.25 352 48 362.7 48 376V464zM504 464H592V376C592 362.7 602.7 352 616 352C629.3 352 640 362.7 640 376V480C640 497.7 625.7 512 608 512H504C490.7 512 480 501.3 480 488C480 474.7 490.7 464 504 464z" />
    </svg>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978)): ?>
<?php $component = $__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978; ?>
<?php unset($__componentOriginal14dbe3674c0bdbfb11874d366bd03cff4359e978); ?>
<?php endif; ?>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/partials/aside/desktop/category.blade.php ENDPATH**/ ?>