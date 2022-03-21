<template>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto" v-if="agents.length > 0">
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
            <th class="px-4 py-3">Agent</th>
            <th class="px-4 py-3">Closed</th>
            <th class="px-4 py-3">Open</th>
            <th class="px-4 py-3">Total</th>
            <th class="px-4 py-3">Ticket Closing Rate</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr
            class="text-gray-700 dark:text-gray-400"
            v-for="agent in agents"
            :key="agent.id"
          >
            <td class="px-4 py-3">
              {{ agent.first_name }} {{ agent.last_name }}
            </td>
            <td class="px-4 py-3">{{ agent.agent_complete_tickets_count }}</td>
            <td class="px-4 py-3">{{ agent.agent_open_tickets_count }}</td>
            <td class="px-4 py-3">{{ agent.agent_tickets_count }}</td>
            <td class="px-4 py-3">{{ percentage(agent) }}%</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="w-full text-center text-lg" v-else>No Data</p>
  </div>
</template>

<script>
export default {
  props: ["agents"],
  data() {
    return {};
  },
  computed: {},
  mounted() {},
  methods: {
    percentage(agent) {
      let result =
        (agent.agent_complete_tickets_count / agent.agent_tickets_count) *
          100 || 0;
      return result.toFixed(2);
    },
  },
};
</script>

<style>
</style>