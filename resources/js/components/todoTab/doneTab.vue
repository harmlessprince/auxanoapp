<template>
  <div class="bg-gray-50 bg-white shadow-md dark:bg-gray-800 px-4 py-6">
    <div class="-mx-4 flex flex-wrap">
      <todo-card
        :task="task"
        v-for="task in doneTasks"
        :key="task.id"
        :agents="agents"
        :loggedInUser="loggedInUser"
        @taskDeleted="deleteTask"
        @taskEdited="editTask"
        @taskIsNotDone="markTaskHasNotDone"
        @taskAssigned="assignTask"
      />
    </div>
  </div>
</template>

<script>
import todoCard from "./todoCard.vue";
export default {
  components: { todoCard },
  props: ["doneTasks", "loggedInUser", "agents"],
  data() {
    return {};
  },
  methods: {
    formattedString(text) {
      // return text.substring(0, this.maxChars) + "...";
    },
    markTaskHasNotDone(task) {
      this.$emit("taskMarkedHasNotDone", task);
    },
    assignTask(task) {
      this.$emit("taskAssigned", task);
    },
    editTask(task) {
      this.$emit("taskEdited", task);
    },
    deleteTask(task) {
      this.$emit("taskDeleted", task);
      notify({
        text: "Task deleted successfully",
        theme: "red",
        hideAfter: 3000,
      });
    },
  },
};
</script>

<style>
</style>