<?php
Use Roots\Sage\Extras;

$classes = array('article-image-seperator transition');
$rowClasses = array('row');

if($align_column == "Left") {$rowClasses[] = 'justify-content-start';}
if($align_column == "Center") {$rowClasses[] = 'justify-content-center';}
if($align_column == "Right") {$rowClasses[] = 'justify-content-end';}

if($align_image == "Left") {$classes[] = 'align-image-left';}
if($align_image == "Center") {$classes[] = 'align-image-center';}
if($align_image == "Right") {$classes[] = 'align-image-right';}

//$align_column
//$float_image
//$float

 ?>

<div class="<?= implode(" ", $classes) ?>">
  <div class="container">
    <div class="<?= implode(" ", $rowClasses) ?>">
      <div class="col-11 col-md-9">
        <div class="article-image-container">
          <?php echo Extras\niceImage($image['id'], 'rellax') ?>
        </div>
      </div>
    </div>
  </div>
</div>
