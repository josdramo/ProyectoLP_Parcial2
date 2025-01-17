<template>
    <div>
      <HeaderComponent />
      <SliderComponent :slides="slides" />
      <TrendingCategoryComponent :featuredPost="featuredPost" :posts="posts" />
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
            image: "assets/img/post-slide-1.jpg",
            title: "The Best Homemade Masks for Face",
            description: "Lorem ipsum dolor sit amet...",
            link: "single-post.html",
          },
          // Más diapositivas
        ],
        featuredPost: {
          image: "assets/img/post-landscape-1.jpg",
          title: "11 Work From Home Part-Time Jobs...",
          description: "Lorem ipsum dolor sit...",
          date: "Jul 5th '22",
          category: "Culture",
        },
        posts: [
          [
            {
              image: "assets/img/post-landscape-2.jpg",
              title: "Let’s Get Back to Work, New York",
              date: "Jul 5th '22",
              category: "Sport",
            },
            // Más posts
          ],
          // Más columnas
        ],
      };
    },
  };
  </script>
  
  <style>
  /* Estilos para la vista principal */
  </style>
  