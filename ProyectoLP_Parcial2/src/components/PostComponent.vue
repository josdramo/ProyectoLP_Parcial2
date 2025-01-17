<template>
  <div>
    <!-- Componente de cabecera -->
    <header-component />

    <h1>Creación de publicaciones</h1>
    <p>Esta página permitirá crear y gestionar publicaciones de juegos.</p>

    <!-- Formulario para crear publicaciones -->
    <div class="post-form">
      <textarea
        v-model="newPost.content"
        placeholder="Escribe tu publicación..."
      ></textarea>
      <input
        type="text"
        v-model="newPost.image_url"
        placeholder="URL de la imagen (opcional)"
      />
      <button @click="createPost">Publicar</button>
    </div>

    <!-- Visualización de publicaciones -->
    <div class="posts-feed">
      <div v-for="post in posts" :key="post.id" class="post">
        <p>{{ post.content }}</p>
        <img v-if="post.image_url" :src="post.image_url" alt="Post Image" />
        <p><small>{{ post.created_at }}</small></p>
      </div>
    </div>

    <!-- Componente de pie de página -->
    <footer-component />
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';

export default {
  components: {
    HeaderComponent,
    FooterComponent,
  },
  data() {
    return {
      newPost: {
        content: '',
        image_url: '',
      },
      posts: [],
    };
  },
  methods: {
    // Método para crear una publicación
    createPost() {
      axios
        .post('http://localhost:8000/api/posts', this.newPost)
        .then((response) => {
          this.posts.unshift(response.data); // Añadir al inicio del feed
          this.newPost.content = ''; // Limpiar el campo de contenido
          this.newPost.image_url = ''; // Limpiar el campo de imagen
        })
        .catch((error) => {
          console.error('Error creando publicación:', error);
        });
    },

    // Método para obtener las publicaciones existentes
    fetchPosts() {
      axios
        .get('http://localhost:8000/api/posts')
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          console.error('Error obteniendo publicaciones:', error);
        });
    },
  },
  created() {
    this.fetchPosts(); // Cargar las publicaciones al inicio
  },
};
</script>

<style scoped>
/* Estilos para el componente */
.post-form {
  margin-bottom: 20px;
}

.post-form textarea,
.post-form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.post-form button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.post-form button:hover {
  background-color: #0056b3;
}

.posts-feed {
  margin-top: 20px;
}

.post {
  border-bottom: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 15px;
}

.post img {
  width: 150px;
  height: 150px;
  object-fit: cover;
}
</style>
