<template>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <category-table
        :categories="categories"
        @categorySelected="editCategory"
        @deleteCategory="deleteCategory"
      />
    </div>
    <transition  name="fade" appear>
      <modal
        v-show="isModalVisible"
        @close="closeModal"
        @clicked="updateCategory"
      >
        <template v-slot:header> Edit Category </template>
        <template v-slot:body>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 mb-3">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="
                    block
                    w-full
                    mt-1
                    text-sm
                    dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400
                    focus:outline-none
                    focus:shadow-outline-purple
                    dark:text-gray-300 dark:focus:shadow-outline-gray
                    form-input
                  "
                  placeholder="Jane Doe"
                  v-model="categoryName"
                />
              </label>
            </div>
          </div>
        </template>
      </modal>
    </transition>
    <!-- {{-- {{ categories->links() }} --}} -->
  </div>
</template>

<script>
import { get, patch, destroy } from "../utilities/apiService";
import { formatDate } from "../utilities/helpers";
import CategoryTable from "./category/CategoryTable.vue";
import Button from "./Button.vue";
import Modal from "./Modal.vue";
export default {
  components: {
    "v-button": Button,
    CategoryTable,
    Modal,
  },
  data() {
    return {
      categories: [],
      loading: false,
      categoryName: null,
      isModalVisible: false,
      selectedCategory: {},
      feedback: "",
    };
  },
  async beforeMount() {
    this.loading = true;
    await this.getCategories();
    this.loading = false;
  },
  methods: {
    async getCategories() {
      this.categories = await get("/categories").then((response) => {
        return response.data.data;
      });
    },
    editCategory(category) {
      this.showModal(category);
    },
    async updateCategory() {
      //   console.log(this.selectedCategory.id);
      if (this.selectedCategory.name == this.categoryName) {
        this.closeModal();
        return;
      }
      await patch(`categories/${this.selectedCategory.id}`, {
        name: this.categoryName,
      })
        .then((response) => {
          console.log(response);
          this.selectedCategory.name = this.categoryName;
          notify({
            text: response.data.message,
            theme: "green",
            hideAfter: 3000,
          });
          this.closeModal();
        })
        .catch((error) => {
          this.feedback = "";
          const errResponse = error.response;
          //   console.log(errResponse);
          const status = errResponse.status;
          this.feedback = errResponse.data.message;
          if (status == 422) {
            this.errors = errResponse.data.errors;
            notify({
              text: this.feedback,
              theme: "red",
              hideAfter: 3000,
            });
            for (const key in this.errors) {
              if (this.errors.hasOwnProperty(key)) {
                notify({
                  text: this.errors[key][0],
                  theme: "red",
                  hideAfter: 3000,
                });
              }
            }
          } else {
            notify({
              text: errResponse.statusText,
              theme: "red",
              hideAfter: 3000,
            });
            this.closeModal();
          }
        });
    },
    async deleteCategory(category) {
      const response = confirm(
        "Are your sure you want to delete this " +
          category.name +
          " this action can not be reversed"
      );
      if (response == false) {
        return;
      }
      await destroy(`categories/${category.id}`, {
        name: this.categoryName,
      })
        .then((response) => {
          let color = "green";
          if (response.data.success == false) {
            color = "red";
          } else {
            this.categories = this.categories.filter((element) => {
              return element.id != category.id;
            });
          }
          notify({
            text: response.data.message,
            theme: color,
            hideAfter: 3000,
          });

          this.closeModal();
        })
        .catch((error) => {
          this.feedback = "";
          const errResponse = error.response;
          //   console.log(errResponse);
          const status = errResponse.status;
          this.feedback = errResponse.data.message;
          if (status == 422) {
            this.errors = errResponse.data.errors;
            notify({
              text: this.feedback,
              theme: "red",
              hideAfter: 3000,
            });
            for (const key in this.errors) {
              if (this.errors.hasOwnProperty(key)) {
                notify({
                  text: this.errors[key][0],
                  theme: "red",
                  hideAfter: 3000,
                });
              }
            }
          } else {
            notify({
              text: errResponse.statusText,
              theme: "red",
              hideAfter: 3000,
            });
            this.closeModal();
          }
        });
    },
    showModal(category) {
      this.selectedCategory = category;
      this.categoryName = category.name;
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
  },
};
</script>

<style>
</style>