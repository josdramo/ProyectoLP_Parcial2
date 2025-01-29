<template>
  <section id="slider" class="slider section dark-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div v-for="(slide, index) in slides" :key="index" class="swiper-slide">
            <div class="slide-content">
              <img :src="slide.image" :alt="slide.title" class="slide-image" />
              <div class="content">
                <h2><a :href="slide.link">{{ slide.title }}</a></h2>
                <p>{{ slide.description }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
</template>

<script>
import Swiper from 'swiper';
import '../bootstrap/swiper/swiper-bundle.min.css';

export default {
  name: "SliderComponent",
  props: {
    slides: {
      type: Array,
      required: true,
    },
  },
  mounted() {
    this.initSwiper();
  },
  methods: {
    initSwiper() {
      this.$nextTick(() => {
        new Swiper(".mySwiper", {
          loop: true,
          speed: 600,
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
          slidesPerView: 1,
          centeredSlides: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
      });
    },
  },
};
</script>

<style>
/* Ajustes de tamaño */
/* Ajustes del Slider */
#slider {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

/* Asegurar que cada slide ocupe el espacio completo */
.swiper-slide {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  width: 100%;
  height: 500px; /* Ajusta la altura como prefieras */
}

/* Ajustar la imagen dentro del slide */
.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Asegura que la imagen cubra todo el contenedor sin distorsionarse */
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1; /* Poner la imagen detrás del contenido */
}

/* Ajustar el contenido dentro del slide */
.swiper-slide .content {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(0, 0, 0, 0.6); /* Fondo semi-transparente */
  padding: 15px;
  border-radius: 8px;
  text-align: center;
  color: white;
  width: 80%;
  max-width: 600px;
  z-index: 1; /* Asegurar que el texto esté sobre la imagen */
}

/* Estilos para el texto dentro del contenido */
.swiper-slide .content h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.swiper-slide .content p {
  font-size: 16px;
  margin: 0;
}
</style>
