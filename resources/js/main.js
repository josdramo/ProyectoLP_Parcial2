import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// Importar estilos de Bootstrap
import '../css/bootstrap/dist/css/bootstrap.min.css';
import './bootstrap/dist/js/bootstrap.bundle.min.js';

console.log('Iniciando Vue...');
const app = createApp(App);
console.log('Vue creado');
app.use(router);
console.log('Router configurado');
app.mount('#app');
console.log('Aplicación montada');
