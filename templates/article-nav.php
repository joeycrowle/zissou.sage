<?php
$prevId =  mag_adjacent_article_id($post, true);
$nextId =  mag_adjacent_article_id($post, false);
?>

<div class="article-nav z-container transition">
  <div class="inner">
    <div class="row article-nav-buttons">
      <div class="col-md-6">
        <a class="article-nav-button" href="<?= get_permalink($prevId) ?>">
          <h6><?php echo get_the_title($prevId); ?></h6>
          <div class="excerpt">
            <p><?php echo wp_trim_words(get_the_excerpt($prevId), 10, "...");?></p>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <a class="article-nav-button" href="<?= get_permalink($nextId) ?>">
          <h6><?php echo get_the_title($nextId); ?></h6>
          <div class="excerpt">
            <p><?php echo wp_trim_words(get_the_excerpt($nextId), 10, "...");?></p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
