<template>
    <div>
      <h1>Organizador de eventos</h1>
      <!-- Aquí puedes incluir componentes base, como el header -->
      <HeaderComponent />
      <p>Esta página permitirá crear y gestionar eventos de juegos.</p>
      <!-- Agrega aquí el formulario y la lógica para eventos -->
    </div>
  </template>
  
  <script>
  import HeaderComponent from "./HeaderComponent.vue";
 
  
  export default {
    components: {
        HeaderComponent

    },
  };
  </script>
  
  <style>
  /* Estilos para esta vista */
  </style>