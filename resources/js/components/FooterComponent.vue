<template>
    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="sitename">SocialGaming</span>
            </a>
            <div class="footer-contact pt-3">
                <p>A108 Calle</p>
                <p>Ecuador, Nueve de Octubre</p>
                <p class="mt-3"><strong>Phone:</strong> <span>+593 9 12348571</span></p>
                <p><strong>Email:</strong> <span>socialGaming@gmail.com</span></p>
            </div>
            <div class="social-links d-flex mt-4">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Links Utiles</h4>
            <ul>
                <li><router-link to="/">Inicio</router-link></li>
                <li><router-link to="/">Noticias</router-link></li>
                <li><router-link to="/events">Eventos</router-link></li>
                <li><router-link to="/post">Publicaciones</router-link></li>
                <li><router-link to="/">Términos de Privacidad</router-link></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Product Management</a></li>
                <li><a href="#">Marketing</a></li>
                <li><a href="#">Graphic Design</a></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
                <li><a href="#">Molestiae accusamus iure</a></li>
                <li><a href="#">Excepturi dignissimos</a></li>
                <li><a href="#">Suscipit distinctio</a></li>
                <li><a href="#">Dilecta</a></li>
                <li><a href="#">Sit quas consectetur</a></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
                <li><a href="#">Ipsam</a></li>
                <li><a href="#">Laudantium dolorum</a></li>
                <li><a href="#">Dinera</a></li>
                <li><a href="#">Trodelas</a></li>
                <li><a href="#">Flexo</a></li>
            </ul>
            </div>

        </div>
        </div>

        <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SocialGaming</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon </a>
        </div>
        </div>

    </footer>
</template>

<script>
export default {
  name: "FooterComponent",
};
</script>