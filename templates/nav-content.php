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
        $aboutPage = get_post(2142);
        $aboutExcerpt = $aboutPage ? $aboutPage->post_excerpt : '';
        $mastheadPage = get_page_by_title( 'Masthead' );
        $mastheadExcerpt = $mastheadPage->post_excerpt;
        $contactPage = get_page_by_title( 'Contact' );
        $contactExcerpt = $contactPage->post_excerpt;

        $currentIssue = mag_current_issue_number();
        ?>

        <div class="issue-container">
          <a href="<?= $url ?>" class="issue">
              <h5 class="current-issue-heading">Current Issue</h5>
              
              <h4 class="font-primary current-issue-title"><?php echo $issue['name'] ?></h4>
              <h6 class="issue-no-x">Issue No. <?php echo $currentIssue ?></h6>
              <p class="issue-description"><?php echo $issue['description'] ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a href="/about-zissou" class="issue">
            <h5 class="issue-title">About Zissou</h5>
              <p class="issue-description"><?php echo wp_trim_words($aboutExcerpt, 10, '...'); ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a class="issue masthead-button">
            <h5 class="issue-title">Masthead</h5>
              <p class="issue-description"><?php echo wp_trim_words($mastheadExcerpt, 10, '...'); ?></p>
          </a>
        </div>
        <div class="issue-container">
          <a href="/contact" class="issue">
            <h5 class="issue-title">Contact</h5>
              <p class="issue-description"><?php echo wp_trim_words($contactExcerpt, 10, '...'); ?></p>
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

      <div class="masthead">

          <div class="issue-container">
            <div class="issue">
                <h5 class="current-issue-heading">Masthead</h5>
                <h4 class="font-primary current-issue-title"><?php echo $issue['name'] ?></h4>
                <h6 class="issue-no-x">Issue No. <?php echo $currentIssue ?></h6>
            </div>
          </div>

          <div class="close-masthead-button">
            <p>Close</p>
          </div>


          <div class="issue-container">
            <div class="issue">
              <h5 class="issue-title"><?php echo get_field('col1_title', 'options') ?></h5>

              <?php if( have_rows('col1_group', 'options') ): ?>
                  <?php while( have_rows('col1_group', 'options') ): the_row(); ?>
                    <div class="masthead-group">
                    <h6><?php the_sub_field('group_title'); ?></h6>
                    <?php the_sub_field('group_content'); ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>

            </div>
          </div>

          <div class="issue-container">
            <div class="issue">
              <h5 class="issue-title"><?php echo get_field('col2_title', 'options') ?></h5>

              <?php if( have_rows('col2_group', 'options') ): ?>
                  <?php while( have_rows('col2_group', 'options') ): the_row(); ?>
                    <div class="masthead-group">
                    <h6><?php the_sub_field('group_title'); ?></h6>
                    <?php the_sub_field('group_content'); ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>

            </div>
          </div>

          <div class="issue-container">
            <div class="issue">
              <h5 class="issue-title"><?php echo get_field('col3_title', 'options') ?></h5>

              <?php if( have_rows('col3_group', 'options') ): ?>
                  <?php while( have_rows('col3_group', 'options') ): the_row(); ?>
                    <div class="masthead-group">
                    <h6><?php the_sub_field('group_title'); ?></h6>
                    <?php the_sub_field('group_content'); ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>

            </div>
          </div>

      </div>
    </div>
  </div>

</div>
