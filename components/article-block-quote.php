<?php
Use Roots\Sage\Extras;

$backgroundStyle = $background['background'];
$backgroundImage = $background['background_image'];
$backgroundColour = $background['background_colour'];
$backgroundPosition = $background['align_image'];
$classes = array('article-block-quote transition');
$rowClass = array('row');
$fontClass = array();

if($align_column == "Left") { $rowClass[] = 'justify-content-start'; }
if($align_column == "Center") { $rowClass[] = 'justify-content-center'; }
if($align_column == "Right") { $rowClass[] = 'justify-content-end'; }
if($background['background'] == "Image") { $classes[] = 'block-quote-image-background'; }
if($background['background'] == "Colour") { $classes[] = 'block-quote-color-background'; }
if($background['background'] == "None") { $classes[] = 'block-quote-no-background'; }
if($container) { $classes[] = 'container'; }

if($backgroundPosition == "Far Left") { $classes[] = 'image-stuck-left'; }
if($backgroundPosition == "Far Right") { $classes[] = 'image-stuck-right'; }
if($backgroundPosition == "Left") { $classes[] = 'image-left'; }
if($backgroundPosition == "Right") { $classes[] = 'image-right'; }

if($issue_font) {$fontClass[] = 'font-primary';}
?>


  <div <?php if($backgroundStyle == "Colour"){echo Extras\backgroundColour($backgroundColour);} ?> class="<?= implode(" ", $classes) ?>">
    <div class="container">

      <?php if($backgroundStyle == "Image") : ?>
        <div class="block-quote-image-container">
          <?php echo Extras\niceImage($background['background_image']['id'], ''); ?>
        </div>
      <?php endif; ?>


      <div class="<?= implode(" ", $rowClass); ?>">
        <div class="col-11 col-md-9 rellax">
          <div class="block-quote">
            <h1 class="<?= implode(" ", $fontClass) ?>" <?php echo Extras\textColour($text_colour)?>><?php echo $quote ?></h1>
          </div>
        </div>
      </div>

  </div>
</div>
