<div class="preview-content">
  <h1 class="article-title font-primary preview__font"><?php echo $title; ?></h1>
  <div class="article-excerpt">
    <p class="preview__font"><?php echo $excerpt; ?></p>
    <h6 class="x-minute-read preview__font"><?php echo $read_time . ' Minute Read' ?></h6>
  </div>
  <a href="<?= $permalink ?>" class="read-article preview__button">
    <p>Read</p>
  </a>
</div>
