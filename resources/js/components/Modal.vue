<template>
  <transition name="modal-fade">
    <div>
      <div
        class="
          overflow-x-hidden overflow-y-auto
          fixed
          inset-0
          z-50
          outline-none
          focus:outline-none
          justify-center
          items-center
          flex
        "
        @click="close"
      >
        <div
          class="
            relative
            w-full
            px-6
            overflow-hidden
            bg-white
            dark:bg-gray-800
            rounded-t
            sm:rounded-lg sm:m-4 sm:max-w-xl
          "
          @click.stop
          role="dialog"
        >
          <!--content-->
          <!--header-->
          <div
            class="
              flex
              items-start
              justify-between
              px-6
              py-4
              -mx-6
              -mb-4
              rounded-t
              bg-gray-50
              dark:bg-gray-800
            "
          >
            <h3 class="text-md font-semibold">
              <slot name="header"> Modal Title </slot>
            </h3>
            <button
              type="button"
              class="
                text-gray-400
                bg-transparent
                hover:bg-gray-200 hover:text-gray-900
                rounded-lg
                text-sm
                p-1.5
                ml-auto
                inline-flex
                items-center
                dark:hover:bg-gray-600 dark:hover:text-white
              "
              @click="close"
            >
              <svg
                class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
          <!--body-->
          <div class="relative p-3 flex-auto">
            <slot name="body">
              <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                Modal body
              </p>
            </slot>
          </div>
          <!--footer-->
          <div
            class="
              flex flex-col
              items-center
              justify-end
              px-6
              py-3
              -mx-6
              space-y-4
              sm:space-y-0 sm:space-x-6 sm:flex-row
              bg-gray-50
              dark:bg-gray-800
              rounded-b
            "
          >
            <slot name="footer">
              <button
                @click="close"
                type="button"
                class="
                  w-full
                  px-5
                  py-3
                  text-sm
                  font-medium
                  leading-5
                  text-black text-gray-700
                  transition-colors
                  duration-150
                  border border-gray-300
                  rounded-lg
                  dark:text-gray-400
                  sm:px-4 sm:py-2 sm:w-auto
                  active:bg-transparent
                  hover:border-gray-500
                  focus:border-gray-500
                  active:text-gray-500
                  focus:outline-none focus:shadow-outline-gray
                "
              >
                Cancel
              </button>
              <button
                type="submit"
                class="
                  w-full
                  px-5
                  py-3
                  text-sm
                  font-medium
                  leading-5
                  text-white
                  transition-colors
                  duration-150
                  bg-purple-600
                  border border-transparent
                  rounded-lg
                  sm:w-auto sm:px-4 sm:py-2
                  active:bg-purple-600
                  hover:bg-purple-700
                  focus:outline-none focus:shadow-outline-purple
                "
              >
                Save
              </button>
            </slot>
          </div>
        </div>
      </div>
      <div
        class="opacity-25 fixed inset-0 z-40 bg-black"
        v-on:click="close"
      ></div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "Modal",
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<style>
.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.5s ease;
}
</style>