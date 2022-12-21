import { createWebHistory, createRouter } from "vue-router";
import Calendar from "../views/Calendar/index.vue";


const routes = [
    {
      path: "/",
      name: "Calendar",
      component: Calendar,
    },
  ];
  
  const router = createRouter({
    history: createWebHistory(),
    routes,
  });