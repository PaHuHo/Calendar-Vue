import { createApp } from "vue";
import App from "./App.vue";
// import Vuex from 'vuex'
// import "./assets/main.css";
import VueAxios from "vue-axios";
import axios from "axios";

// import CoreuiVue from '@coreui/vue'
// import router from './router/router'

// import '@coreui/coreui/dist/css/coreui.min.css'
// import 'bootstrap/dist/css/bootstrap.min.css'
import Calendar from "./views/Calendar/index.vue";

// import VCalendar from 'v-calendar';
// import 'v-calendar/dist/style.css';

import { createWebHistory, createRouter } from "vue-router";
const routes = [
  {
    path: "/",
    name: "calendar",
    component: Calendar,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// import store from "./views/Calendar/store";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
const app = createApp(App);
app.use(router);
app.use(Toast);
// app.use(CoreuiVue)
// app.use(Vuex)
// app.use(store)
// app.use(VCalendar, {})
app.use(VueAxios, axios);
app.mount("#app");
