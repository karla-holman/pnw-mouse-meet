<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <?php $info_title = get_the_title(); ?>
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>

    <!-- Handle Info -->
    <?php // Get Mouse Meet Popover
      $args = array(
        'post_type' => 'mouse_meet_info_item',
        'orderby' => 'meta_value',
        'order' => 'ASC'
      );

      $info_query = new WP_Query( $args );
    ?>
    <div class="container page-section">
      <div class="row">
        <!-- Left Side Bar -->
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Other Mouse Meet Information</h5>
              <?php if( $info_query->have_posts() ) : while( $info_query->have_posts() ) : $info_query->the_post(); ?>
                <?php if( get_the_title() == $info_title ): ?>
                  <p><?php the_title() ?></p>
                <?php else: ?>
                  <p><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></p>
                <?php endif; ?>
              <?php endwhile; else : ?>

              <?php endif; wp_reset_postdata(); ?>
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
