<?php
// ARTICLE PAGE

Use Roots\Sage\Extras;

if(have_posts()) : while(have_posts()) : the_post();
  if(have_rows('rows')) : while(have_rows('rows')) : the_row();


    if(get_row_layout() == "hero") {
      $vars = array(
        'title_group' => get_sub_field('title'),
        'excerpt_group' => get_sub_field('excerpt'),
        'image_group' => get_sub_field('image'),
        'title' => get_the_title(),
      );
      Extras\get_component('components/article-hero', $vars);
    }


    if(get_row_layout() == "text_column") {
      $vars = array(
        'align_column' => get_sub_field('align_column'),
        'text' => get_sub_field('text')
      );
      Extras\get_component('components/article-text-column', $vars);
    }

    if (get_row_layout() == "image") {
      $vars = array(
        'image' => get_sub_field('image'),
        'style' => get_sub_field('style'),
        'align' => get_sub_field('align'),
        'align_image' => get_sub_field('align_image'),
        'align_column' => get_sub_field('align_column')
      );
      Extras\get_component('components/article-image', $vars);
    }

    if (get_row_layout() == "block_quote") {
      $vars = array(
        'quote' => get_sub_field('quote'),
        'text_colour' => get_sub_field('text_colour'),
        'align_column' => get_sub_field('align_column'),
        'background' => get_sub_field('background'),
        'container' => get_sub_field('container'),
        'issue_font' => get_sub_field('issue_font')
      );
      Extras\get_component('components/article-block-quote', $vars);
    }

  endwhile;endif;
endwhile; endif;

?>
