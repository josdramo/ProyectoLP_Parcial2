import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from "./components/HomeComponent.vue"; // Nueva vista principal
import EventManager from "./components/EventManager.vue"; // Vista para gestionar eventos
import ProfileComponent from "./components/ProfileComponent.vue";
import PostComponent from "./components/PostComponent.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomeComponent, // Ruta principal
  },
  {
    path: "/events",
    name: "EventManager",
    component: EventManager, // Ruta para organizar eventos
  },
  {
    path: '/profile',
    name: "Profile",
    component: ProfileComponent,
  },
  {
    path: '/post',
    name: "Post",
    component: PostComponent,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;