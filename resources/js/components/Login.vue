<template>
    <HeaderComponent />
    <div class="container py-5">
      <h2 class="text-center mb-4">Iniciar Sesión</h2>
      <form @submit.prevent="login">
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input
            type="email"
            id="email"
            v-model="credentials.email"
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
            v-model="credentials.password"
            class="form-control"
            placeholder="Ingresa tu contraseña"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
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
        credentials: {
          email: "",
          password: "",
        },
      };
    },
    methods: {
      async login() {
        try {
          const { data } = await axios.post("/api/login", this.credentials);
          localStorage.setItem("token", data.access_token);
          alert("Inicio de sesión exitoso.");
          this.$router.push("/events");
        } catch (error) {
          console.error("Error al iniciar sesión:", error);
        }
      },
    },
  };
  </script>
  