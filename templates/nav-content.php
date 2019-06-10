<?php
Use Roots\Sage\Extras;
$recentIssues = mag_recent_issues(4);

?>

<div class="nav-content nav-content-display-none">
  <div class="switch-view">
    <ul>
      <li id="issues" class="view-btn-select"><a href="#">Issues</a></li>
      <li id="pages"><a href="#">Pages</a></li>
    </ul>
  </div>
  <div class="container content">
    <div class="recent-issues">
      <?php foreach ($recentIssues as $key => $issue) :
        $url = get_home_url() . '?issue=' . $issue['slug']; ?>

        <div class="issue-container">
          <a href="<?= $url ?>" class="issue">
            <?php if ($key == 0) :?>
              <h4 class="current-issue-heading">Current Issue</h4>
              <h4 class="font-primary current-issue-title"><?php echo $issue['name'] ?></h4>
            <?php else : ?>
              <h5>Issue <?php echo $issue['issue-number'] ?></h5>
              <h3 class="issue-title"><?php echo $issue['name'] ?></h3>
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
