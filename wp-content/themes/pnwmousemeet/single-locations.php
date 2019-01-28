<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>

    <div class="container page-section">
      <div class="row">
        <!-- Left Side Bar -->
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Address & Directions</h5>
              <p><i class="fa fa-map-marker"></i> <?php the_field('street_address'); ?></p>
              <p><i class="fa fa-phone"></i> <?php the_field('phone_number'); ?></p>
              <p><a class="btn btn-info" href="<?php the_field('directions_link'); ?>" target="_blank">Directions</a></p>
              <?php if( get_field('website') ): ?>
                <p><a href="<?php the_field('website'); ?>">Visit Website</a></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5>Overview</h5>
              <p><?php the_field('overview'); ?></p>
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
