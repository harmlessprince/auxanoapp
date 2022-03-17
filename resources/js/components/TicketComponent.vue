<template>
  <div>
    <loading v-if="loading" />
    <search-ticket-form
      :categories="categories"
      :statuses="statuses"
      :priorities="priorities"
      :technicians="technicians"
      @search="getTickets"
    />
    <!-- Container -->
    <div
      class="
        bg-white
        dark:divide-gray-700 dark:bg-gray-800
        mt-3
        p-3
        grid grid-cols-6
        gap-x-5
        sm:gap-x-2
        xl:gap-x-2
      "
      v-if="tickets.length > 0"
    >
      <!-- Table Container -->
      <div
        class="
          border-r-2 border-grey-100
          dark:border-gray-700
          col-start-1 col-end-3
          -mx-3
          overflow-y-scroll
          max-h-screen
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
      <!-- Table Container End -->

      <!-- Details Container -->
      <div
        v-if="selectedTicket"
        class="
          col-start-3 col-end-7
          text-gray-700
          dark:text-gray-400
          sm:p-2
          flex
        "
      >
        <!-- Left Detail -->
        <div class="border-r-2 border-grey-100 dark:border-gray-700 w-3/4 ">
          <div class="flex justify-between items-center mb-2">
            <h4
              class="
                text-lg
                sm:text-md
                font-bold
                text-gray-600
                dark:text-gray-300
              "
            >
              {{ selectedTicket.subject }}
            </h4>
          </div>

          <div class="flex flex-col">
            <p class="text-green-400 mb-2 font-semibold">
              Submitted by: {{ selectedTicket.user.first_name }}
              {{ selectedTicket.user.last_name }}
            </p>
            <p class="text-orange-400 my-3 font-semibold">
              Assigned To: {{ selectedTicket.agent.first_name }}
              {{ selectedTicket.agent.last_name }}
            </p>
          </div>
          <divider />
          <div class="my-3 w-full">
            <h4
              class="
                text-md
                font-semibold
                text-gray-600
                dark:text-gray-300
                mb-3
              "
            >
              Customer Info
            </h4>

            <div class="flex items-end mb-2">
              <h5 class="text-md text-grey-600 font-semibold sentence mr-3">
                Name:
              </h5>
              <p class="tex-sm">
                {{ selectedTicket.customer.name }}
              </p>
            </div>
            <div class="flex items-end mb-2">
              <h5 class="text-md text-grey-600 font-semibold sentence mr-3">
                Email:
              </h5>
              <p class="tex-sm">
                {{ selectedTicket.customer.email }}
              </p>
            </div>
            <div class="flex items-end">
              <h5 class="text-md text-grey-600 font-semibold sentence mr-3">
                Phone number:
              </h5>
              <p class="tex-sm">
                {{ selectedTicket.customer.phone_number }}
              </p>
            </div>
          </div>
          <divider />

          <div class="my-3 w-full">
            <h4
              class="
                text-md
                font-semibold
                text-gray-600
                dark:text-gray-300
                mb-3
              "
            >
              Fault Detail
            </h4>
            <div class="mb-3">
              <h5 class="text-md text-grey-600 font-semibold sentence mb-1">
                Reported:
              </h5>
              <p class="tex-sm">
                {{
                  selectedTicket.fault_reported
                    ? selectedTicket.fault_reported
                    : "None Reported"
                }}
              </p>
            </div>
            <div class="">
              <h5 class="text-md text-grey-600 font-semibold sentence mb-1">
                Observed:
              </h5>
              <p class="tex-sm">
                {{
                  selectedTicket.fault_observed
                    ? selectedTicket.fault_observed
                    : "None Observed"
                }}
              </p>
            </div>
          </div>
          <!-- <divider /> -->
        </div>
        <!-- Lef detail End -->
        <!-- Right Detail -->
        <div class="p-2 flex flex-col w-1/4">
          <div class="mb-3">
            <h6
              class="
                text-sm
                font-semibold
                text-gray-600
                dark:text-gray-300
                mb-1
                uppercase
              "
            >
              Status
            </h6>
            <span
              class="
                capitalize
                px-2
                py-1
                font-semibold
                whitespace-nowrap
                rounded-full
                text-sm
              "
              :class="getStatusColor(selectedTicket.status.name)"
            >
              {{ selectedTicket.status.name }}
            </span>
          </div>
          <div class="mb-3">
            <h6
              class="
                text-sm
                font-semibold
                text-gray-600
                dark:text-gray-300
                mb-1
                uppercase
              "
            >
              Priority
            </h6>
            <span
              class="
                capitalize
                px-2
                py-1
                font-semibold
                leading-tight
                rounded-full
                text-sm
              "
              :class="getPriorityColor(selectedTicket.priority.name)"
            >
              {{ selectedTicket.priority.name }}
            </span>
          </div>
          <div class="mb-3">
            <h6
              class="
                text-sm
                font-semibold
                text-gray-600
                dark:text-gray-300
                mb-1
                uppercase
              "
            >
              Category
            </h6>
            <span class="font-semibold text-sm">
              {{ selectedTicket.category.name }}
            </span>
          </div>
        </div>
        <!-- Right Detail End -->
      </div>
      <!-- Details Container End -->
    </div>
    <!-- Container End -->
    <empty-state v-else></empty-state>
  </div>
</template>

<script>
import { get } from "../utilities/apiService";
import { truncate } from "../utilities/helpers";
import SearchTicketForm from "./SearchTicketForm.vue";
import Divider from "./Divider.vue";
import EmptyState from "./EmptyState.vue";
import Loading from "./Loading.vue";
import moment from "moment";
export default {
  components: {
    "search-ticket-form": SearchTicketForm,
    divider: Divider,
    "empty-state": EmptyState,
    Loading,
  },
  data() {
    return {
      tickets: [],
      selectedTicket: null,
      statuses: [],
      categories: [],
      priorities: [],
      technicians: [],
      loading: false,
    };
  },
  async beforeMount() {
    this.loading = true;
    await this.getStatus();
    await this.getPriority();
    await this.getCategory();
    await this.getTechnicians();
    await this.getTickets();
    this.loading = false;
    console.log(screen.width + "px");
  },
  mounted() {},
  methods: {
    async getTickets(params = {}) {
      this.loading = true;
      let responseData = await get("/tickets", params)
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
      console.log(responseData);
      // first_page_url: "http://auxanoapp.test/api/tickets?page=1";
      // from: 1;
      // next_page_url: "http://auxanoapp.test/api/tickets?page=2";
      // path: "http://auxanoapp.test/api/tickets";
      // per_page: 15;
      // prev_page_url: null;
      // to: 15;
      // current_page: 1
      this.tickets = responseData.data;
      this.selectTicket(this.tickets[0]);
      this.loading = false;
    },
    formatDate(date) {
      return moment(date).fromNow();
    },
    truncateTicketName(name) {
      let limit = 20;
      if (screen.width > 1366) {
        limit = 30;
      }
      return truncate(name, limit);
    },
    selectTicket(ticket) {
      this.selectedTicket = ticket;
    },
    async getStatus() {
      console.log(process.env.MIX_APP_URL);
      this.statuses = await get("/statuses")
        .then((response) => {
          return response.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async getPriority() {
      this.priorities = await get("/priorities").then((response) => {
        return response.data.data;
      });
    },
    async getCategory() {
      this.categories = await get("/categories").then((response) => {
        return response.data.data;
      });
    },
    async getTechnicians() {
      this.technicians = await get("/technicians").then((response) => {
        return response.data.data;
      });
    },
    getStatusColor(state) {
      let color = "";
      if (state == "In Progress") {
        color =
          "text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600";
      } else if (state == "Done") {
        color = "bg-green-100 dark:bg-green-700 dark:text-green-100";
      } else if (state == "Canceled") {
        color = "text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700";
      } else if (state == "To do") {
        color = "text-blue-700 bg-blue-100 dark:text-blue-100 dark:bg-blue-500";
      } else if (state == "medium") {
        color =
          "text-yellow-700 bg-yellow-100 dark:text-yellow-100 dark:bg-yellow-500";
      }

      return color;
    },
    getPriorityColor(state) {
      let color = "";
      if (state == "high") {
        color =
          "text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600";
      } else if (state == "low") {
        color = "bg-green-100 dark:bg-green-700 dark:text-green-100";
      } else if (state == "critical") {
        color = "text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700";
      } else if (state == "medium") {
        color =
          "text-yellow-700 bg-yellow-100 dark:text-yellow-100 dark:bg-yellow-500";
      }

      return color;
    },
  },
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>