<template>
  <div id="app">
    <!-- Renderiza solo el contenido dinámico de las rutas -->
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style>
/* Estilos globales opcionales */
</style>