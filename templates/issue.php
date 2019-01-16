<?php

Use Roots\Sage\Extras;

$fields = get_field('article_rows');
$firstContent = $fields[0]['content'];
$excerpt = wp_trim_words($firstContent, 20);
$color = get_field('color');
$useIssueColor = get_field('set_color');

$preview_vars = array(
  'permalink' => get_the_permalink(),
  'title' => get_the_title(),
  'article_image' => Extras\niceImage(get_post_thumbnail_id(), 'lazy'),
  'excerpt' => $excerpt,
  'color' => $color,
  'set_color' => $useIssueColor
);

if(get_field('layout') == 'Full Image') {
  Extras\get_component('components/preview_style_full_image', $preview_vars);
}

if(get_field('layout') == 'Offset Image') {
  Extras\get_component('components/preview_style_offset_image', $preview_vars);
}
?>
