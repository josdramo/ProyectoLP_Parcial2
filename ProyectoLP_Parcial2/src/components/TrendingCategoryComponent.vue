<template>
  <section id="trending-category" class="trending-category section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-5">
        <div class="col-lg-4">
          <PostEntryComponent
            :image="featuredPost.image"
            :title="featuredPost.title"
            :description="featuredPost.description"
            :date="featuredPost.date"
            :category="featuredPost.category"
          />
        </div>
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
};
</script>