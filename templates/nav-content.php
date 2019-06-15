<?php
Use Roots\Sage\Extras;

$numOfIssues = 4;
$recentIssues = mag_recent_issues($numOfIssues);

function isNew($recentIssues, $numOfIssues) {
  if(sizeOf($recentIssues) < $numOfIssues){ return true; }
  else { return false; }
}

?>

<div class="nav-content nav-content-display-none">
  <div class="container content">
    <div class="recent-issues">
      <?php if(isNew($recentIssues, $numOfIssues)):
        $issue = $recentIssues[0];
        $url = get_home_url() . '?issue=' . $issue['slug'];
        $aboutPage = get_page_by_title( 'About Zissou' );
        $aboutExcerpt = $aboutPage->post_excerpt;
        $writersPage = get_page_by_title( 'Writers' );
        $writersExcerpt = $writersPage->post_excerpt;
        $editorsPage = get_page_by_title( 'Editors' );
        $editorsExcerpt = $editorsPage->post_excerpt;
        ?>

        <div class="issue-container">
          <a href="<?= $url ?>" class="issue">
              <h5 class="current-issue-heading">Current Issue</h5>
              <h4 class="font-primary current-issue-title"><?php echo $issue['name'] ?></h4>
              <p class="issue-description"><?php echo $issue['description'] ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a href="/about-zissou" class="issue">
            <h6>01</h6>
            <h5 class="issue-title">About Zissou</h5>
              <p class="issue-description"><?php echo wp_trim_words($aboutExcerpt, 10, '...'); ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a href="/writers" class="issue">
            <h6>02</h6>
            <h5 class="issue-title">Our Writers</h5>
              <p class="issue-description"><?php echo wp_trim_words($writersExcerpt, 10, '...'); ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a href="/our-editors" class="issue">
            <h6>03</h6>
            <h5 class="issue-title">Our Editors</h5>
              <p class="issue-description"><?php echo wp_trim_words($editorsExcerpt, 10, '...'); ?></p>
          </a>
        </div>
      <?php else: ?>

      <?php foreach ($recentIssues as $key => $issue) :
        $url = get_home_url() . '?issue=' . $issue['slug']; ?>
        <div class="issue-container">
          <a href="<?= $url ?>" class="issue">
            <?php if ($key == 0) :?>
              <h5 class="current-issue-heading">Current Issue</h5>
              <h4 class="font-primary current-issue-title"><?php echo $issue['name'] ?></h4>
            <?php else : ?>
              <h6>Issue <?php echo $issue['issue-number'] ?></h6>
              <h5 class="issue-title"><?php echo $issue['name'] ?></h5>
            <?php endif; ?>
            <p class="issue-description"><?php echo $issue['description'] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    </div>
    <div class="pages">
      <?php wp_nav_menu(array('theme_location'=>'pages_navigation')); ?>
    </div>
  </div>
</div>
