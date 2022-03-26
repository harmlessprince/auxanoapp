<template>
  <div class="w-full flex space-x-4 justify-start items-end py-3">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400 uppercase font-bold"
        >Ticket Name</span
      >
      <div
        class="
          relative
          text-gray-500
          focus-within:text-purple-600
          dark:focus-within:text-purple-400
        "
      >
        <input
          class="
            block
            w-full
            pl-10
            mt-1
            text-sm text-black
            dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400
            focus:outline-none
            focus:shadow-outline-purple
            dark:focus:shadow-outline-gray
            form-input
          "
          v-model="ticket_name"
          placeholder="Jane Doe"
        />
        <div
          class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-6 h-6"
          >
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
      </div>
    </label>
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400 font-bold">Status</span>
      <select
        class="
          block
          w-full
          mt-1
          text-sm
          dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
          form-select
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
          dark:focus:shadow-outline-gray
        "
        v-model="status"
      >
        <option value="">---Select Status----</option>
        <option v-for="item in statuses" :key="item.id" :value="item.id">
          {{ item.name }}
        </option>
      </select>
    </label>
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400 font-bold">Priority</span>
      <select
        class="
          block
          w-full
          mt-1
          text-sm
          dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
          form-select
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
          dark:focus:shadow-outline-gray
        "
        v-model="priority"
      >
        <option value="">---Select Priority----</option>
        <option v-for="item in priorities" :key="item.id" :value="item.id">
          {{ item.name }}
        </option>
      </select>
    </label>
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400 font-bold"
        >Agents</span
      >
      <select
        class="
          block
          w-full
          mt-1
          text-sm
          dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
          form-select
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
          dark:focus:shadow-outline-gray
        "
        v-model="agent"
      >
        <option value="">---Select Agent----</option>
        <option v-for="item in agents" :key="item.id" :value="item.id">
          {{ item.first_name }} {{ item.last_name }}
        </option>
      </select>
    </label>
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400 font-bold">Category</span>
      <select
        class="
          block
          w-full
          mt-1
          text-sm
          dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
          form-select
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
          dark:focus:shadow-outline-gray
        "
        v-model="category"
      >
        <option value="">---Select Category----</option>
        <option
          v-for="category in categories"
          :key="category.id"
          :value="category.id"
        >
          {{ category.name }}
        </option>
      </select>
    </label>
    <button
      @click="filterTickets"
      type="button"
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
        duration-150
        bg-purple-600
        border border-transparent
        rounded-lg
        active:bg-purple-600
        hover:bg-purple-700
        focus:outline-none focus:shadow-outline-purple
      "
    >
      Search
    </button>
  </div>
</template>

<script>
import Button from "./Button.vue";
export default {
  props: ["statuses", "categories", "priorities", "agents"],
  components: {
    "v-button": Button,
  },
  data() {
    return {
      status: "",
      category: "",
      priority: "",
      agent: "",
      ticket_name: "",
    };
  },
  async beforeMount() {},
  mounted() {},
  methods: {
    filterTickets() {
      let params = this.cleanParams({
        status: this.status,
        category: this.category,
        priority: this.priority,
        agent: this.agent,
        ticket_name: this.ticket_name,
      });
      this.$emit("search", params);
    },
    cleanParams(obj) {
      for (var propName in obj) {
        if (obj[propName] === null || obj[propName] === undefined || obj[propName] === '') {
          delete obj[propName];
        }
      }
      return obj;
    },
  },
};
</script>
