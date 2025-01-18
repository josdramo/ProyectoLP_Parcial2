<template>
  <div class="profile-container">
    <HeaderComponent />

    <div class="profile-card">
      <img :src="profile.avatar || defaultAvatar" alt="Avatar" class="profile-avatar" />
      <h2>{{ profile.username }}</h2>
      <p>{{ profile.bio }}</p>

      <div class="stats">
        <p><strong>Publicaciones:</strong> {{ profile.posts_count }}</p>
        <p><strong>Eventos Participados:</strong> {{ profile.events_joined }}</p>
        <p><strong>Logros:</strong> {{ profile.achievements }}</p>
      </div>

      <button v-if="isOwnProfile" @click="editing = !editing">Editar Perfil</button>

      <div v-if="editing" class="edit-form">
        <input v-model="profile.username" placeholder="Nombre de usuario" />
        <input v-model="profile.bio" placeholder="Biografía" />
        <input type="file" @change="uploadAvatar" />
        <button @click="updateProfile">Guardar</button>
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
    FooterComponent,
  },
  data() {
    return {
      profile: {
        username: "",
        avatar: "",
        bio: "",
        posts_count: 0,
        events_joined: 0,
        achievements: 0,
      },
      editing: false,
      isOwnProfile: false,
      defaultAvatar: "/default-avatar.png", //imagen por defecto q podira ser un avatar
    };
  },
  mounted() {
    this.loadProfile();
  },
  methods: {
    async loadProfile() {
      try {
        const userId = this.$route.params.id; //suponiendo que la URL tiene /profile/:id
        const response = await axios.get(`/api/profile/${userId}`);
        this.profile = response.data;

        const loggedUser = JSON.parse(localStorage.getItem("user"));
        this.isOwnProfile = loggedUser && loggedUser.id === response.data.user_id;
      } catch (error) {
        console.error("Error al cargar el perfil", error);
      }
    },
    async updateProfile() {
      try {
        const token = localStorage.getItem("token");
        await axios.post(
          "/api/profile/update",
          {
            username: this.profile.username,
            bio: this.profile.bio,
            avatar: this.profile.avatar,
          },
          {
            headers: { Authorization: `Bearer ${token}` },
          }
        );
        this.editing = false;
        this.loadProfile();
      } catch (error) {
        console.error("Error al actualizar el perfil", error);
      }
    },
    uploadAvatar(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = () => {
        this.profile.avatar = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
};
</script>

<style>
.profile-container {
  max-width: 600px;
  margin: auto;
  text-align: center;
}
.profile-card {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.profile-avatar {
  width: 100px;
  height: 100px;
  border-radius: 50%;
}
.edit-form input {
  display: block;
  width: 100%;
  margin: 5px 0;
  padding: 8px;
}
</style>
