<template>
  <div class="bg-gray-50 bg-white shadow-md dark:bg-gray-800">
    <div class="-mx-4 flex flex-wrap">
      <todo-card
        :task="task"
        v-for="task in notDoneTasks"
        :key="task.id"
        :loggedInUser="loggedInUser"
        :agents="agents"
        @taskDeleted="deleteTask"
        @taskEdited="editTask"
        @taskIsDone="markTaskHasDone"
        @taskAssigned="assignTask"
      />
    </div>
  </div>
</template>

<script>
import todoCard from "./todoCard.vue";
import EmptyState from "../EmptyState.vue";
export default {
  components: { todoCard, EmptyState },
  props: ["notDoneTasks", "loggedInUser", "agents"],
  data() {
    return {};
  },
  methods: {
    formattedString(text) {
      // return text.substring(0, this.maxChars) + "...";
    },
    markTaskHasDone(task) {
      this.$emit("taskMarkedHasDone", task);
    },
    assignTask(task) {
      this.$emit("taskAssigned", task)
    },
    editTask(task) {
      this.$emit("taskEdited", task);
    },
    deleteTask(task) {
      this.$emit("taskDeleted", task);
    },
  },
};
</script>

<style>
</style>