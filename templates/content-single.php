<?php
// ARTICLE PAGE

Use Roots\Sage\Extras;

if(have_posts()) : while(have_posts()) : the_post();
  if(have_rows('rows')) : while(have_rows('rows')) : the_row();

    $vars = array(
      'title_group' => get_sub_field('title'),
      'excerpt_group' => get_sub_field('excerpt'),
      'image_group' => get_sub_field('image'),
      'title' => get_the_title(),
    );
    if(get_row_layout() == "hero") {
      Extras\get_component('components/article-hero', $vars);
    }

  endwhile;endif;
endwhile; endif;

?>
