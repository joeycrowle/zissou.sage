<?php
Use Roots\Sage\Extras;

$classes = array("article-preview", "preview-full");

if (!$default_colour) {
  $classes[] = "customize";
}
?>

<div class="<?= implode(" ", $classes) ?>" <?php Extras\colorAttributes($default_colour, $font_colour, $background_colour); ?> >

  <?php
    Extras\get_component('templates/preview-content', array('title'=>$title, 'excerpt' => $excerpt, 'permalink'=>$permalink)); ?>

  <div class="background-img obj-fit">
    <?php echo $article_image; ?>
  </div>
</div>
