<template>
  <ol class="relative border-l border-gray-200 dark:border-gray-700">
    <li class="mb-10 ml-6" v-for="comment in comments" :key="comment.id">
      <span
        class="
          flex
          absolute
          -left-3
          justify-center
          items-center
          w-6
          h-6
          bg-blue-200
          rounded-full
          ring-8 ring-white
          dark:ring-gray-900 dark:bg-blue-900
        "
      >
        <!-- <img
          class="rounded-full shadow-lg"
          src="/docs/images/people/profile-picture-5.jpg"
          alt="Thomas Lean image"
        /> -->
      </span>
      <div
        class="
          p-4
          bg-white
          rounded-lg
          border border-gray-200
          shadow-sm
          dark:bg-gray-700 dark:border-gray-600
        "
      >
        <div class="justify-between items-center mb-3 sm:flex">
          <time
            class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"
            >{{ formatDate(comment.created_at) }}</time
          >
          <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
            {{ comment.user.first_name }}
          </div>
        </div>
        <div
          class="
            p-3
            text-xs
            italic
            font-normal
            text-gray-500
            bg-gray-50
            rounded-lg
            border border-gray-200
            dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300
          "
        >
          {{ comment.body }}
        </div>
      </div>
    </li>
  </ol>
</template>

<script>
import moment from "moment";
export default {
  props: ["comments"],
  methods: {
    formatDate(date) {
      return moment(date).fromNow();
    },
  },
};
</script>

<style>
</style>