<template>
  <section id="slider" class="slider section dark-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
        <div class="swiper-wrapper">
          <div
            v-for="(slide, index) in slides"
            :key="index"
            class="swiper-slide"
            :style="{ backgroundImage: `url(${slide.image})` }"
          >
            <div class="content">
              <h2><a :href="slide.link">{{ slide.title }}</a></h2>
              <p>{{ slide.description }}</p>
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
export default {
  name: "SliderComponent",
  props: {
    slides: {
      type: Array,
      required: true,
    },
  },
};
</script>