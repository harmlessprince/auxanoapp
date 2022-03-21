<template>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto" v-if="users.length > 0">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
            class="
              text-xs
              font-semibold
              tracking-wide
              text-left text-gray-500
              uppercase
              border-b
              dark:border-gray-700
              bg-gray-50
              dark:text-gray-400 dark:bg-gray-800
            "
          >
            <th class="px-4 py-3">Full Name</th>
            <th class="px-4 py-3">Closed</th>
            <th class="px-4 py-3">Open</th>
            <th class="px-4 py-3">Total</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr
            class="text-gray-700 dark:text-gray-400"
            v-for="user in users"
            :key="user.id"
          >
            <td class="px-4 py-3">
              {{ user.first_name }} {{ user.last_name }}
            </td>
            <td class="px-4 py-3">{{ user.user_complete_tickets_count }}</td>
            <td class="px-4 py-3">{{ user.user_open_tickets_count }}</td>
            <td class="px-4 py-3">{{ user.user_tickets_count }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="w-full text-center text-lg" v-else>No Data</p>
  </div>
</template>

<script>
export default {
  props: ["users"],
  data() {
    return {};
  },
  computed: {},
  mounted() {},
  methods: {
    percentage(user) {
      let result =
        (user.user_complete_tickets_count / user.user_tickets_count) *
          100 || 0;
      return result.toFixed(2);
    },
  },
};
</script>

<style>
</style>