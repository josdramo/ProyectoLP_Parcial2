<template>
    <div>
      <!-- Aquí puedes incluir componentes base, como el header -->
      <HeaderComponent />
      <div>
        <h1>Organizador de eventos</h1>
        <form @submit.prevent="createEvent">
            <input v-model="event.name" type="text" placeholder="Nombre del evento" required />
            <textarea v-model="event.description" placeholder="Descripción"></textarea>
            <input v-model="event.start_time" type="datetime-local" required />
            <input v-model="event.end_time" type="datetime-local" required />
            <button type="submit">Crear Evento</button>
        </form>

        <h2>Eventos Disponibles</h2>
        <ul>
            <li v-for="e in events" :key="e.id">
                {{ e.name }} - <button @click="joinEvent(e.id)">Unirse</button>
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
            events: [],
            event: {
                name: '',
                description: '',
                start_time: '',
                end_time: '',
            },
        };
    },
    methods: {
        async fetchEvents() {
            const { data } = await axios.get('/api/events');
            this.events = data;
        },
        async createEvent() {
            await axios.post('/api/events', this.event);
            alert('Evento creado con éxito');
            this.fetchEvents();
        },
        async joinEvent(id) {
            await axios.post(`/api/events/${id}/join`);
            alert('Te has unido al evento');
        },
    },
    mounted() {
        this.fetchEvents();
    },
  };
  </script>
  
  <style>
  /* Estilos para esta vista */
  </style>