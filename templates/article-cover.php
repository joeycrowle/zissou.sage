<?php

Use Roots\Sage\Extras;



$preview_vars = array(
  'permalink' => get_the_permalink(),
  'title' => get_the_title(),
  'article_image' => Extras\niceImage(get_post_thumbnail_id(), 'preview-image rellax'),
  'excerpt' => wp_trim_words(get_the_excerpt(), 20, '...'),
  'default_colour' => get_field('default_colour'),
  'font_colour' => get_field('font_button_colour'),
  'background_colour' => get_field('background_colour'),
  'crop' => get_field('crop'),
  'align_image' => get_field('align_image'),
  'blurred_background' => get_field('blurred_background'),
  'no_background' => get_field('no_background')
);

switch (get_field('preview_style')) {
  case 'Full':
    Extras\get_component('components/preview_style_full_image', $preview_vars);
    break;

  case 'Offset':
    Extras\get_component('components/preview_style_offset_image', $preview_vars);
    break;

  case 'Cropped':
    Extras\get_component('components/preview_style_cropped_image', $preview_vars);
    break;

  case 'None':
    Extras\get_component('components/preview_style_none', $preview_vars);
    break;

  default:
    // default stuff
    break;
}

?>
