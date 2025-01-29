<template>
  <div>
    <HeaderComponent />
    <SliderComponent :slides="slides" />
    <TrendingCategoryComponent :featuredPost="featuredPost" :posts="posts" :postes="postes"/>
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import SliderComponent from "./SliderComponent.vue";
import TrendingCategoryComponent from "./TrendingCategoryComponent.vue";
import FooterComponent from "./FooterComponent.vue";

export default {
  components: {
    HeaderComponent,
    SliderComponent,
    TrendingCategoryComponent,
    FooterComponent,
  },
  data() {
    return {
      slides: [
        {
          image: "assets/img/gaming-news-1.jpg",
          title: "League of Legends Worlds 2024: Todo lo que debes saber",
          description: "El campeonato mundial de LoL se acerca con equipos de todo el mundo.",
        },
        {
          image: "assets/img/gaming-news-2.jpg",
          title: "GTA VI: Filtraciones revelan detalles del mapa y personajes",
          description: "Nuevas filtraciones sugieren una ciudad aún más grande y realista.",
        },
        {
          image: "assets/img/gaming-news-3.jpg",
          title: "Elden Ring: Expansión 'Shadow of the Erdtree' ya tiene fecha",
          description: "FromSoftware anuncia la esperada expansión para su exitoso RPG.",
        },
      ],
      featuredPost: {
        image: "assets/img/gaming-news-4.jpg",
        title: "Cyberpunk 2077 recibe la actualización 2.0 con grandes cambios",
        description: "CD Projekt Red ha lanzado una nueva actualización con mejoras significativas.",
        date: "Enero 29, 2025",
        category: "RPG",
      },
      posts: [
        [
          {
            image: "assets/img/gaming-news-5.jpg",
            title: "Final Fantasy VII Rebirth: ¿Qué esperar del remake?",
            date: "Enero 28, 2025",
            category: "RPG",
          },
          {
            image: "assets/img/gaming-news-6.jpg",
            title: "Counter-Strike 2: ¿Vale la pena el cambio desde CS:GO?",
            date: "Enero 27, 2025",
            category: "FPS",
          },
        ],
        [
          {
            image: "assets/img/gaming-news-7.jpg",
            title: "Nuevos detalles sobre la Nintendo Switch 2",
            date: "Enero 26, 2025",
            category: "Consolas",
          },
          {
            image: "assets/img/gaming-news-8.jpg",
            title: "The Last of Us Multiplayer ha sido cancelado, según informes",
            date: "Enero 25, 2025",
            category: "Acción",
          },
          {
            image: "assets/img/gaming-news-9.jpg",
            title: "Hollow Knight Silksong: ¿Cuándo sale?",
            date: "Enero 28, 2025",
            category: "Plataforma",
          },
        ],
      ],
    };
  },
};
</script>

<style>
/* Estilos para la vista principal */
</style>