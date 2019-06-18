<?php
  Use Roots\Sage\Extras;

  $classes = array("article-preview", "preview-offset");

  if (!$default_colour) {
    $classes[] = "customize";
  }
  if($align_image == "Left") {
    $classes[] = "align-left";
  }
  if($align_image== "Right") {
    $classes[] = "align-right";
  }
  if($no_background) {
    $classes[] = 'no-background';
  }

?>

<a class="<?= implode(" ", $classes) ?>" href="<?= $permalink ?>" <?php Extras\colorAttributes($default_colour, $font_colour, $background_colour); ?> >
  <div class="preview-img-container">
    <?php echo $article_image; ?>
  </div>
  <?php Extras\get_component('templates/preview-content', array('title'=>$title, 'excerpt' => $excerpt)); ?>
</a>
