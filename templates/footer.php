<footer class="content-info">
  <div class="container">
    <div class="row">
      <div class="col-4">
        <?php wp_nav_menu(array('theme_location'=>'pages_navigation')); ?>
      </div>
      <div class="col-4 icons">
        <div class="social-icons">
          <a href="#"><?php get_template_part('templates/social-facebook'); ?></a>
          <a href="#"><?php get_template_part('templates/social-twitter'); ?></a>
          <a href="#"><?php get_template_part('templates/social-instagram'); ?></a>
        </div>
      </div>
    </div>
  </div>
</footer>
