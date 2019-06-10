<?php
Use Roots\Sage\Extras;

$classes = array('article-image-v2 container transition');
$rowClasses = array('row');

if ($style == "Align") {
  $classes[] = 'article-image-align';
  if($align_column == "Left") {$rowClasses[] = 'justify-content-start';}
  if($align_column == "Center") {$rowClasses[] = 'justify-content-center';}
  if($align_column == "Right") {$rowClasses[] = 'justify-content-end';}
  if($align_image == "Left") {$classes[] = 'align-image-left';}
  if($align_image == "Center") {$classes[] = 'align-image-center';}
  if($align_image == "Right") {$classes[] = 'align-image-right';}
}

if($style == "Padded") {
  $classes[] = 'article-image-padded';
  if($align == "Left") {$classes[] = 'image-padded-left';}
  if($align == "Center") {$classes[] = 'image-padded-center'; $rowClasses[] = 'justify-content-center';}
  if($align == "Right") {$classes[] = 'image-padded-right'; $rowClasses[] = 'justify-content-end';}
}
?>


<section>
  <div class="<?= implode(" ", $classes) ?>">
    <div class="<?= implode(" ", $rowClasses) ?>">
      <div class="col-11 col-md-9 rellax">
        <div class="article-image-container">
          <?php echo Extras\niceImage($image['id'], '') ?>
        </div>
      </div>
    </div>
  </div>
</section>
