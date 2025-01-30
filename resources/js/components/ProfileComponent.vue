<template>
  <HeaderComponent />
  <div class="container py-5">
    <!-- Sección del Perfil -->
    <div class="shadow p-3 mb-5 rounded text-center" style="background-color: #e2f1ff;">
      <img :src="profile.avatar" alt="Avatar" class="w-24 h-24 object-cover rounded-full border-4 border-white mx-auto mb-3" style="max-width: 96px; max-height: 96px; min-width: 96px; min-height: 96px;" />
      <h2 class="text-xl font-bold text-blue-900">{{ profile.username }}</h2>
      
      <p class="text-gray-600 text-sm mt-2">{{ profile.bio }}</p>
      <button @click="showEditModal = true" class="mt-3 bg-black text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800">
        Modificar Perfil
      </button>
    </div>

    <!-- Modal flotante para editar perfil -->
    <div v-if="showEditModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
      <div class="bg-white p-6 rounded-2xl shadow-xl w-96 relative transform transition-all scale-95 hover:scale-100 text-center">
        


        <h3 class="text-xl font-semibold mb-4 text-center text-blue-800">Editar Perfil</h3>

        <div class="mb-4">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre de usuario:</label><br>
          <input v-model="editProfile.username" 
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
            type="text" />
        </div>

        <div class="mb-4">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Biografía:  </label>
          <br>
          <textarea v-model="editProfile.bio" 
            class="w-full border rounded-lg px-4 py-2 resize-none h-24 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"></textarea>
        </div>

        <div class="mb-4">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Avatar URL:</label><br>
          <input v-model="editProfile.avatar" 
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
            type="text" />
        </div>


        <!-- Botones -->
        <div class="flex justify-end space-x-3">
          <button @click="showEditModal = false" 
            class="bg-gray-500 mr-4 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition " style="background-color: black; margin-right: 20pt; padding-bottom: 20px;">
            Cancelar
          </button>
          <button @click="updateProfile" 
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-800 transition" style="background-color: black; padding-left: 20pt;">
            Guardar
          </button>
        </div>
      </div>
    </div>

     <!-- Sección de Logros -->
    <div class="shadow p-3 mb-5 rounded text-center" style="background-color: #e2f1ff; margin-top: 20px;">
      <h3 class="text-lg font-bold text-gray-800 text-center">Logros</h3>

      <div v-if="profile.achievements.length === 0" class="text-gray-600">
        <p class="text-sm italic">Sin logros</p>
      </div>

      <div v-else class="flex justify-center space-x-4 bg-gray-200 p-4 rounded-lg">
        <div v-for="(badge, index) in profile.achievements" :key="index" class="text-center">
          <img :src="getAchievementImage(badge)" alt="Logro" class="w-16 h-16 mx-auto" style="max-width: 150px; max-height: 150px; min-width: 150px; min-height: 150px;"/>
          <p class="text-sm text-gray-700">{{ badge }}</p>
        </div>
      </div>
    </div>


    <!-- Sección de Estadísticas -->
    <div class="mt-5 shadow p-3 mb-5 rounded text-center bg-gray-100">
      <h3 class="text-lg font-bold text-gray-800 text-center">Estadísticas</h3>
      <div class="grid grid-cols-2 gap-4 p-4">
        <div class="p-4 bg-white shadow-md rounded-lg">
          <h4 class="text-sm font-semibold text-gray-700">Publicaciones</h4>
          <p class="text-xl font-bold text-blue-600">{{ profile.posts_count }}</p>
        </div>
        <div class="p-4 bg-white shadow-md rounded-lg">
          <h4 class="text-sm font-semibold text-gray-700">Eventos Asistidos</h4>
          <p class="text-xl font-bold text-blue-600">{{ profile.events_joined }}</p>
        </div>
      </div>
    </div>

    <FooterComponent />
  </div>
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
      showEditModal: false,
      defaultAvatar: "/images/profileDefault.png",
      profile: {
        username: "Usuario",
        avatar: "/images/profileDefault.png",
        bio: "Bio del usuario",
        achievements: 0,
      },
      editProfile: {
        username: "",
        bio: "",
        avatar: "",
        achievements: 0,
      }
    };
  },
  async mounted() {
    try {
      const token = localStorage.getItem("auth_token");
      if (!token) {
        console.error("No hay token de autenticación.");
        return;
      }

      const response = await axios.get(`/api/profile`, {
        headers: { Authorization: `Bearer ${token}` }
      });

      this.profile = response.data;
      if(!this.profile.avatar) {
        this.profile.avatar = this.defaultAvatar;
      }
      this.editProfile = { ...response.data };

      if(!Array.isArray(this.editProfile.achievements)) {
        this.editProfile.achievements = [];
      }
    } catch (error) {
      console.error("Error al cargar el perfil", error);
      console.log("Error al cargar el perfil", error.response?.data || error);
    }
  },
  methods: {
      async updateProfile() {
        try {
          const token = localStorage.getItem("auth_token");
          if(typeof this.editProfile.achievements === "string") {
            this.editProfile.achievements = this.editProfile.achievements.split(",").map(a=>a.trim());
          }
          const response = await axios.put(`/api/profile/update`, this.editProfile, {
            headers: {
              Authorization: `Bearer ${token}`,
              "Content-Type": "application/json"
            }
          });

          this.profile = response.data.profile;
          this.showEditModal = false;
          alert("Perfil actualizado con éxito.");
        } catch (error) {
          console.error("Error al actualizar perfil:", error.response?.data || error);
        }
      },
      getAchievementImage(badge) {
        const achievementImages = {
          "Primer Post": "/images/primerPost.png",
          "Evento Completado": "/images/evento.png",
          "Maestro de Posts": "/images/maestro.png"
        };
        return achievementImages[badge] || "/images/primerPost.png";
      }
  }
};
</script>

<style scoped>
/* Efecto de transición para el modal */
.fixed {
  animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
