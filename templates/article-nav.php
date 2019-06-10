<?php
$prevId =  mag_adjacent_article_id($post, true);
$nextId =  mag_adjacent_article_id($post, false);
?>

<div class="article-nav container">
 <div class="row justify-content-center">
   <div class="col-11 col-md-9 article-nav-buttons">
       <a href="<?= get_permalink($prevId) ?>">
         <h5><?php echo get_the_title($prevId); ?></h5>
         <div class="excerpt">
           <p><?php echo wp_trim_words(get_the_excerpt($prevId), 10, "...");?></p>
         </div>
       </a>
       <a href="<?= get_permalink($nextId) ?>">
         <h5><?php echo get_the_title($nextId); ?></h5>
         <div class="excerpt">
           <p><?php echo wp_trim_words(get_the_excerpt($nextId), 10, "...");?></p>
         </div>
       </a>
   </div>
 </div>
</div>
