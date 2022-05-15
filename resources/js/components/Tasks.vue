<template>
  <div>
    <loading v-if="loading" />
    <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
      <li class="mr-2">
        <a
          href="#"
          class="
            inline-block
            py-4
            px-4
            text-sm
            font-medium
            text-center
            rounded-t-lg
            border-b-2 border-transparent
            hover:text-gray-600 hover:border-gray-300
            dark:text-gray-400 dark:hover:text-gray-300
          "
          :class="{
            'text-gray-500': openTab !== 'undoneTasks',
            'text-blue-500 border-b-blue-500': openTab === 'undoneTasks',
          }"
          v-on:click="toggleTabs('undoneTasks')"
          >Not Done</a
        >
      </li>
      <li class="mr-2">
        <a
          href="#"
          class="
            inline-block
            py-4
            px-4
            text-sm
            font-medium
            text-center
            rounded-t-lg
            border-b-2 border-transparent
            hover:text-gray-600 hover:border-gray-300
            dark:text-gray-400 dark:hover:text-gray-300
          "
          :class="{
            'text-gray-500': openTab !== 'doneTasks',
            'text-blue-500 border-b-blue-500': openTab === 'doneTasks',
          }"
          v-on:click="toggleTabs('doneTasks')"
          >Done</a
        >
      </li>
    </ul>

    <div class="flex flex-col py-2">
      <div
        role="tabpanel"
        aria-labelledby="profile-tab"
        v-bind:class="{
          hidden: openTab !== 'undoneTasks',
          block: openTab === 'undoneTasks',
        }"
        :key="1"
      >
        <div v-if="notDoneTasks.length > 0">
          <not-done-tab
            :notDoneTasks="notDoneTasks"
            :loggedInUser="loggedInUser"
            :agents="agents"
            @taskDeleted="removeTask"
            @taskEdited="updateEditedTask"
            @taskMarkedHasDone="markTaskHasDone"
            @taskAssigned="assignTask"
          />
        </div>
        <div v-else>
          <empty-state
            :imageName="'task-accomplished.jpg'"
            :message="'Hurray Tasks completed'"
          />
        </div>
      </div>
      <div
        role="tabpanel"
        aria-labelledby="dashboard-tab"
        v-bind:class="{
          hidden: openTab !== 'doneTasks',
          block: openTab === 'doneTasks',
        }"
        :key="2"
      >
        <div v-if="doneTasks.length > 0">
          <done-tab
            :doneTasks="doneTasks"
            :loggedInUser="loggedInUser"
            @taskDeleted="removeTask"
            @taskEdited="updateEditedTask"
            :agents="agents"
            @taskMarkedHasNotDone="markTaskHasNotDone"
            @taskAssigned="assignTask"
          />
        </div>
        <div v-else>
          <empty-state
            :imageName="'do-some-work.jpg'"
            :message="'Do something...'"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { get, patch, destroy } from "../utilities/apiService";
import doneTab from "./todoTab/doneTab.vue";
import notDoneTab from "./todoTab/notDoneTab.vue";
import Loading from "./Loading.vue";
import EmptyState from "./EmptyState.vue";
export default {
  props: ["loggedInUser"],
  components: {
    notDoneTab,
    doneTab,
    Loading,
    EmptyState,
  },
  data() {
    return {
      tasks: [],
      doneTasks: [],
      notDoneTasks: [],
      agents: [],
      loading: false,
      showEmptyState: false,
      currentTask: null,
      pagination: {},
      animated: false,
      openTab: "undoneTasks",
      errors: null,
      feedback: "",
    };
  },
  async beforeMount() {
    this.loading = true;
    await this.getTasks();
    await this.getAgents();
    this.loading = false;
  },
  methods: {
    async getTasks(params = {}) {
      this.loading = true;
      let responseData = await get("/tasks", params)
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
      this.tasks = responseData.data;
      this.notDoneTasks = this.tasks.filter((task) => task.done == false);
      this.doneTasks = this.tasks.filter((task) => task.done == true);
      this.pagination = {
        total: responseData.total,
        currentPage: responseData.current_page,
        lastPage: responseData.last_page,
        firstPageUrl: responseData.first_page_url,
        nextPageUrl: responseData.next_page_url,
        perPage: responseData.per_page,
        prevPageUrl: responseData.prev_page_url,
        to: responseData.to,
        from: responseData.from,
      };
      if (this.tasks.length < 1) {
        this.showEmptyState = true;
      } else {
        this.showEmptyState = false;
      }
      // this.currentTask = this.tasks[0];
      //   console.log(this.currentTask);
      this.loading = false;
    },
    toggleTabs(tabName) {
      this.openTab = tabName;
    },
    removeTaskFromDoneTasks(task) {
      console.log("removeTaskFromDoneTasks", task);
      this.doneTasks = this.doneTasks.filter((element, index) => {
        return element.id != task.id;
      });
    },
    removeTaskFromNotDoneTasks(task) {
      console.log("removeTaskFromNotDoneTasks", task);
      this.notDoneTasks = this.notDoneTasks.filter((element, index) => {
        return element.id != task.id;
      });
    },
    async updateEditedTask(task) {
      const url = `tasks/${task.id}`;
      let responseData = await patch(url, {
        title: task.title,
        description: task.description,
      })
        .then((response) => {
          notify({
            text: response.data.message,
            theme: "green",
            hideAfter: 3000,
          });
        })
        .catch((err) => {
          this.errors = null;
          const errResponse = err.response;
          const status = errResponse.status;
          if (status == 422) {
            this.errors = { ...errResponse.data.errors };
            this.feedback = errResponse.data.message;
            notify({
              text: this.feedback,
              theme: "red",
              hideAfter: 3000,
            });
          }
          this.loading = false;
        });
    },
    async markTaskHasDone(task) {
      await this.updateTaskDone(task);
      this.doneTasks.unshift(task);
      this.removeTaskFromNotDoneTasks(task);
    },
    async markTaskHasNotDone(task) {
      await this.updateTaskDone(task);
      this.notDoneTasks.unshift(task);
      this.removeTaskFromDoneTasks(task);
    },
    async removeTask(task) {
      const response = confirm(
        "Are your sure you want to delete this task titled: " +
          task.title +
          " this action can not be reversed"
      );
      if (response == false) {
        return;
      }
      const url = `tasks/${task.id}/delete`;
      await destroy(url)
        .then((response) => {
          if (task.done == true) {
            this.removeTaskFromDoneTasks(task);
          } else {
            this.removeTaskFromNotDoneTasks(task);
          }
          notify({
            text: response.data.message,
            theme: "green",
            hideAfter: 3000,
          });
        })
        .catch((error) => {
          this.errors = null;
          this.feedback = "";
          const errResponse = err.response;
          const status = errResponse.status;
          this.feedback = errResponse.data.message;
          notify({
            text: this.feedback,
            theme: "red",
            hideAfter: 3000,
          });
        });
    },
    async updateTaskDone(task) {
      const url = `tasks/${task.id}/mark`;
      let responseData = await patch(url, {
        done: task.done,
      })
        .then((response) => {
          console.log(task);
          notify({
            text: response.data.message,
            theme: "green",
            hideAfter: 3000,
          });
        })
        .catch((err) => {
          this.errors = null;
          this.feedback = "";
          const errResponse = err.response;
          const status = errResponse.status;
          this.feedback = errResponse.data.message;
          if (status == 422) {
            this.errors = errResponse.data.errors;
            // console.log(errResponse.data.errors.title[0]);
            notify({
              text: this.feedback,
              theme: "red",
              hideAfter: 3000,
            });
            for (const key in this.errors) {
              if (this.errors.hasOwnProperty(key)) {
                // console.log(`${key}: ${this.errors[key]}`);
                notify({
                  text: this.errors[key][0],
                  theme: "red",
                  hideAfter: 3000,
                });
              }
            }
          } else {
            notify({
              text: this.feedback,
              theme: "red",
              hideAfter: 3000,
            });
          }
          this.loading = false;
        });
      return responseData;
    },
    async assignTask(task) {
      const url = `tasks/${task.id}/assign`;
      let responseData = await patch(url, {
        assigned_to: task.assigned_to.id,
      })
        .then((response) => {
          notify({
            text: response.data.message,
            theme: "green",
            hideAfter: 3000,
          });
        })
        .catch((err) => {
          this.errors = null;
          this.feedback = "";
          const errResponse = err.response;
          const status = errResponse.status;
          this.feedback = errResponse.data.message;
          notify({
            text: this.feedback,
            theme: "red",
            hideAfter: 3000,
          });
          this.loading = false;
        });
    },
    async getAgents() {
      this.agents = await get("/users").then((response) => {
        return response.data.data;
      });
    },
  },
};
</script>

<style>
</style>