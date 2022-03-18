<template>
  <div
    v-if="selectedTicket"
    class="col-start-3 col-end-7 text-gray-700 dark:text-gray-400 sm:p-2 flex"
  >
    <!-- Left Detail -->
    <div class="border-r-2 border-grey-100 dark:border-gray-700 w-3/4">
      <div class="flex justify-between items-center mb-2">
        <h4
          class="text-lg sm:text-md font-bold text-gray-600 dark:text-gray-300"
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
        <h4 class="text-md font-semibold text-gray-600 dark:text-gray-300 mb-3">
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
        <h4 class="text-md font-semibold text-gray-600 dark:text-gray-300 mb-3">
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
</template>

<script>
import Divider from "./Divider.vue";
export default {
  props: ["selectedTicket"],
  components: {
    divider: Divider,
  },
  data() {
    return {};
  },
  methods: {
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

<style>
</style>