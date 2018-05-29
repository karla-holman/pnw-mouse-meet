<!doctype html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Open+Sans:400,600,700" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header>
      <div class="navbar-circle">
        <a class="navbar-brand" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"></a>
      </div>
      <nav class="navbar navbar-light justify-content-end align-items-center secondary-nav">
        <?php social_links(); ?>
        <div id="search-area" class="my-2 my-lg-0">

          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('search-area')) : else : ?>

          <div class="pre-widget">
            <p><strong>Widgetized Area</strong></p>
            <p>This panel is active and ready for you to add some widgets via the WP Admin</p>
          </div>

          <?php endif; ?>

        </div>
      </nav>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light main-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-items-end" id="navbarSupportedContent">
          <?php bootstrap_nav(); ?>
        </div>
      </nav>
    </header>
