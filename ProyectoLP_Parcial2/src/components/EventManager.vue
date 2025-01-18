<template>
  <div>
    <h1>Event Manager</h1>
    <form @submit.prevent="createEvent">
      <input v-model="newEvent.name" placeholder="Event Name" required />
      <textarea v-model="newEvent.description" placeholder="Event Description"></textarea>
      <input v-model="newEvent.date" type="date" required />
      <button type="submit">Create Event</button>
    </form>

    <h2>All Events</h2>
    <ul>
      <li v-for="event in events" :key="event.id">
        <strong>{{ event.name }}</strong> - {{ event.date }}
        <p>{{ event.description }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      newEvent: {
        name: "",
        description: "",
        date: "",
      },
      events: [],
    };
  },
  methods: {
    async fetchEvents() {
      try {
        const response = await axios.get("http://localhost:8000/api/events");
        this.events = response.data;
      } catch (error) {
        console.error("Error fetching events:", error);
      }
    },
    async createEvent() {
      try {
        await axios.post("http://localhost:8000/api/events", this.newEvent);
        this.newEvent = { name: "", description: "", date: "" };
        this.fetchEvents(); // Refresh the list of events
      } catch (error) {
        console.error("Error creating event:", error);
      }
    },
  },
  created() {
    this.fetchEvents();
  },
};
</script>

<style>
/* Opcional: agrega tus estilos aquí */
</style>