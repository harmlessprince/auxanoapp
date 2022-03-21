<template>
  <div class="w-full overflow-hidden rounded-lg">
    <div class="w-full overflow-x-auto" v-if="categories.length > 0">
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
            <th class="px-4 py-3">Category</th>
            <th class="px-4 py-3">Closed</th>
            <th class="px-4 py-3">Open</th>
            <th class="px-4 py-3">Total</th>
            <th class="px-4 py-3">Rate</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr
            class="text-gray-700 dark:text-gray-400"
            v-for="category in categories"
            :key="category.id"
          >
            <td class="px-4 py-3">{{category.name}}</td>
            <td class="px-4 py-3">category</td>
            <td class="px-4 py-3">10</td>
            <td class="px-4 py-3">40</td>
            <td class="px-4 py-3">10%</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="w-full text-center text-lg" v-else>No Data</p>
  </div>
</template>

<script>
export default {
  props: ["categories"],
  data() {
    return {};
  },
  mounted() {},
  methods: {},
};
</script>

<style>
</style>