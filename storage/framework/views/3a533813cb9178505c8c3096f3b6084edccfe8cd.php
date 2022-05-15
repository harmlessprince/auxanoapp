<?php $attributes = $attributes->exceptProps([
    'type' => 'submit'
]); ?>
<?php foreach (array_filter(([
    'type' => 'submit'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<button type="<?php echo e($type); ?>" <?php echo e($attributes->merge(['class' => 'px-5 py-3 capitalize font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'])); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/components/button.blade.php ENDPATH**/ ?>