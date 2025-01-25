import { createApp } from 'vue';

// Importar un componente de ejemplo
import ExampleComponent from './components/ExampleComponent.vue';

// Crear la aplicación Vue
const app = createApp({});

// Registrar el componente globalmente
app.component('example-component', ExampleComponent);

// Montar la aplicación en el contenedor con ID "app"
app.mount('#app');