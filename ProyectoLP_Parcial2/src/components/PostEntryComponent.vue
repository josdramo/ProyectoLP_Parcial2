<template>
    <div class="post-entry">
      <a :href="link"><img :src="image" alt="" class="img-fluid" /></a>
      <div class="post-meta">
        <span class="date">{{ category }}</span> <span class="mx-1">•</span>
        <span>{{ date }}</span>
      </div>
      <h2><a :href="link">{{ title }}</a></h2>
      <p v-if="description" class="mb-4 d-block">{{ description }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: "PostEntryComponent",
    props: {
      image: String,
      title: String,
      link: String,
      category: String,
      date: String,
      description: String,
    },
  };
  </script>