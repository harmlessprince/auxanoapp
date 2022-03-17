  <!-- Desktop sidebar -->
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Auxano Solutions
          </a>
          <ul class="mt-6">
              @include('partials.aside.desktop.dashboard')
          </ul>
          <ul>
              @include('partials.aside.desktop.user')
              @include('partials.aside.desktop.ticket')
              @include('partials.aside.desktop.role')
              @include('partials.aside.desktop.customer')
              @include('partials.aside.desktop.category')
          </ul>
          <div class="px-6 my-6">
              <a href="{{ route('tickets.create') }}"
                  class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Create Ticket
                  <span class="ml-2" aria-hidden="true">+</span>
              </a>
          </div>
      </div>
  </aside>
