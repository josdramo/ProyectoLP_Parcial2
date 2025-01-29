import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from "./components/HomeComponent.vue"; // Nueva vista principal
import EventManager from "./components/EventManager.vue"; // Vista para gestionar eventos
import ProfileComponent from "./components/ProfileComponent.vue";
import PostComponent from "./components/PostComponent.vue";
import EventDetails from './components/EventDetails.vue';
import Register from "./components/Register.vue";
import Login from "./components/Login.vue";
import LogoutComponent from "./components/LogoutComponent.vue";

const routes = [
  {
    path: "/logout",
    name: "Logout",
    component: LogoutComponent,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
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
  { path: '/events/:id', 
    name: 'EventDetails', 
    component: EventDetails 
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