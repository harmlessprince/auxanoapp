  <!-- Desktop sidebar -->
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            <?php echo e(config('app.name')); ?>

          </a>
          <ul class="mt-6">
              <?php echo $__env->make('partials.aside.desktop.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </ul>
          <ul>
              <?php echo $__env->make('partials.aside.desktop.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php echo $__env->make('partials.aside.desktop.ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php echo $__env->make('partials.aside.desktop.role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php echo $__env->make('partials.aside.desktop.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php echo $__env->make('partials.aside.desktop.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </ul>
          <div class="px-6 my-6">
              <a href="<?php echo e(route('tickets.create')); ?>"
                  class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Create Ticket
                  <span class="ml-2" aria-hidden="true">+</span>
              </a>
          </div>
      </div>
  </aside>
<?php /**PATH /home/harmlessprince/web projects/laravel/auxanoapp/resources/views/partials/aside/desktop/desktop.blade.php ENDPATH**/ ?>