<template>
    <HeaderComponent />
    <section id="team" class="team section">
      <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
          <h2>Equipo</h2>
          <p>Conoce a los miembros que trabajan en este proyecto</p>
        </div>
      </div>
  
      <div class="container">
        <div class="row gy-4">
          <TeamMember
            v-for="(member, index) in teamMembers"
            :key="index"
            :name="member.name"
            :role="member.role"
            :description="member.description"
            :image="member.image"
            :social="member.social"
          />
        </div>
      </div>
    </section>
    <FooterComponent />
  </template>
  
  <script>
  import TeamMember from "./TeamMember.vue";
  import HeaderComponent from "./HeaderComponent.vue";
  import FooterComponent from "./FooterComponent.vue";
  
  export default {
    name: "TeamSection",
    components: {
      HeaderComponent,
      FooterComponent,  
      TeamMember,
    },
    data() {
      return {
        teamMembers: [
          {
            name: "Jorge Gaibor",
            role: "Desarrollador Backend",
            description: "Especialista en APIs, bases de datos.",
            image: "assets/img/team/team-1.jpg",
            social: {
              twitter: "#",
              facebook: "#",
              instagram: "#",
              linkedin: "#",
            },
          },
          {
            name: "José Ramos",
            role: "DevOps & Seguridad",
            description: "Encargado de la infraestructura, despliegues y seguridad del sistema.",
            image: "assets/img/team/team-2.jpg",
            social: {
              twitter: "#",
              facebook: "#",
              instagram: "#",
              linkedin: "#",
            },
          },
          {
            name: "Julio Vivas",
            role: "Desarrollador Frontend",
            description: "Diseño y desarrollo de interfaces de usuario con Vue.js.",
            image: "assets/img/team/team-3.jpg",
            social: {
              twitter: "#",
              facebook: "#",
              instagram: "#",
              linkedin: "#",
            },
          },
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .team {
    background-color: #f9f9f9;
    padding: 50px 0;
  }
  .section-title h2 {
    font-size: 28px;
    font-weight: bold;
  }
  </style>
  