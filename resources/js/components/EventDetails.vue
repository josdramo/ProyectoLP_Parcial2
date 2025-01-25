<template>
    <div>
        <h1>{{ event.name }}</h1>
        <p>{{ event.description }}</p>
        <p>Inicio: {{ event.start_time }}</p>
        <p>Fin: {{ event.end_time }}</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            event: {},
        };
    },
    async created() {
        const { data } = await axios.get(`/api/events/${this.$route.params.id}`);
        this.event = data;
    },
};
</script>
