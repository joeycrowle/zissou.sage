<?php
$rowClass = array('row');
$classes = array('container', 'article-text-column');

if($align_column == "Left") {$rowClass[] = 'justify-content-start'; $classes[] = 'align-column-left';}
if($align_column == "Center") {$rowClass[] = 'justify-content-center'; $classes[] = 'align-column-center';}
if($align_column == "Right") {$rowClass[] = 'justify-content-end'; $classes[] = 'align-column-right';}


 ?>


 <div data-rellax-zindex="5" class="<?= implode(" ", $classes); ?>">
   <div class="<?= implode(" ", $rowClass); ?>">
     <div class="col col-sm-11 col-md-9 text-column">
       <p class=""><?php echo $text ?></p>
     </div>
   </div>

 </div>
