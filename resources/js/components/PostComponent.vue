<template>
  <div>
    <!-- Header -->
    <HeaderComponent />
    
    <!-- Título principal -->
    <div class="container">
      <h1 class="text-center mt-4">Publicaciones</h1>
      <p class="text-center">
        Comparte tus experiencias, ideas y contenido relacionado con videojuegos.
      </p>

      <!-- Formulario para crear publicaciones -->
      <div class="card mt-4 p-4">
        <h2>Crear una nueva publicación</h2>
        <form @submit.prevent="createPost" class="post-form">
          <div class="mb-3">
            <textarea
              v-model="newPost.content"
              class="form-control"
              placeholder="Escribe algo..."
              rows="3"
              required
            ></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Subir imagen (opcional)</label>
            <input
              type="file"
              id="image"
              class="form-control"
              @change="handleImage"
            />
          </div>
          <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
      </div>

      <!-- Lista de publicaciones -->
      <div class="mt-5">
        <h2>Feed de publicaciones</h2>
        <div v-if="posts.length" class="post-feed">
          <div
            v-for="post in posts"
            :key="post.id"
            class="card mt-3 p-3 shadow-sm"
          >
          <h5>{{ post.user ? post.user.name : 'Usuario desconocido' }}</h5>
            <p>{{ post.content }}</p>
            <img
              v-if="post.image"
              :src="post.image"
              alt="Imagen de publicación"
              class="img-fluid mt-2"
            />
            <small class="text-muted">Publicado: {{ formatDate(post.created_at) }}</small>
          </div>
        </div>
        <p v-else class="text-muted text-center mt-4">
          No hay publicaciones disponibles.
        </p>
      </div>
    </div>

    <!-- Footer -->
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
      posts: [], 
      newPost: {
        content: "",
      },
      image: null, 
    };
  },
  methods: {
    async fetchPosts() {
      try {
        const { data } = await axios.get("/api/posts");
        this.posts = data;
      } catch (error) {
        console.error("Error al obtener publicaciones:", error);
      }
    },
    // Crear una nueva publicación
    async createPost() {
    const formData = new FormData();
    formData.append('content', this.newPost.content);
    if (this.image) {
    formData.append('image', this.image);
    }

    try {
      const response = await axios.post('/api/posts', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });
      this.posts.push(response.data);  // Si la respuesta es correcta, actualizamos la lista de publicaciones
    } catch (error) {
      console.error('Error al crear publicación:', error);  // Captura cualquier error en la solicitud
    }
  },


    // Manejar archivo de imagen
    handleImage(event) {
      const file = event.target.files[0];
  const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
  if (file && validImageTypes.includes(file.type)) {
    this.image = file;
  } else {
    alert("Por favor, selecciona una imagen válida.");
    this.image = null; // Limpiar la selección si no es una imagen válida
  }
    },
    // Formatear fecha para mostrar en el feed
    formatDate(date) {
      return new Date(date).toLocaleString();
    },
  },
  mounted() {
    this.fetchPosts(); // Cargar publicaciones al montar el componente
  },
};
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: auto;
}

.card {
  border-radius: 10px;
}

textarea {
  resize: none;
}

.post-feed {
  margin-top: 20px;
}

.post-item {
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
  padding-bottom: 10px;
}

img {
  max-width: 100%;
  height: auto;
  margin-top: 10px;
}
</style>
