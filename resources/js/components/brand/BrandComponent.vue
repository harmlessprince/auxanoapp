<template>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <brand-table
        :brands="brands"
        @brandSelected="editBrand"
        @deleteBrand="deleteBrand"
      />
    </div>
    <transition  name="fade" appear>
      <modal
        v-show="isModalVisible"
        @close="closeModal"
        @clicked="updateBrand"
      >
        <template v-slot:header> Edit Brand </template>
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
                  v-model="brandName"
                />
              </label>
            </div>
          </div>
        </template>
      </modal>
    </transition>
    <!-- {{-- {{ brands->links() }} --}} -->
  </div>
</template>

<script>
import { get, patch, destroy } from "../../utilities/apiService";
import { formatDate } from "../../utilities/helpers";
import BrandTable from "./BrandTable.vue";
import Button from "../Button.vue";
import Modal from "../Modal.vue";
export default {
  components: {
    "v-button": Button,
    BrandTable,
    Modal,
  },
  data() {
    return {
      brands: [],
      loading: false,
      brandName: null,
      isModalVisible: false,
      selectedBrand: {},
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
      this.brands = await get("/brands").then((response) => {
        return response.data.data;
      });
    },
    editBrand(brand) {
      this.showModal(brand);
    },
    async updateBrand() {
      //   console.log(this.selectedBrand.id);
      if (this.selectedBrand.name == this.brandName) {
        this.closeModal();
        return;
      }
      await patch(`brands/${this.selectedBrand.id}`, {
        name: this.brandName,
      })
        .then((response) => {
          console.log(response);
          this.selectedBrand.name = this.brandName;
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
    async deleteBrand(brand) {
      const response = confirm(
        `Are your sure you want to delete this band  "${brand.name}". This action can not be reversed`
      );
      if (response == false) {
        return;
      }
      await destroy(`brands/${brand.id}`, {
        name: this.brandName,
      })
        .then((response) => {
          let color = "green";
          if (response.data.success == false) {
            color = "red";
          } else {
            this.brands = this.brands.filter((element) => {
              return element.id != brand.id;
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
    showModal(brand) {
      this.selectedBrand = brand;
      this.brandName = brand.name;
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