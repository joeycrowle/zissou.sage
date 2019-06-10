<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      get_template_part('templates/global-preloader');
    ?>
    <div class="wrap" role="document">
      <div id="barba-wrapper" class="content row">
        <main class="main barba-container">
          <div class="page-content">
            <fields <?php mag_get_issue_fields(); ?> ></fields>
            <classes <?php body_class(); ?>></classes>
            <?php include Wrapper\template_path(); ?>
          </div>
        </main><!-- /.main -->
      </div><!-- /.content -->
      <?php

        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    </div><!-- /.wrap -->
  </body>
</html>
