<template>
    <div>
      <!-- Aquí puedes incluir componentes base, como el header -->
      <HeaderComponent />
      <h1>Organizador de eventos</h1>
      <p>Esta página permitirá crear y gestionar eventos de juegos.</p>
      <!-- Agrega aquí el formulario y la lógica para eventos -->
      <FooterComponent/>
    </div>
  </template>
  
  <script>
  import HeaderComponent from "./HeaderComponent.vue";
  import FooterComponent from "./FooterComponent.vue";
  
  export default {
    components: {
        HeaderComponent,
        FooterComponent

    },
  };
  </script>
  
  <style>
  /* Estilos para esta vista */
  </style>