<template>
  <ol
    v-if="audits.length > 0"
    class="relative border-l border-gray-200 dark:border-white-700"
  >
    <li class="mb-2 ml-4" v-for="audit in audits" :key="audit.id">
      <div
        class="
          absolute
          w-3
          h-3
          bg-purple-600
          rounded-full
          -left-1.5
          border border-purple-500
          dark:border-purple-900 dark:bg-purple-700
        "
      ></div>
      <h6 class="text-sm font-semibold text-gray-500 dark:text-white">
        {{ audit.action }}
      </h6>
      <time
        class="
          mb-1
          text-sm
          font-normal
          leading-none
          text-gray-400
          dark:text-gray-500
        "
        >{{formatDate()}}</time
      >
    </li>
  </ol>
  <span v-else> No history </span>
</template>

<script>
import moment from "moment";
export default {
  props: ["audits"],
  data() {
    return {};
  },
  mounted() {
    console.log(this.ticket);
  },
  methods: {
    formatDate(date) {
      return moment(date).format('MMMM Do YYYY, h:mm:ss A');
    },
  },
};
</script>

<style>
</style>