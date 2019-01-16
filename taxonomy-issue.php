<?php Use Roots\Sage\Extras; ?>

<div class="articles">
<?php if(have_posts()) : while(have_posts()) : the_post();
    get_template_part('templates/issue');
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
