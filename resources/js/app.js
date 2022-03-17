require("./bootstrap");

// import Alpine from "alpinejs";
import swal from "sweetalert";

window.swal = swal;

import Vue from "vue"

Vue.component("ticket-component", require("./components/TicketComponent.vue").default);

// window.Alpine = Alpine;

// Alpine.start();

const app = new Vue({
    el: "#app",
});
