<template>
    <div>
      <!-- Aquí puedes incluir componentes base, como el header -->
      <HeaderComponent />
      <h1>Creación de perfiles</h1>
      <p>Realizar la personalizacion del perfil aqui</p>
      <!-- Agrega aquí el perfil y la lógica para la personalizacion del perfil -->
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