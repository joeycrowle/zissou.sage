<?php
Use Roots\Sage\Extras;
$recentIssues = mag_recent_issues(4);

?>

<div class="nav-content nav-content-display-none">
  <div class="container content">
    <div class="recent-issues">
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
    </div>

    <div class="pages">
      <?php wp_nav_menu(array('theme_location'=>'pages_navigation')); ?>
    </div>
  </div>
</div>
