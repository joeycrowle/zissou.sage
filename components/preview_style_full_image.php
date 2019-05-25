<?php
Use Roots\Sage\Extras;

$classes = array("article-preview", "preview-full", "transition");

if (!$default_colour) {
  $classes[] = "customize";
}
?>

<a class="<?= implode(" ", $classes) ?>" href="<?= $permalink ?>" <?php Extras\colorAttributes($default_colour, $font_colour, $background_colour); ?> >

  <?php
  Extras\get_component('templates/preview-content', array('title'=>$title, 'excerpt' => $excerpt, 'number' => $number));
  echo $article_image; ?>
</a>
