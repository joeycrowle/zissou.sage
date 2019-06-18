<?php
// ISSUE PAGE
Use Roots\Sage\Extras;
?>

<div class="articles">
<?php
if(have_posts()) : while(have_posts()) : the_post();
    Extras\get_component('templates/article-cover', array());
  endwhile; ?>
</div>

<?php endif; ?>
