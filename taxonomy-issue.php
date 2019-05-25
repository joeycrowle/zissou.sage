<?php
// ISSUE PAGE
Use Roots\Sage\Extras;
?>

<div class="articles">
<?php

$i = 1;

if(have_posts()) : while(have_posts()) : the_post();
    //get_template_part('templates/article-cover');
    Extras\get_component('templates/article-cover', array('i' => $i));
    $i++;
  endwhile; ?>
</div>

<?php else : ?>
  <h1>Not Found</h1>
  <div class="alert alert-warning">
    <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
  </div>

  <?php get_search_form(); ?>

<?php
  endif;
?>
