<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;
use Roots\Sage\Extras;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'pages_navigation' => __('Pages Navigation', 'sage'),
    'social_navigation' => __('Social Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_post_type_support( 'page', 'excerpt' );
  add_theme_support('align-wide');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');


function enqueue_editor_scripts() {

    wp_enqueue_script('admin/js', Assets\asset_path('scripts/editor.js'));
}

add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\enqueue_editor_scripts');


/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', false);
  //return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  //global $post;
  wp_localize_script( 'sage/js', 'wpObject', array(
   'ajaxUrl' => admin_url( 'admin-ajax.php' ),
   'themeLocation' => get_template_directory_uri(),
   'currentIssue' => get_option('mag_current_issue')
   //'postId' => $post->ID
  ));
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

function mime_types($mime_types){
    $mime_types['webp'] = 'image/webp';
    return $mime_types;
}
add_filter('upload_mimes', __NAMESPACE__ . '\\mime_types', 1, 1);


define('CONCATENATE_SCRIPTS', false);


//ACF OPTIONS PAGE

$options_page_settings = array(
  'page_title' => __('Masthead'),
  'menu_title' => __('Masthead'),
  'menu_slug' => __('masthead'),
  'capability' => 'edit_posts',
  'icon_url' => 'dashicons-editor-kitchensink'
);

acf_add_options_page($options_page_settings);


//EXCERPT CONTENT FOR RELEVANSSI
function custom_fields_to_excerpts($content, $post, $query) {

  $content = '';
  if(have_rows('rows', $post->ID)) : while(have_rows('rows', $post->ID)) : the_row();
    if(get_sub_field('excerpt')['excerpt']){ $content .= wp_strip_all_tags(get_sub_field('excerpt')['excerpt']); }
    if(get_sub_field('text', false, false)){ $content .= wp_strip_all_tags(get_sub_field('text')); }
  endwhile;endif;
  return $content;
}

add_filter('relevanssi_excerpt_content', __NAMESPACE__ . '\\custom_fields_to_excerpts', 10, 3);



//MODIFY NUMBER OF RESULTS SHOWN
function postsperpage($limits) {
	if (is_search()) {
		global $wp_query;
		$wp_query->query_vars['posts_per_page'] = -1;
	}
	return $limits;
}

add_filter('post_limits', __NAMESPACE__ . '\\postsperpage');
