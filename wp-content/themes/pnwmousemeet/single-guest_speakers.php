<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
          <p><?php the_field('title'); ?></p>
        </div>
      </div>
    </div>

    <div class="container page-section">
      <div class="row">
        <!-- Left Side Bar -->
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Introduction</h5>
              <p><?php the_field('introduction'); ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Oops! No Meet Found.' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
