<a class="article-preview preview-offset preview-customize" href="<?= $permalink ?>" <?php mag_preview_color($set_color, $color); ?> >
  <h2 class="article-title font-primary preview__font"><?php echo $title; ?></h2>
  <div class="article-excerpt">
    <p class="preview__font"><?php echo $excerpt; ?></p>
  </div>
  <div class="read-article preview__button">
    <p>Read Article</p>
  </div>
  <?php echo $article_image; ?>
</a>
