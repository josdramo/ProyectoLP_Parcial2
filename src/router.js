import { createRouter, createWebHistory } from 'vue-router';
import Home from './App.vue'; // Tu componente base
import EventManager from './components/EventManager.vue'; // Componente para organizar eventos

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home, // Ruta principal
  },
  {
    path: '/events',
    name: 'EventManager',
    component: EventManager, // Ruta para organizar eventos
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;