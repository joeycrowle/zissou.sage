<?php
  Use Roots\Sage\Extras;


 ?>

<div class="container search-results">
  <div class="row search-title">
    <div class="col">
      <h4><?php echo 'Search Results For: ' . get_search_query(); ?></h4>
    </div>
  </div>



  <?php if (!have_posts()) : ?>
    <div class="row">
      <div class="col">
        <h6>Sorry, No results found for: <?php echo get_search_query(); ?></h6>
      </div>
    </div>
  <?php endif; ?>


  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'search'); ?>
  <?php endwhile; ?>

</div>
