<template>
  <div>
    <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
      <li class="mr-2">
        <a
          href="#"
          aria-current="page"
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
            'text-gray-500': openTab !== 'agent',
            'text-blue-500 border-b-blue-500': openTab === 'agent',
          }"
          v-on:click="toggleTabs('agent')"
          >Agent</a
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
            'text-gray-500': openTab !== 'user',
            'text-blue-500 border-b-blue-500': openTab === 'user',
          }"
          v-on:click="toggleTabs('user')"
          >User</a
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
            'text-gray-500': openTab !== 'category',
            'text-blue-500 border-b-blue-500': openTab === 'category',
          }"
          v-on:click="toggleTabs('category')"
          >Category</a
        >
      </li>
    </ul>

    <div class="flex flex-col py-2">
      <table-spinner v-show="loading" />
      <div
        class="bg-gray-50 bg-white shadow-md dark:bg-gray-800"
        role="tabpanel"
        aria-labelledby="profile-tab"
        v-bind:class="{
          hidden: openTab !== 'agent',
          block: openTab === 'agent',
        }"
        :key="1"
      >
        <agent-tab :agents="stats.agents"></agent-tab>
      </div>
      <div
        class="bg-gray-50 bg-white shadow-md dark:bg-gray-800"
        role="tabpanel"
        aria-labelledby="dashboard-tab"
        v-bind:class="{ hidden: openTab !== 'user', block: openTab === 'user' }"
        :key="2"
      >
        <user-tab :users="stats.users"></user-tab>
      </div>
      <div
        class="bg-gray-50 bg-white shadow-md dark:bg-gray-800"
        role="tabpanel"
        aria-labelledby="settings-tab"
        v-bind:class="{
          hidden: openTab !== 'category',
          block: openTab === 'category',
        }"
        :key="3"
      >
        <category-tab :categories="stats.categories"></category-tab>
      </div>
    </div>
  </div>
</template>

<script>
import AgentTab from "./AgentTab.vue";
import CategoryTab from "./CategoryTab.vue";
import UserTab from "./UserTab.vue";
import { get } from "../../utilities/apiService";
import TableSpinner from "./tableSpinner.vue";
export default {
  components: { AgentTab, UserTab, CategoryTab, TableSpinner },
  data() {
    return {
      openTab: "agent",
      stats: {
        agents: [],
        users: [],
        categories: [],
        loading: false,
        showEmptyState: false,
      },
    };
  },
  beforeMount() {
    this.loading = true;
    this.getStats();
    this.loading = false;
  },
  methods: {
    toggleTabs(tabName) {
      this.openTab = tabName;
    },
    async getStats() {
      let responseData = await get("/dashboard")
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
      console.log(responseData.data);
        this.stats.agents = responseData.data.agents_pert_tickets_completed;
      this.stats.users = responseData.data.users_pert_tickets_completed;
      this.stats.categories =
        responseData.data.categories_pert_tickets_completed;
        
      console.table(this.stats.agents);
    },
  },
};
</script>

<style scoped>
.tab-enter-active,
.tab-leave-active {
  transition: opacity 1s ease;
}
.tab-enter,
.tab-leave-to {
  opacity: 0;
}
</style>