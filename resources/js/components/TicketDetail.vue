<template>
  <transition name="fade">
    <div
      v-if="selectedTicket"
      class="col-start-3 col-end-7 text-gray-700 dark:text-gray-400 sm:p-2 flex"
    >
      <!-- Left Detail -->
      <div class="w-4/6">
        <div class="flex items-center space-x-4 mb-2 flex-wrap">
          <button
            class="
              flex
              items-center
              justify-between
              px-4
              py-2
              text-sm
              font-medium
              leading-5
              text-white
              transition-colors
              rounded-lg
              duration-150
              border border-transparent
              focus:outline-none
              text-white
              bg-orange-600
            "
            type="button"
            @click="showModal('status-modal')"
          >
            Change Status
          </button>
          <button
            class="
              flex
              items-center
              justify-between
              px-4
              py-2
              text-sm
              font-medium
              leading-5
              transition-colors
              rounded-lg
              duration-150
              border border-transparent
              focus:outline-none
              text-yellow-100
              bg-yellow-500
            "
            type="button"
            @click="showModal('priority-modal')"
          >
            Change Priority
          </button>
          <!-- <v-button class="text-yellow-100 bg-yellow-500">
          Change Priority
        </v-button> -->
          <button
            class="
              flex
              items-center
              justify-between
              px-4
              py-2
              text-sm
              font-medium
              leading-5
              transition-colors
              rounded-lg
              duration-150
              border border-transparent
              focus:outline-none
              text-blue-100
              bg-blue-500
            "
            type="button"
            @click="showModal('assign-modal')"
          >
            Assign
          </button>
          <!-- <v-button class="text-blue-100 bg-blue-500"> Assign </v-button> -->
          <v-button class="bg-green-700 text-green-100"> Edit </v-button>
        </div>
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

        <div class="my-3 w-full">
          <h4
            class="text-md font-semibold text-gray-600 dark:text-gray-300 mb-3"
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

        <div class="my-3 w-full">
          <h4
            class="text-md font-semibold text-gray-600 dark:text-gray-300 mb-3"
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
          <div class="my-3 w-full">
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
        <!-- <div class="my-3 w-full">
        <h5 class="text-md text-grey-600 font-semibold sentence mb-1">
          Comments
        </h5>
        <comments
          :comments="selectedTicket.comments"
          v-if="selectedTicket.comments.length > 0"
        />
        <span v-else>No Comment</span>
      </div> -->
      </div>
      <!-- Lef detail End -->
      <!-- Right Detail -->
      <div class="p-2 flex flex-col w-2/6">
        <div class="mb-3"></div>
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
            Due Date
          </h6>
          <span class="capitalize font-semibold leading-tight text-sm">
            {{ selectedTicket.due_at }}
          </span>
        </div>
        <div class="mb-3">
          <h4
            class="text-md font-semibold text-gray-600 dark:text-gray-300 mb-3"
          >
            Ticket History
          </h4>
          <audit :audits="selectedTicket.audits" />
        </div>
      </div>
      <!-- Right Detail End -->
      <status-modal
        v-show="isModalVisible == 'status-modal'"
        @close="closeModal"
        @clicked="updateStatus"
      >
        <template v-slot:header> Change Status </template>
        <template v-slot:body>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 mb-3">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Status </span>
                <select
                  class="
                    block
                    w-full
                    mt-1
                    text-sm
                    dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                    form-select
                    focus:border-purple-400
                    focus:outline-none
                    focus:shadow-outline-purple
                    dark:focus:shadow-outline-gray
                  "
                  v-model="selectedStatus"
                >
                  <option value="">----Select Status----</option>
                  <option
                    v-for="status in statuses"
                    :key="status.id"
                    :value="status.id"
                  >
                    {{ status.name }}
                  </option>
                </select>
              </label>
            </div>
          </div>
        </template>
      </status-modal>
      <priority-modal
        v-show="isModalVisible == 'priority-modal'"
        @close="closeModal"
        @clicked="updatePriority"
      >
        <template v-slot:header> Change Priority </template>
        <template v-slot:body>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 mb-3">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Priority </span>
                <select
                  class="
                    block
                    w-full
                    mt-1
                    text-sm
                    dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                    form-select
                    focus:border-purple-400
                    focus:outline-none
                    focus:shadow-outline-purple
                    dark:focus:shadow-outline-gray
                  "
                  v-model="selectedPriority"
                >
                  <option value="">----Select Status----</option>
                  <option
                    v-for="item in priorities"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.name }}
                  </option>
                </select>
              </label>
            </div>
          </div>
        </template>
      </priority-modal>
      <assign-modal
        v-show="isModalVisible == 'assign-modal'"
        @close="closeModal"
        @clicked="reAssignTicket"
      >
        <template v-slot:header> Reassign Ticket </template>
        <template v-slot:body>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 mb-3">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Reassign </span>
                <select
                  class="
                    block
                    w-full
                    mt-1
                    text-sm
                    dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                    form-select
                    focus:border-purple-400
                    focus:outline-none
                    focus:shadow-outline-purple
                    dark:focus:shadow-outline-gray
                  "
                  v-model="selectedAgent"
                >
                  <option value="">----Select Status----</option>
                  <option v-for="item in users" :key="item.id" :value="item.id">
                    {{ item.first_name }} {{ item.last_name }}
                  </option>
                </select>
              </label>
            </div>
          </div>
        </template>
      </assign-modal>
    </div>
  </transition>
  <!-- Details Container End -->
</template>

<script>
import Audit from "./Audit.vue";
import Divider from "./Divider.vue";
import Button from "./Button.vue";
import Comments from "./Comments.vue";
import Modal from "./Modal.vue";
import { patch } from "../utilities/apiService";
export default {
  props: ["selectedTicket", "statuses", "priorities", "users"],
  components: {
    divider: Divider,
    Audit,
    Comments,
    "v-button": Button,
    "status-modal": Modal,
    "priority-modal": Modal,
    "assign-modal": Modal,
  },
  data() {
    return {
      selectedStatus: "",
      selectedPriority: "",
      selectedAgent: "",
      isModalVisible: false,
    };
  },
  mounted() {
    console.log(this.selectedTicket, "slec");
    // this.selectedStatus = this.selectedTicket.status.id;
  },
  methods: {
    getStatusColor(state) {
      let color = "";
      if (state == "In Progress") {
        color =
          "text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-500";
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
    showModal(modal) {
      this.selectedStatus = this.selectedTicket.status.id;
      this.selectedPriority = this.selectedTicket.priority.id;
      this.selectedAgent = this.selectedTicket.agent.id;
      this.isModalVisible = modal;
    },
    closeModal() {
      console.log(this.selectedStatus);
      this.isModalVisible = false;
    },
    async updatePriority() {
      const data = await patch(
        `tickets/${this.selectedTicket.id}/priority`,
        {
          priority: this.selectedPriority,
        },
        {
          _token: csrfToken,
        }
      )
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err.response.data.message);
          notify({
            text: err.response.data.message,
            theme: "red",
            hideAfter: 3000,
          });
        });
      if (data.success) {
        this.closeModal();
        notify({
          text: data.message,
          theme: "green",
          hideAfter: 3000,
        });
        // alert(data.message)
      }
    },
    async updateStatus() {
      const data = await patch(`tickets/${this.selectedTicket.id}/status`, {
        status: this.selectedStatus,
      })
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err.response.data.message);
          notify({
            text: err.response.data.message,
            theme: "red",
            hideAfter: 3000,
          });
        });
      if (data.success) {
        this.closeModal();
        notify({
          text: data.message,
          theme: "green",
          hideAfter: 3000,
        });
        // alert(data.message)
      }
    },
    async reAssignTicket() {
      const data = await patch(`tickets/${this.selectedTicket.id}/reassign`, {
        agent: this.selectedAgent,
      })
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err.response.data.message);
          notify({
            text: err.response.data.message,
            theme: "red",
            hideAfter: 3000,
          });
        });
      if (data.success) {
        this.closeModal();
        notify({
          text: data.message,
          theme: "green",
          hideAfter: 3000,
        });
        // alert(data.message)
      }
    },
  },
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>