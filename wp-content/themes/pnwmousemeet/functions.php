<?php

  ############ Files

  function pnw_theme_styles() {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/dist/css/style.css' );
  }

  add_action( 'wp_enqueue_scripts', 'pnw_theme_styles', 99 );

  function pnw_theme_js() {
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/dist/scripts/main.js', array('jquery'), '', false );
  }

  add_action( 'wp_enqueue_scripts', 'pnw_theme_js' );

  ############ WP Menu
  add_action('get_header', 'my_filter_head');

  function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }

  add_theme_support( 'menus' );

  // Register Custom Navigation Walker
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

  // Bootstrap navigation
  function bootstrap_nav()
  {
    wp_nav_menu( array(
              'theme_location'    => 'primary-menu',
              'depth'             => 2,
              'container'         => 'false',
              'menu_class'        => 'navbar-nav',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker())
      );
  }

  // Footer navigation
  function footer_nav()
  {
    wp_nav_menu( array(
              'theme_location'    => 'footer-menu',
              'depth'             => 1,
              'container'         => 'false')
    );
  }

  // Footer Secondary navigation
  function footer_secondary_nav()
  {
    wp_nav_menu( array(
              'theme_location'    => 'footer-secondary-menu',
              'depth'             => 1,
              'container'         => false,
              'menu_class'        => 'footer-secondary-links')
    );
  }

  // Social Links
  function social_links()
  {
    wp_nav_menu( array(
              'theme_location'    => 'header-social-links',
              'depth'             => 1,
              'container'         => false,
              'menu_class'        => 'social-links')
    );
  }

  function register_theme_menus() {
    register_nav_menus( // accepts array of what menus you want to have on your site
      array(
        'primary-menu' => __( 'Primary Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
        'footer-secondary-menu' => __( 'Footer Secondary Menu' ),
        'header-social-links' => __( 'Header Social Links' )
      )
    );
  }

  add_action( 'init', 'register_theme_menus'); // tell WP to register on init

  ########### Widgets
  if (function_exists('register_sidebar')) {

  	register_sidebar(array(
  		'name' => 'Search Area',
  		'id'   => 'search-area',
  		'description'   => 'Site Search.',
  		'before_widget' => '<div id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</div>',
  		'before_title'  => '<h4>',
  		'after_title'   => '</h4>'
  	));

  }

  add_theme_support( 'post-thumbnails' );
?>
