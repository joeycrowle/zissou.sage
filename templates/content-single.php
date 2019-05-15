<?php
// ARTICLE PAGE

Use Roots\Sage\Extras;

if(have_posts()) : while(have_posts()) : the_post();
  echo the_content();
endwhile;
endif;

?>
