<template>
  <div
    class="w-full flex flex-col p-4 sm:w-1/2 lg:w-1/3 bg-white dark:bg-gray-800 cursor-auto"
    @click.self="closeCard()"
  >
    <div
      class="
        flex flex-col flex-1
        px-4
        py-4
        bg-white
        rounded-md
        shadow-md
      "
      @click.self="closeCard()"
       
    >
      <div class="flex-1" @click.self="closeCard()">
        <div class="flex items-center mb-2 justify-between">
          <div class="w-10/12">
            <h4
              class="font-semibold text-gray-600 dark:text-gray-300"
              v-if="!isEditing"
            >
              {{ task.title }}
            </h4>
            <input
              class="
                block
                w-full
                mb-3
                text-sm
                dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400
                focus:outline-none
                focus:shadow-outline-purple
                dark:text-gray-300 dark:focus:shadow-outline-gray
                form-input
              "
              placeholder="Task title"
              v-if="isEditing"
              v-model="task.title"
            />
            <!-- <span class="text-red-400" v-if="errors.length > 0">
              <p v-for="(error, index) in errors['title']" :key="index"></p>
            </span> -->
          </div>

          <button
            @click="editTask(task)"
            class="
              px-2
              py-2
              focus:outline-none
              text-gray-500
              hover:bg-gray-100
              dark:text-gray-100
              hover:dark:bg-gray-500
            "
            v-if="isEditing"
          >
            <font-awesome-icon
              icon="fa-regular fa-floppy-disk"
              class="w-5 h-5 text-gray-500"
            />
          </button>
          <button
            @click="editTask(task)"
            class="
              px-2
              py-2
              focus:outline-none
              text-gray-500
              hover:bg-gray-100
              dark:text-gray-100
              hover:dark:bg-gray-500
            "
            v-if="!isEditing"
          >
            <font-awesome-icon
              icon="fa-regular fa-pen-to-square"
              class="w-5 h-5"
              fill="currentColor"
            />
          </button>
        </div>
        <p
          class="mb-2 text-sm text-gray-600 dark:text-gray-400"
          v-if="loggedInUser.id != task.created_by.id"
          v-show="!isEditing"
        >
          From: {{ fullName }}
        </p>
        <p
          class="mb-2 text-sm text-gray-600 dark:text-gray-400"
          v-if="loggedInUser.id != task.assigned_to.id"
          v-show="!isEditing"
        >
          Assigned to: {{ task.assigned_to.first_name }}
          {{ task.assigned_to.last_name }}
        </p>
        <p
          class="mb-2 text-sm text-gray-600 dark:text-gray-400"
          v-show="!isEditing"
        >
          Created: {{ createdAt(task.created_at) }}
        </p>
        <p
          class="mb-2 text-sm text-gray-600 dark:text-gray-400"
          v-show="!isEditing"
        >
          Due: {{ dueAt(task.due_at) }}
        </p>
        <p
          class="text-gray-600 dark:text-gray-400 text-justify mb-2"
          v-if="!isEditing"
        >
          <span v-if="!readMore[task.id]">
            {{ formattedString(task.description) }}
          </span>
          <span v-if="readMore[task.id]">
            {{ task.description }}
          </span>
          <span v-if="task.description && task.description.length > maxChars">
            <a
              href="#"
              id="readmore"
              @click="showMore(task.id)"
              v-if="!readMore[task.id]"
              class="text-sm text-center rounded text-cyan-500"
              >Read more
              <!-- <font-awesome-icon icon="fa-solid fa-arrow-right" /> -->
            </a>
            <a
              href="#"
              id="readmore"
              @click="showLess(task.id)"
              v-if="readMore[task.id]"
              class="text-sm text-center rounded text-cyan-500"
            >
              <!-- <font-awesome-icon icon="fa-solid fa-arrow-left" /> -->
              Read less
            </a>
          </span>
        </p>
        <textarea
          class="
            block
            w-full
            mb-3
            text-sm
            dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
            form-textarea
            focus:border-purple-400
            focus:outline-none
            focus:shadow-outline-purple
            dark:focus:shadow-outline-gray
          "
          v-model="task.description"
          rows="6"
          placeholder="Enter some long form content."
          v-if="isEditing"
        ></textarea>
      </div>

      <div class="flex space-x-4">
        <button
          @click="markHasDone(task)"
          class="focus:outline-none focus:shadow-outline-green px-2 py-1"
          v-if="task.done == false"
        >
          <font-awesome-icon
            icon="fa-solid fa-check"
            class="w-5 h-5 text-green-500"
          />
        </button>
        <button
          @click="markHasNotDone(task)"
          class="focus:outline-none focus:shadow-outline-green px-2 py-1"
          v-if="task.done == true"
        >
          <font-awesome-icon
            icon="fa-solid fa-xmark"
            class="w-5 h-5 text-red-500"
          />
        </button>
        <button
          @click="showModal('assign-modal')"
          class="focus:outline-none focus:shadow-outline-purple px-2 py-1"
        >
          <font-awesome-icon
            icon="fa-regular fa-user"
            class="w-5 h-5 text-purple-500"
          />
        </button>
        <button
          @click="deleteTask(task)"
          class="focus:outline-none focus:shadow-outline-red px-2 py-1"
        >
          <font-awesome-icon
            icon="fa-regular fa-trash-can"
            class="w-5 h-5 text-red-500"
          />
        </button>
      </div>
    </div>
    <transition  name="fade" appear>
      <assign-modal
        v-show="isModalVisible == 'assign-modal'"
        @close="closeModal"
        @clicked="reAssignTask"
      >
        <template v-slot:header> Assign Task </template>
        <template v-slot:body>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3 mb-3">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Assign </span>
                <select
                  class="
                    block
                    w-full
                    mt-1
                    text-sm
                    dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                    form-select
                    focus:border-purple-400
                    focus:outline-none
                    focus:shadow-outline-purple
                    dark:focus:shadow-outline-gray
                  "
                  v-model="currentlyAssignedToId"
                  @change="changedAssignedTo"
                >
                  <option value="">----Select----</option>
                  <option
                    v-for="item in agents"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.first_name }} {{ item.last_name }}
                  </option>
                </select>
              </label>
            </div>
          </div>
        </template>
      </assign-modal>
    </transition>
  </div>
</template>

<script>
import { formatDate } from "../../utilities/helpers";
import Loading from "../Loading.vue";
import Modal from "../Modal.vue";
export default {
  components: {
    Loading,
    "assign-modal": Modal,
  },
  props: ["task", "loggedInUser", "agents"],
  data() {
    return {
      readMore: {},
      isShelfOpen: false,
      isEditing: false,
      maxChars: 100,
      isModalVisible: false,
      currentlyAssignedTo: null,
      currentlyAssignedToId: null,
    };
  },
  mounted() {
    this.currentlyAssignedTo = this.task.assigned_to;
    this.currentlyAssignedToId = this.currentlyAssignedToId;
  },
  computed: {
    fullName() {
      return (
        this.task.created_by.first_name + " " + this.task.created_by.last_name
      );
    },
  },
  methods: {
    showMore(taskId) {
      this.$set(this.readMore, taskId, true);
    },
    showLess(taskId) {
      this.$set(this.readMore, taskId, false);
    },
    formattedString(text) {
      if (text) {
        return text.substring(0, this.maxChars) + "...";
      }
      return "No Description";
    },
    markHasDone(task) {
      // this.isEditing = false;
      task.done = true;
      this.$emit("taskIsDone", task);
    },
    markHasNotDone(task) {
      task.done = false;
      this.$emit("taskIsNotDone", task);
    },
    assignTask() {
      this.showModal("assign-modal");
    },
    reAssignTask() {
      this.task.assigned_to = this.currentlyAssignedTo;
      this.$emit("taskAssigned", this.task);
      this.closeModal();
    },
    deleteTask(task) {
      this.$emit("taskDeleted", task);
    },
    editTask(task) {
      if (task && task.title.length > 0) {
        if (!this.isEditing) {
          this.isEditing = !this.isEditing;
        } else {
          this.isEditing = !this.isEditing;
          this.$emit("taskEdited", task);
        }
      } else {
        notify({
          text: "Task title is required",
          theme: "red",
          hideAfter: 3000,
        });
      }
    },
    createdAt(date) {
      return formatDate(date);
    },
    dueAt(date) {
      return formatDate(date);
    },
    changedAssignedTo() {
      this.currentlyAssignedTo = this.agents.find(
        (element) => this.currentlyAssignedToId == element.id
      );
      // this.task.assigned_to = this.currentlyAssignedTo;
    },
    showModal(modal) {
      this.currentlyAssignedTo = this.task.assigned_to;
      this.currentlyAssignedToId = this.currentlyAssignedTo.id;
      this.isModalVisible = modal;
    },
    closeModal() {
      this.isModalVisible = false;
    },
    closeCard(){
      this.isEditing = false;
    }
  },
};
</script>

<style>
.strike-diagonal {
  position: relative;
  background-color: grey;
  color: white;
}
.strike-diagonal:before {
  position: absolute;
  content: "";
  left: 0;
  top: 45%;
  right: 0;
  border-top: 2px solid;
  border-color: red;
  /* -webkit-transform: rotate(-25deg);
  -moz-transform: rotate(-25deg);
  -ms-transform: rotate(-25deg);
  -o-transform: rotate(-25deg); */
  transform: rotate(-25deg);
}
</style>