<template>
  <div id="app">
    <h1>Vue está funcionando</h1>
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