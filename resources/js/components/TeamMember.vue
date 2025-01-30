<template>
    <div class="col-lg-4" data-aos="fade-up">
      <div class="team-member d-flex align-items-start">
        <div class="pic">
          <img :src="image" class="img-fluid" :alt="name" />
        </div>
        <div class="member-info">
          <h4>{{ name }}</h4>
          <span>{{ role }}</span>
          <p>{{ description }}</p>
          <div class="social">
            <a :href="social.twitter"><i class="bi bi-twitter-x"></i></a>
            <a :href="social.facebook"><i class="bi bi-facebook"></i></a>
            <a :href="social.instagram"><i class="bi bi-instagram"></i></a>
            <a :href="social.linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "TeamMember",
    props: {
      name: String,
      role: String,
      description: String,
      image: String,
      social: Object,
    },
  };
  </script>
  
  <style scoped>
  .team-member {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .pic img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
  }
  .member-info h4 {
    font-size: 18px;
    font-weight: bold;
  }
  .social a {
    margin-right: 10px;
    color: #555;
    transition: 0.3s;
  }
  .social a:hover {
    color: #007bff;
  }
  </style>
  