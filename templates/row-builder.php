<div class="article">
<?php
Use Roots\Sage\Extras;
if(have_posts()) : while(have_posts()) : the_post();
  if(have_rows('article_rows')) : while(have_rows('article_rows')) : the_row();


  if(get_row_layout() == "image_block") {
    $block_fields = array (
      'heading' => get_sub_field('heading'),
      'content' => get_sub_field('content'),
      'picture' => Extras\niceImage(get_sub_field('image')['ID'], 'lazy')
    );
    Extras\get_component('components/article_image_block', $block_fields);
  }


  if(get_row_layout() == "color_block") {
    $block_fields = array (
      'set_color' => get_sub_field('set_color'),
      'color' => get_sub_field('color'),
      'content' => get_sub_field('content')
    );
    Extras\get_component('components/article_color_block', $block_fields);
  }


  if(get_row_layout() == "blank_block") {
    $block_fields = array (
      'content' => get_sub_field('content')
    );
    Extras\get_component('components/article_blank_block', $block_fields);
  }


  endwhile;
  endif;

endwhile;
endif;

 ?>
</div>
