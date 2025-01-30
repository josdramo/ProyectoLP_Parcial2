import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// Importar estilos de Bootstrap
import '../css/bootstrap/dist/css/bootstrap.min.css';
import './bootstrap/dist/js/bootstrap.bundle.min.js';
import '../css/bootstrap/dist/css/main.css'
import './bootstrap/swiper/swiper-bundle.min.css'
import './bootstrap/swiper/swiper-bundle.min.js'
import './bootstrap-icons/bootstrap-icons.css'
import './bootstrap-icons/bootstrap-icons.min.css'

console.log('Iniciando Vue...');
const app = createApp(App);
console.log('Vue creado');
app.use(router);
console.log('Router configurado');
app.mount('#app');
console.log('Aplicación montada');
