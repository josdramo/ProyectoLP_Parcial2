<template>
  <HeaderComponent />

  <div class="logout-message">
    <h2>Hasta pronto, {{ userName }}!</h2>
    <p>Gracias por utilizar SocialGaming. ¡Vuelve pronto!</p>
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
      userName: "Usuario",
    };
  },
  async mounted() {
    console.log("LogoutComponent montado");

    await this.getUserData(); // Obtener datos del usuario
    await this.logout(); // Luego, cerrar sesión
  },
  methods: {
    async getUserData() {
      const token = localStorage.getItem("auth_token");

      if (!token) {
        console.warn("⚠ No hay token en localStorage.");
        return;
      }

      try {
        console.log("🔹 Obteniendo datos del usuario...");
        const response = await axios.get("/api/profile", {
          headers: { Authorization: `Bearer ${token}` },
        });

        this.userName = response.data.username || "Usuario";
        console.log("✅ Nombre de usuario obtenido:", this.userName);
      } catch (error) {
        console.error("❌ Error obteniendo datos del usuario", error);
      }
    },

    async logout() {
          console.log("🚀 Ejecutando logout()...");

          const token = localStorage.getItem("auth_token");
          if (!token) {
              console.warn("⚠ No hay token en localStorage.");
              return;
          }

          console.log("🔹 Token antes de eliminar:", token);

          try {
              await axios.post("/api/logout", {}, {
                  headers: { Authorization: `Bearer ${token}` },
              });

              console.log("✅ Logout exitoso. Eliminando token...");

              // Eliminar token de localStorage
              localStorage.removeItem("auth_token");

              // Verificar si el token fue eliminado
              setTimeout(() => {
                  console.log("🔍 Token después de eliminar:", localStorage.getItem("auth_token"));
              }, 1000);

              // Redirigir al usuario después de la desconexión
              setTimeout(() => {
                  this.$router.push("/");
              }, 5000);

          } catch (error) {
              console.error("❌ Error en logout:", error);
          }
      }
  }
};
</script>

<style scoped>
.logout-message {
  text-align: center;
  background-color: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  margin: 20px auto;
  width: 50%;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  animation: fadeIn 0.5s ease-in-out;
}

.logout-message h2 {
  color: #dc3545;
  font-size: 24px;
}

.logout-message p {
  color: #555;
  font-size: 18px;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
