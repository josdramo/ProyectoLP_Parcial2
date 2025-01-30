<template>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <router-link to="/" href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">SocialGaming</h1>
      </router-link>

      <nav id="navmenu" class="navmenu">
        <ul>
          <router-link to="/">Inicio</router-link>
          <router-link to="/team">Sobre Nosotros</router-link>
          <router-link to="/events">Eventos</router-link>
          <router-link to="/post">Publicaciones</router-link>
          <li class="dropdown">
            <a href="#"><span>Perfil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <router-link to="/login">Iniciar Sesión</router-link>
              <router-link to="/register">Registrarse</router-link>
              <router-link to="/profile">Ver Perfil</router-link> 
              <router-link to="/logout">Cerrar Sesión</router-link>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </header>
</template>

<script>
import { RouterLink } from 'vue-router';

export default {
  name: "HeaderComponent",
};
</script>