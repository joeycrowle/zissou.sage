<?php
Use Roots\Sage\Extras;

//READ TIME//////////////////////////////////////////////////////
$article_reading_content = '';
if(have_rows('rows')) : while(have_rows('rows')): the_row();
  if(get_row_layout('text_column')) {
    $text = get_sub_field('text');
    $article_reading_content .= $text;
  }
endwhile; endif;

$reading_wpm = 250;
$article_word_count = str_word_count($article_reading_content);
$read_time = floor($article_word_count/$reading_wpm);
/////////////////////////////////////////////////////////////////

$preview_vars = array(
  'permalink' => get_the_permalink(),
  'title' => get_the_title(),
  'article_image' => Extras\niceImage(get_post_thumbnail_id(), 'preview-image rellax'),
  'excerpt' => get_the_excerpt(),
  'default_colour' => get_field('default_colour'),
  'font_colour' => get_field('font_button_colour'),
  'background_colour' => get_field('background_colour'),
  'crop' => get_field('crop'),
  'align_image' => get_field('align_image'),
  'blurred_background' => get_field('blurred_background'),
  'no_background' => get_field('no_background'),
  'read_time' => $read_time
); ?>


<div class="preview preview-transition">
<?php
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
</div>
