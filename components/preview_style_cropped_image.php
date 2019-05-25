<?php
Use Roots\Sage\Extras;

$classes = array("article-preview", "preview-cropped", "transition");

if (!$default_colour) {
  $classes[] = "customize";
}
if ($crop == "Circle") {
  $classes[] = "crop-circle";
}
if ($blurred_background) {
  $classes[] = "blur-background";
}
?>

<a class="<?= implode(" ", $classes) ?>" href="<?= $permalink ?>" <?php Extras\colorAttributes($default_colour, $font_colour, $background_colour); ?> >
  <?php if($blurred_background) : ?>
    <div class="preview-background-img">
      <?php echo $article_image; ?>
    </div>
  <?php endif;
  Extras\get_component('templates/preview-content', array('title'=>$title, 'excerpt' => $excerpt, 'number' => $number));
  ?>

  <div class="preview-image-container">
    <?php echo $article_image; ?>
  </div>


</a>
