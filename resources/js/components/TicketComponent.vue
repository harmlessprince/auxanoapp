<template>
  <div>
    <loading v-show="loading" />
    <search-ticket-form
      :categories="categories"
      :statuses="statuses"
      :priorities="priorities"
      :agents="agents"
      @search="getTickets"
    />
    <!-- Container -->
    <div
      class="
        bg-white
        dark:divide-gray-700 dark:bg-gray-800
        mt-3
        p-3
        grid grid-cols-6
        gap-x-5
        sm:gap-x-2
        xl:gap-x-2
      "
      v-if="tickets.length > 0"
    >
      <!-- Table Container -->
      <ticket-list
        :tickets="tickets"
        @ticketSelected="getTicketSelected"
        :selectedTicket="currentTicket"
        :pagination="pagination"
        @nextPage="getTickets"
        @previousPage="getTickets"
      />
      <!-- Table Container End -->
      <!-- Details Container -->
      <ticket-detail
        :selectedTicket="currentTicket"
        :statuses="statuses"
        :priorities="priorities"
        :users="agents"
        :key="Math.random()"
        @statusUpdated="statusUpdated"
      />
    </div>
    <!-- Container End -->
    <empty-state v-show="showEmptyState"></empty-state>
  </div>
</template>

<script>
import { get } from "../utilities/apiService";
import SearchTicketForm from "./SearchTicketForm.vue";
import Divider from "./Divider.vue";
import EmptyState from "./EmptyState.vue";
import TicketList from "./TicketList.vue";
import Loading from "./Loading.vue";
import TicketDetail from "./TicketDetail.vue";

export default {
  components: {
    "search-ticket-form": SearchTicketForm,
    divider: Divider,
    "empty-state": EmptyState,
    Loading,
    TicketList,
    TicketDetail,
  },
  data() {
    return {
      tickets: [],
      statuses: [],
      categories: [],
      priorities: [],
      agents: [],
      loading: false,
      showEmptyState: false,
      currentTicket: null,
      pagination: {},
      animated: false,
    };
  },
  async beforeMount() {
    this.loading = true;
    await this.getStatus();
    await this.getPriority();
    await this.getCategory();
    await this.getAgents();
    await this.getTickets();
    this.loading = false;
    // console.log(screen.width + "px");
  },
  mounted() {},
  methods: {
    async getTickets(params = {}) {
      this.loading = true;
      let responseData = await get("/tickets", params)
        .then((response) => {
          return response.data;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
      this.tickets = responseData.data;
      this.pagination = {
        total: responseData.total,
        currentPage: responseData.current_page,
        lastPage: responseData.last_page,
        firstPageUrl: responseData.first_page_url,
        nextPageUrl: responseData.next_page_url,
        perPage: responseData.per_page,
        prevPageUrl: responseData.prev_page_url,
        to: responseData.to,
        from: responseData.from,
      };
      if (this.tickets.length < 1) {
        this.showEmptyState = true;
      } else {
        this.showEmptyState = false;
      }
      this.currentTicket = this.tickets[0];
      console.log(this.currentTicket);
      this.loading = false;
    },
    getTicketSelected(ticketSelected) {
      this.currentTicket = ticketSelected;
    },
    statusUpdated(updatedItem) {
      console.log(updatedItem.status.name);
      // const newState = this.tickets.map((ticket) =>{
      //   if (ticket.id == this.currentTicket.id) {
      //     console.log(ticket.status);
      //   }
      // })
    },
    async getStatus() {
      this.statuses = await get("/statuses")
        .then((response) => {
          return response.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async getPriority() {
      this.priorities = await get("/priorities").then((response) => {
        return response.data.data;
      });
    },
    async getCategory() {
      this.categories = await get("/categories").then((response) => {
        return response.data.data;
      });
    },
    async getAgents() {
      this.agents = await get("/agents").then((response) => {
        return response.data.data;
      });
    },
  },
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
  opacity: 1;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
.animate {
  /* opacity: 0; */
}
</style>