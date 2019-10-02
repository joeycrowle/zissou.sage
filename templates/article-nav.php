<?php
$prevId =  mag_adjacent_article_id($post, true);
$nextId =  mag_adjacent_article_id($post, false);

function excerpt() {
  return get_field('prevnext_excerpt', $prevId);
}
?>

<div class="article-nav z-container transition">
  <div class="inner">
    <div class="row article-nav-buttons">
      <div class="col-md-6">
        <a class="article-nav-button" href="<?= get_permalink($prevId) ?>">
          <h6><?php echo get_the_title($prevId); ?></h6>
          <div class="excerpt">
            <p><?php echo get_field('prevnext_excerpt', $prevId);;?></p>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <a class="article-nav-button" href="<?= get_permalink($nextId) ?>">
          <h6><?php echo get_the_title($nextId); ?></h6>
          <div class="excerpt">
            <p><?php echo get_field('prevnext_excerpt', $nextId);;?></p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
