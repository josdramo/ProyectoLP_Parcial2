<template>
    <HeaderComponent />
    <div class="container py-5">
      <h2 class="text-center mb-4">Registrarse</h2>
      <form @submit.prevent="register">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input
            type="text"
            id="name"
            v-model="user.name"
            class="form-control"
            placeholder="Ingresa tu nombre"
            required
          />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input
            type="email"
            id="email"
            v-model="user.email"
            class="form-control"
            placeholder="Ingresa tu correo electrónico"
            required
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input
            type="password"
            id="password"
            v-model="user.password"
            class="form-control"
            placeholder="Crea una contraseña"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
      </form>
    </div>
    <FooterComponent />
  </template>
  
  <script>
  import HeaderComponent from "./HeaderComponent.vue";
  import FooterComponent from "./FooterComponent.vue";
  import axios from "axios";
  
  export default {
    components: {
        HeaderComponent,
        FooterComponent

    },
    data() {
      return {
        user: {
          name: "",
          email: "",
          password: "",
        },
      };
    },
    methods: {
      async register() {
        try {
          await axios.post("/api/register", this.user);
          alert("Registro exitoso. Ahora inicia sesión.");
          this.$router.push("/login");
        } catch (error) {
          console.error("Error al registrarse:", error);
          console.log("Detalles del error:", error.response?.data);
        }
      },
    },
  };
  </script>
  