require("./bootstrap");

// import Alpine from "alpinejs";
import swal from "sweetalert";
import Notifications from '@voerro/vue-notifications'

window.swal = swal;

import Vue from "vue"

Vue.component("ticket-component", require("./components/TicketComponent.vue").default);
// https://vuejsexamples.com/easily-display-notifications-to-your-users-built-with-vue/
Vue.component('notifications', Notifications);

// window.Alpine = Alpine;

// Alpine.start();

const app = new Vue({
    el: "#app",
});
