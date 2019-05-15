<?php
Use Roots\Sage\Extras;
$recentIssues = mag_recent_issues(4);

?>

<div class="nav-content">
  <div class="switch-view">
    <ul>
      <li id="issues" class="view-btn-select"><a href="#">Issues</a></li>
      <li id="pages"><a href="#">Pages</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="recent-issues">
      <?php foreach ($recentIssues as $key => $issue) :?>
        <div class="issue-container">
          <a class="issue">
            <?php if ($key == 0) :?>
              <h4>Current Issue</h4>
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
      <ul>
        <li> <a href="#">About Zissou</a> </li>
        <li> <a href="#">Our Writers</a> </li>
        <li> <a href="#">Photographers</a> </li>
        <li> <a href="#">Artists</a> </li>
        <li> <a href="#">Editors</a> </li>
        <li> <a href="#">Instagram</a> </li>
        <li> <a href="#">Facebook</a> </li>
        <li> <a href="#">Twitter</a> </li>
      </ul>
    </div>



    <div class="nav-footer">
      <ul class="nav-footer-list">
        <li> <a href="#">Instagram</a> </li>
        <li> <a href="#">Facebook</a> </li>
        <li> <a href="#">Twitter</a> </li>
        <li> <a href="#">Pinterest</a> </li>
        <li> <a href="#">LinkedIn</a> </li>
      </ul>
      <ul class="nav-footer-list">
        <li> <a href="#">About Zissou</a> </li>
        <li> <a href="#">Our Writers</a> </li>
        <li> <a href="#">Photographers</a> </li>
        <li> <a href="#">Artists</a> </li>
        <li> <a href="#">Editors</a> </li>
      </ul>
      <ul class="nav-footer-list">
        <li> <a href="#">Terms of Use</a> </li>
        <li> <a href="#">Privacy Policy</a> </li>
        <li> <a href="#">Legal</a> </li>
      </ul>
    </div>
  </div>
</div>
