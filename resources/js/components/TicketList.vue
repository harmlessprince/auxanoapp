<template>
  <div
    class="
      border-r-2 border-grey-100
      dark:border-gray-700
      col-start-1 col-end-3
      -mx-3
      overflow-y-scroll
      max-h-screen
      min-h-screen
      w-full
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
</template>

<script>
import { truncate } from "../utilities/helpers";
import moment from "moment";
export default {
  props: ["tickets", "selectedTicket"],
  data() {
    return {
      
    };
  },
  beforeMount() {
    this.selectTicket(this.tickets[0]);
  },
  methods: {
    selectTicket(ticket) {
      this.$emit("ticketSelected", ticket);
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
  },
};
</script>

<style>
</style>

