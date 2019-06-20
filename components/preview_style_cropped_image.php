<?php
Use Roots\Sage\Extras;

$classes = array("article-preview", "preview-cropped");

if (!$default_colour) {
  $classes[] = "customize";
}
if ($crop == "Circle") {
  $classes[] = "crop-circle";
}
if ($blurred_background) {
  $classes[] = "blur-background";
}
if($no_background) {
  $classes[] = 'no-background';
}
?>

<div class="<?= implode(" ", $classes) ?>" <?php Extras\colorAttributes($default_colour, $font_colour, $background_colour); ?> >
  <?php if($blurred_background) : ?>
    <div class="preview-background-img obj-fit">
      <?php echo $article_image; ?>
    </div>
  <?php endif;
  Extras\get_component('templates/preview-content', array('title'=>$title, 'excerpt' => $excerpt, 'permalink'=>$permalink));
  ?>

  <div class="preview-image-container obj-fit">
    <?php echo $article_image; ?>
  </div>


</div>
