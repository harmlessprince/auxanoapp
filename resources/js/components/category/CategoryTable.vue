
<template>
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
        <th class="px-4 py-3">Name</th>
        <!-- <th class="px-4 py-3">Created At</th> -->
        <th class="px-4 py-3">Actions</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
      <tr
        class="text-gray-700 dark:text-gray-400"
        v-for="category in categories"
        :key="category.id"
      >
        <td class="px-4 py-3 capitalize">
          {{ category.name }}
        </td>
        <td class="px-4 py-3">
          <div class="flex items-center space-x-4 text-sm">
            <v-button
              class="text-purple-600 rounded-lg dark:text-gray-400"
              @clicked="editCategory(category)"
            >
              <font-awesome-icon
                icon="fa-regular fa-pen-to-square"
                class="w-5 h-5"
                fill="currentColor"
              />
            </v-button>
            <v-button
              class="text-red-600 rounded-lg dark:text-gray-400"
              @clicked="deleteCategory(category)"
            >
              <font-awesome-icon
                icon="fa-solid fa-trash"
                class="w-5 h-5"
                fill="currentColor"
              />
            </v-button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import Button from "../Button.vue";
import Modal from "../Modal.vue";
export default {
  props: ["categories"],

  components: {
    "v-button": Button,
  },
  methods: {
    editCategory(category) {
      this.$emit("categorySelected", category);
    },
    deleteCategory(category) {
      this.$emit("deleteCategory", category);
    },
  },
};
</script>

<style>
</style>