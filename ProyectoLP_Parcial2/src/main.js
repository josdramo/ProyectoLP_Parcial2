import { createApp } from 'vue'
import App from './App.vue'
import router from './router'; // Importa el archivo de rutas
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/css/main.css';


createApp(App)
  .use(router)
  .mount('#app');
