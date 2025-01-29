<template>
  <section id="trending-category" class="trending-category section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-5">
        <!-- Sección de Publicación Destacada -->
        <div class="col-lg-4">
          <PostEntryComponent
            :image="featuredPost.image"
            :title="featuredPost.title"
            :description="featuredPost.description"
            :date="featuredPost.date"
            :category="featuredPost.category"
          />
        </div>

        <!-- Sección de Lista de Publicaciones -->
        <div class="col-lg-8">
          <div class="row g-5">
            <div
              v-for="(post, index) in posts"
              :key="index"
              class="col-lg-4 border-start custom-border"
            >
              <PostEntryComponent
                v-for="subPost in post"
                :key="subPost.id"
                :image="subPost.image"
                :title="subPost.title"
                :category="subPost.category"
                :date="subPost.date"
              />
            </div>
          </div>      
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import PostEntryComponent from "./PostEntryComponent.vue";

export default {
  name: "TrendingCategoryComponent",
  components: { PostEntryComponent },
  props: {
    featuredPost: Object,
    posts: Array,
  },
  data() {
    return {
      // 🔥 Datos de publicaciones en tendencia
      trendingPosts: [
        {
          title: "The Best Homemade Masks for Face (keep the Pimples Away)",
          author: "Jane Cooper",
          link: "blog-details.html",
        },
        {
          title: "17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut",
          author: "Wade Warren",
          link: "blog-details.html",
        },
        {
          title: "13 Amazing Poems from Shel Silverstein with Valuable Life Lessons",
          author: "Esther Howard",
          link: "blog-details.html",
        },
        {
          title: "9 Half-up/half-down Hairstyles for Long and Medium Hair",
          author: "Cameron Williamson",
          link: "blog-details.html",
        },
        {
          title: "Life Insurance And Pregnancy: A Working Mom’s Guide",
          author: "Jenny Wilson",
          link: "blog-details.html",
        },
      ],
    };
  },
};
</script>

<style scoped>
/* Estilos para la sección de trending */
.trending {
  background: #f8f9fa;
  padding: 15px;
  border-radius: 8px;
}

.trending h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
}

.trending-post {
  list-style: none;
  padding: 0;
  margin: 0;
}

.trending-post li {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.trending-post a {
  text-decoration: none;
  color: #333;
  display: flex;
  align-items: center;
  width: 100%;
}

.trending-post .number {
  font-size: 1.5rem;
  font-weight: bold;
  color: #ff4500;
  margin-right: 10px;
}

.trending-post h3 {
  font-size: 1rem;
  margin: 0;
  flex-grow: 1;
}

.trending-post .author {
  font-size: 0.85rem;
  color: #777;
}
</style>
