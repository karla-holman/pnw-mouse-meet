<?php
  /*
    Template Name: PNW Mini Meet Index
  */
 ?>

<?php get_header(); ?>

<main role="main">
  <!-- Get Next Mouse meet -->
  <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'pnw_mini_meet_ups',
      'posts_per_page' => '9',
      'meta_key' => 'event_date',
      'meta_query' => array(
          array(
              'key' => 'event_date',
              'value' => $today,
              'compare' => '>='
          )
      ),
      'orderby' => 'meta_value',
      'order' => 'ASC'
    );

    $upcoming_query = new WP_Query( $args );
  ?>

  <!-- Handle Hero -->
  <?php if( $upcoming_query->have_posts() ) : while( $upcoming_query->have_posts() ) : $upcoming_query->the_post(); ?>
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="content">
            <h1><?php the_title(); ?></h1>
            <p><?php the_field('description'); ?></p>
          </div>
          <div class="hero-buttons">
            <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-info">Learn More</a>
          </div>
          <div class="sparkle"></div>
        </div>
      </div>
    </div>
  <?php endwhile; else : ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
        <div class="container">
          <div class="text-overlay col-md-5">
            <div class="sparkle"></div>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  <?php endif; wp_reset_postdata(); ?>

  <!-- Introduction -->
  <div class="container page-section">
    <div class="row">
      <div class="col-md-6">
        <h2><?php the_field('intro_title') ?></h2>
        <?php the_field('intro_text'); ?>
      </div>
      <div class="col-md-6">
        <?php the_field('intro_image'); ?>
      </div>
    </div>
  </div>

  <!-- Handle mouse meet entries -->
  <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'pnw_mini_meet_ups',
      'posts_per_page' => '-1',
      'meta_key' => 'event_date',
      'meta_query' => array(
          array(
              'key' => 'event_date',
              'value' => $today,
              'compare' => '<'
          )
      ),
      'orderby' => 'meta_value',
      'order' => 'DESC'
    );

    $query = new WP_Query( $args );
  ?>

  <!-- PAST EVENTS -->
  <div class="color-background primary-light">
    <div class="container page-section">
      <!-- Introduction -->
      <div class="row intro-paragraph">
        <div class="col-md-8">
          <h2>Past Events</h2>
          <p class="intro">
            From History Presentations to Themed Events such as Tiki Meet Ups or Pirate Ship sailings... We keep the PNWMM fun going all year long...
          </p>
        </div>
      </div>
      <!-- Tiles -->
      <div class="row mouse-meets">
        <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

          <div class="col-lg-4 col-md-6">
            <div class="card mouse-meet">
              <div class="card-header">
                <div class="sparkle-side"></div>
                <h3 class="card-title"><?php the_title(); ?></h3>
              </div>
              <div class="card-body">
                <p class="card-text"><?php the_field('description'); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-success">Learn More</a>
              </div>
              <?php if( have_rows('event_speakers') ): ?>
              <div class="card-footer speaker-container">
                  <?php while ( have_rows('event_speakers') ) : ?>
                    <?php $guest = get_post(the_row()); ?>
                    <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $guest->ID ), 'single-post-thumbnail' ); ?>
                    <?php $speaker_legend = $guest->disney_legend ? 'legend' : ''; ?>
                    <div class="speaker-img <?php echo $speaker_legend ?>" style="background-image: url('<?php echo $speaker_image[0]; ?>')">
                      <a tabindex="0" class="speaker-btn" role="button" data-toggle="popover" data-trigger="hover" title="<?php echo get_the_title($guest->ID); ?>" data-placement="bottom" data-content="<?php echo $guest->title; ?>"></a>
                    </div>
                  <?php endwhile; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>

        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</main><!-- /.container -->

<?php get_footer(); ?>
