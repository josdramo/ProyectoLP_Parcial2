<template>
  <HeaderComponent />
  <div class="container py-5">
    <!-- Seccion del Perfil -->
    <div class="shadow p-3 mb-5 rounded text-center" style="background-color: #e2f1ff;">
      <img :src="require('/profileDefault.png')" alt="Avatar" class="w-24 h-24 rounded-full border-4 border-white mx-auto mb-3" />
      <h2 class="text-xl font-bold text-blue-900">{{ profile.username }}</h2>
      <p class="text-gray-700 flex justify-center items-center">
        <span class="text-lg font-semibold">Nivel {{ profile.level }}</span>
        <span class="ml-2">{{ profile.location }}</span>
      </p>
      <p class="text-gray-600 text-sm mt-2">{{ profile.bio }}</p>
      <button class="mt-3 bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600"
      style="background-color: black;">
        Modificar Perfil
      </button>
    </div>

    <!-- Seccin de Logros -->
    <div class="shadow p-3 mb-5 rounded text-center" style="background-color: #e2f1ff;">
      <h3 class="text-lg font-bold text-gray-800 text-center">Logros</h3>
      <div class="flex justify-center space-x-4 bg-gray-200 p-4 rounded-lg">
        <div v-for="(badge, index) in profile.achievements" :key="index" class="text-center">
          <img :src="badge.image" alt="Logro" class="w-16 h-16 mx-auto" />
          <p class="text-sm text-gray-700">{{ badge.name }}</p>
        </div>
      </div>
    </div>

    <!-- Seccion de Estadisticas -->
    <div class="mt-5">
      <h3 class="text-lg font-bold text-gray-800 text-center">Estadísticas</h3>
      <div class="bg-blue-200 p-4 rounded-lg flex justify-center">
        <img :src="profile.statsImage || defaultStatsImage" alt="Estadísticas" class="w-full max-w-md" />
      </div>
    </div>
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
      defaultAvatar: "../../../public/descarga.png", // Imagen por defecto para avatar
      defaultStatsImage: "../../../public/images/profileDefault.png", // Imagen por defecto para estadísticas
      profile: {
        username: "Usuario",
        avatar: "", // Si está vacío, se usará `defaultAvatar`
        level: 0,
        location: "codPais Ciuduad, Pais",
        bio: "Bio del usuario",
        achievements: [
          { name: "Logro1", image: "https://example.com/badge1.png" },
          { name: "Logro2", image: "https://example.com/badge2.png" },
          { name: "Logro3", image: "https://example.com/badge3.png" }
        ],
        statsImage: "" // Si está vacío, se usará `defaultStatsImage`
      }
    };
  },
  async mounted() {
    try {
      const response = await axios.get(`/api/profile/1`);
      this.profile = response.data;

      // Si el avatar está vacío, usa la imagen por defecto
      if (!this.profile.avatar) {
        this.profile.avatar = this.defaultAvatar;
      }

      // Si la imagen de estadísticas está vacía, usa la imagen por defecto
      if (!this.profile.statsImage) {
        this.profile.statsImage = this.defaultStatsImage;
      }
    } catch (error) {
      console.error("Error al cargar el perfil", error);
    }
  }
};
</script>

<style scoped>
button {
  transition: all 0.2s ease-in-out;
}
</style>
