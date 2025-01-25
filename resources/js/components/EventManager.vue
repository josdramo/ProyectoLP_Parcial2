<template>
    <div>
      <!-- Aquí puedes incluir componentes base, como el header -->
      <HeaderComponent />
      <div class="container py-5">
    <h2 class="text-center mb-4">Gestión de Eventos</h2>
    <form @submit.prevent="createEvent">
      <div class="mb-3">
        <label for="name" class="form-label">Nombre del Evento</label>
        <input
          type="text"
          id="name"
          v-model="event.name"
          class="form-control"
          placeholder="Ingresa el nombre del evento"
          required
        />
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea
          id="description"
          v-model="event.description"
          class="form-control"
          placeholder="Describe el evento"
          required
        ></textarea>
      </div>
      <div class="mb-3">
        <label for="start_time" class="form-label">Fecha y Hora de Inicio</label>
        <input
          type="datetime-local"
          id="start_time"
          v-model="event.start_time"
          class="form-control"
          required
        />
      </div>
      <div class="mb-3">
        <label for="end_time" class="form-label">Fecha y Hora de Fin</label>
        <input
          type="datetime-local"
          id="end_time"
          v-model="event.end_time"
          class="form-control"
          required
        />
      </div>
      <button type="submit" class="btn btn-primary w-100">Crear Evento</button>
    </form>

    <hr class="my-4" />

    <h3 class="mt-4">Lista de Eventos</h3>
    <div v-if="events.length === 0" class="text-center text-muted">
      No hay eventos disponibles.
    </div>
    <ul class="list-group">
      <li
        v-for="event in events"
        :key="event.id"
        class="list-group-item d-flex justify-content-between align-items-center"
      >
        <div>
          <h5>{{ event.name }}</h5>
          <p class="mb-1">{{ event.description }}</p>
          <small>Inicio: {{ event.start_time }}</small> | 
          <small>Fin: {{ event.end_time }}</small>
        </div>
        <button
          class="btn btn-success btn-sm"
          @click="joinEvent(event.id)"
        >
          Unirse
        </button>
      </li>
    </ul>
  </div>
      <FooterComponent/>
    </div>
  </template>
  
  <script>
  import HeaderComponent from "./HeaderComponent.vue";
  import FooterComponent from "./FooterComponent.vue";
  import axios from 'axios';
  
  export default {
    components: {
        HeaderComponent,
        FooterComponent

    },
    data() {
    return {
      event: {
        name: "",
        description: "",
        start_time: "",
        end_time: "",
      },
      events: [],
    };
  },
  methods: {
    async fetchEvents() {
      try {
        const { data } = await axios.get("/api/events", {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        });
        this.events = data;
      } catch (error) {
        console.error("Error al obtener los eventos:", error);
      }
    },
    async createEvent() {
    try {
        const token = localStorage.getItem('token'); // Recupera el token almacenado
        const response = await axios.post('/api/events', this.event, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });
        console.log('Evento creado:', response.data);
        alert('Evento creado con éxito.');
    } catch (error) {
        console.error('Error al crear el evento:', error.response?.data || error.message);
        alert('No se pudo crear el evento. Revisa los datos e inténtalo de nuevo.');
    }
    },
    async joinEvent(eventId) {
      try {
        await axios.post(`/api/events/${eventId}/join`, {}, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        });
        alert("Te has unido al evento");
      } catch (error) {
        console.error("Error al unirse al evento:", error);
      }
    },
  },
  async created() {
    this.fetchEvents();
  },
};
</script>

<style>
.container {
  max-width: 600px;
}
</style>