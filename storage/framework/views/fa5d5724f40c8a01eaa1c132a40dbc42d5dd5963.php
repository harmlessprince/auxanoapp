<li class="relative px-6 py-3">
    <?php if($active): ?>
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    <?php endif; ?>
    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 <?php echo e($active ? ' text-gray-800 ' : ''); ?> hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
        href="<?php echo e(route($url)); ?>">
        <?php echo e($slot); ?>

        <span class="ml-4"><?php echo e($title); ?></span>
    </a>
</li>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/components/side-menu.blade.php ENDPATH**/ ?>