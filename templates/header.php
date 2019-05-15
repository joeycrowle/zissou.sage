<header class="banner">
  <div class="inner">

    <div class="nav-header container">
      <div class="burger">
        <div class="stroke"></div>
        <div class="stroke"></div>
      </div>

      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php get_template_part('templates/logo'); ?></a>

      <div class="search">
        <div class="circle"></div>
      </div>
    </div>

    <?php get_template_part('templates/nav-content') ?>

  </div>

</header>

<!--
<nav class="nav-primary">
  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
  endif;
  ?>
</nav>
-->
