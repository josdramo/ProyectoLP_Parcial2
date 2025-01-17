<template>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">SocialGaming</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <router-link to="/">Inicio</router-link>
          <li><a href="about.html">Noticias</a></li>
          <router-link to="/events">Eventos</router-link>
          <li><a href="contact.html">Contact</a></li>
          <li class="dropdown">
            <a href="#"><span>Perfil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="category.html">Iniciar Sesión</a></li>
              <li><a href="category.html">Registrarse</a></li>
              <router-link to="/profile">Ver Perfil</router-link> 
              <li><a href="category.html">Cerrar Sesión</a></li>
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
export default {
  name: "HeaderComponent",
};
</script>