<?php

  # Files
  function pnw_theme_styles() {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/dist/css/style.css' );
  }

  add_action( 'wp_enqueue_scripts', 'pnw_theme_styles' );

  function pnw_theme_js() {
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/dist/scripts/main.js', array('jquery'), '', false );
  }

  add_action( 'wp_enqueue_scripts', 'pnw_theme_js' );

  # WP Menu
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
              'menu_class'        => 'navbar-nav mr-auto',
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

  function register_theme_menus() {
    register_nav_menus( // accepts array of what menus you want to have on your site
      array(
        'primary-menu' => __( 'Primary Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
        'footer-secondary-menu' => __( 'Footer Secondary Menu' )
      )
    );
  }

  add_action( 'init', 'register_theme_menus'); // tell WP to register on init

?>
