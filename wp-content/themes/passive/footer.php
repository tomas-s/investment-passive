<footer class="footer">
  <div class="container">
    <div class="logo-socials">
      <h3>Hilo Investment</h3>
      <a href="mailto:hilo.investment@gmail.com"><i class="far fa-envelope"></i></a>
      <!-- <a href="https://www.facebook.com/Hilo-Investment-104624297973502"><i class="fab fa-facebook-f"></i></a> -->
      <!-- <a href=""><i class="fab fa-instagram"></i></a> -->
      <!-- <a href=""><i class="fab fa-telegram"></i></a> -->
    </div>
    <nav>
      <?php wp_nav_menu(array(
        'theme_location' => 'footerMenu'
      ))
      ?>
    </nav>

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>