<?php
Use Roots\Sage\Extras;

//classes
$classes = array("article-hero transition obj-fit");
$wrapClass = array();
$excerptRowClasses = array('row');
//image group
$style = $image_group['style'];
$alignImage = $image_group['align'];
$backgroundColour = $image_group['background_colour'];
$heroImgId = $image_group['image']['id'];
$heroImg2Id = $image_group['image_2']['id'];
//excerpt group
$excerptPosition = $excerpt_group['position'];
$excerptColour = $excerpt_group['colour'];
$alignColumn = $excerpt_group['align_column'];
$alignExcerpt = $excerpt_group['align_excerpt'];
$alignAuthor = $excerpt_group['align_author'];
$excerpt = $excerpt_group['excerpt'];
$author = $excerpt_group['author'];
//title group
$titleStyle = $title_group['style'];
$titleColour = $title_group['colour'];


if($style == "Full") {$classes[] = 'hero-full';}
if($style == "Aligned") { $classes[] = 'hero-aligned'; };
if($style == "Double") { $classes[] = 'hero-double'; };
if($style == "None") { $classes[] = 'hero-none'; };
if($alignImage == "Left") { $classes[] = 'hero-align-left'; };
if($alignImage == "Right") { $classes[] = 'hero-align-right'; };
if($titleStyle == "Regular") { $classes[] = 'title-regular'; };
if($titleStyle == "Stack") { $classes[] = 'title-stack'; };
if($titleStyle == "Duplicated") { $classes[] = 'title-duplicated'; };
if($titleStyle == "Vertical Space") { $classes[] = 'title-vertical-space'; };
if($excerptPosition == "Inside" && $titleStyle != "Vertical Space" && $titleStyle != "Duplicated") { $classes[] = 'excerpt-inside'; };
if($excerptPosition == "Outside") { $classes[] = 'excerpt-outside'; };
if($alignExcerpt == "Left") { $classes[] = "align-excerpt-left"; };
if($alignExcerpt == "Center") { $classes[] = "align-excerpt-center"; };
if($alignExcerpt == "Right") { $classes[] = "align-excerpt-right"; };
if($alignAuthor == "Left") { $classes[] = "align-author-left"; };
if($alignAuthor == "Center") { $classes[] = "align-author-center"; };
if($alignAuthor == "Right") { $classes[] = "align-author-right"; };
if($alignColumn == "Center") { $excerptRowClasses[] = "justify-content-center"; };
if($alignColumn == "Right") { $excerptRowClasses[] = "justify-content-end"; };
if($style == "Aligned") { $wrapClass[] = "container"; };



function title($style, $title) {
  if($style == "Duplicated") {
    return
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>' .
    $title . ' ' . $title . ' ' . $title . '<br/>';
  } else {
    return $title;
  }
}
?>

<div class="<?= implode(" ", $classes); ?>">
  <div class="<?= implode(" ", $wrapClass); ?>">
    <div class="hero" <?php if($style=="None"){echo Extras\backgroundColour($backgroundColour);} ?>>
      <?php if($style !== "None") : ?>
      <div class="hero-image obj-fit">
        <?php echo Extras\niceImage($heroImgId, 'rellax'); ?>
      </div>
    <?php endif; ?>
      <div class="article-title row justify-content-center ">
        <div class="col">
          <h1 class="font-primary" <?php echo Extras\textColour($titleColour) ?>><?php echo title($titleStyle, $title); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <?php if($excerpt || $author) : ?>
  <div data-rellax class="hero-excerpt container">
    <div class="<?= implode(" ", $excerptRowClasses); ?>">
      <div class="col-11 col-md-9">
        <?php if($excerpt) : ?>
        <p class="excerpt" <?php echo Extras\textColour($excerptColour) ?>><?php echo $excerpt; ?></p>
        <?php endif; ?>
        <?php if($author) : ?>
        <div class="author">
          <p <?php echo Extras\textColour($excerptColour) ?>><?php echo $author; ?></p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
