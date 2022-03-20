<template>
  <div
    class="
      flex flex-col
      border-r-2 border-grey-100
      dark:border-gray-700
      col-start-1 col-end-3
      -mx-3
      w-full
    "
  >
    <div class="flex flex-col items-center">
      <!-- Help text -->
      <span class="text-sm text-gray-700 dark:text-gray-400">
        Showing
        <span class="font-semibold text-gray-900 dark:text-white">{{
          pagination.from
        }}</span>
        to
        <span class="font-semibold text-gray-900 dark:text-white">{{
          pagination.to
        }}</span>
        of
        <span class="font-semibold text-gray-900 dark:text-white">{{
          pagination.total
        }}</span>
        Entries
      </span>
      <div class="inline-flex mt-2 xs:mt-0 mb-2 ">
        <button
          :disabled="yesFirstPage == 1"
          class="
            inline-flex
            items-center
            py-2
            px-4
            text-sm
            font-medium
            text-white
            bg-gray-800
            rounded-l
            hover:bg-gray-900
            dark:bg-gray-800
            dark:border-gray-700
            dark:text-gray-400
            dark:hover:bg-gray-700
            dark:hover:text-white
            mr-1
          "
          @click="previousPage"
        >
          <svg
            class="mr-2 w-5 h-5"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
          Prev
        </button>
        <button
          :disabled="yesMorePages == 0"
          class="
            inline-flex
            items-center
            py-2
            px-4
            text-sm
            font-medium
            text-white
            bg-gray-800
            rounded-r
            border-0 border-l border-gray-700
            hover:bg-gray-900
            dark:bg-gray-800
            dark:border-gray-700
            dark:text-gray-400
            dark:hover:bg-gray-700
            dark:hover:text-white
          "
          @click="nextPage"
        >
          Next
          <svg
            class="ml-2 w-5 h-5"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>
    </div>

    <div
      class="
        overflow-y-scroll
        max-h-screen
        min-h-screen
        overflow-x-auto
        scrollbar-thin scrollbar-thumb-purple-700 scrollbar-track-purple-300
        flex-1
      "
    >
      <table class="w-full whitespace-no-wrap">
        <thead class="text-left">
          <tr
            class="
              text-xs
              font-semibold
              tracking-wide
              md:tracking-normal
              sm:tracking-tight
              text-left text-gray-500
              uppercase
              dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700
            "
          >
            <th class="px-4 py-3">Ticket Name</th>
            <th class="px-4 py-3">Created</th>
          </tr>
        </thead>
        <tbody class="bg-white dark:divide-gray-700 dark:bg-gray-800">
          <tr
            v-for="item in tickets"
            :key="item.id"
            class="
              text-gray-700
              hover:text-white
              dark:text-gray-200
              shadow-md
              hover:bg-purple-500
              dark:hover:bg-gray-700
              cursor-pointer
              transition-colors
              duration-150
              active:bg-purple-700
            "
            v-on:click="selectTicket(item)"
            :class="[
              item.id == selectedTicket.id
                ? 'text-white border-solid border-2 border-purple-300 bg-purple-700 my-3 cursor-not-allowed'
                : '',
            ]"
          >
            <td class="px-4 py-3 dark:text-black">
              {{ truncateTicketName(item.subject, 20) }}
            </td>
            <td class="px-4 py-3 dark:text-black">
              {{ formatDate(item.created_at) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { truncate } from "../utilities/helpers";
import moment from "moment";
export default {
  props: ["tickets", "selectedTicket", "pagination"],
  data() {
    return {
      animated: false,
      yesFirstPage: true,
      yesMorePages: true,
    };
  },
  beforeMount() {
    this.selectTicket(this.tickets[0]);
    this.onFirstPage();
    this.hasMorePages();
  },
  beforeUpdate() {
    this.onFirstPage();
    this.hasMorePages();
  },
  methods: {
    nextPage() {
      this.$emit("nextPage", { page: this.pagination.currentPage + 1 });
    },
    previousPage() {
      this.$emit("previousPage", { page: this.pagination.currentPage - 1 });
    },
    animateDetail() {
      this.animated = !this.animated;
      this.$emit("animatedDetail", this.animated);
    },
    selectTicket(ticket) {
      this.$emit("ticketSelected", ticket);
      this.animateDetail();
    },
    truncateTicketName(name) {
      let limit = 20;
      if (screen.width > 1366) {
        limit = 30;
      }
      return truncate(name, limit);
    },
    formatDate(date) {
      return moment(date).fromNow();
    },
    onFirstPage() {
      return (this.yesFirstPage = this.pagination.currentPage == 1);
    },
    hasMorePages() {
      return (this.yesMorePages =
        this.pagination.currentPage < this.pagination.lastPage);
    },
  },
};
</script>

<style>
</style>

