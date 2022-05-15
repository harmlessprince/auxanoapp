require("./bootstrap");

// import Alpine from "alpinejs";
import swal from "sweetalert";
import Notifications from "@voerro/vue-notifications";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import specific icons */
import { faCheck, faUserSecret, faXmark, faArrowRight, faArrowLeft, faEdit, faTrash } from '@fortawesome/free-solid-svg-icons'
import { faFloppyDisk, faPenToSquare, faTrashCan, faUser } from "@fortawesome/free-regular-svg-icons";
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* add icons to the library */
library.add(faUserSecret, faCheck, faXmark, faArrowRight, faArrowLeft, faPenToSquare, faUser, faTrashCan, faFloppyDisk,faXmark, faEdit, faTrash)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)


window.swal = swal;

import Vue from "vue";

Vue.component(
    "ticket-component",
    require("./components/TicketComponent.vue").default
);

Vue.component(
    "category-component",
    require("./components/CategoryComponent.vue").default
);
// https://vuejsexamples.com/easily-display-notifications-to-your-users-built-with-vue/
Vue.component("notifications", Notifications);

Vue.component(
    "tab-component",
    require("./components/StatTab/MainTabComponent.vue").default
);

// const a =require("./components/Tasks.vue");
// console.log('d;;d;d')
Vue.component("tasks", require("./components/Tasks.vue").default);
// window.Alpine = Alpine;

// Alpine.start();

// console.log(this.$auth_user);

const app = new Vue({
    el: "#app",
});
