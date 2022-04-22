<?php
  /*
    Template Name: PNW Mouse Meet Index
  */
 ?>

<?php get_header(); ?>

<main role="main">
  <!-- Get Next Mouse meet -->
  <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'pnw_mouse_meets',
      'posts_per_page' => '1',
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
    <?php $date = get_field('event_date'); ?>
    <?php $date_object = new DateTime($date); ?>
    <div class="hero full">
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="content">
            <h1>Pacific Northwest Mouse Meet</h1>
            <h5>The <?php the_title(); ?> PNWMM - Coming <?php echo $date_object->format('F j, Y'); ?>!</h5>
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

  <!-- Testimonials -->
  <?php
    $args = array(
      'post_type' => 'testimonials',
      'meta_key' => 'related_event'
    );

    $testimonial_query = new WP_Query( $args );
  ?>

  <a name="guest-responses"></a>
  <div class="testimonial-background">
    <img class="mountain" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/mountain.svg">
    <div class="container page-section align-center">
      <div class="row intro-paragraph">
        <div class="col-md-12">
          <h2>Guest Feedback</h2>
        </div>
      </div>

        <div id="carouselTestimonial" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php for( $i = 0; $i < $testimonial_query->post_count; $i++ ): ?>
              <li data-target="#carouselTestimonial" data-slide-to="0" class="<?php echo ($i == 0 ? 'active' : '') ?>"></li>
            <?php endfor; ?>
          </ol>
          <div class="carousel-inner row w-75 mx-auto">
            <?php $first_iteration = true; ?>
            <?php if( $testimonial_query->have_posts() ) : while( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
              <div class="carousel-item <?php echo ($first_iteration ? 'active' : '') ?>">
                <?php $first_iteration = false; ?>
                <div class="d-block w-100">
                  <div class="card">
                    <div class="card-body">
                      <?php the_content(); ?>
                    </div>
                    <!-- Comment out
                    <div class="card-footer">
                      <h6><?php the_field('name'); ?></h6>
                    </div>
                    -->
                  </div>
                </div>
              </div>
            <?php endwhile; else : ?>
              <h4>No Quotes Available.</h4>
            <?php endif; wp_reset_postdata(); ?>
          </div>
          <a class="carousel-control-prev" href="#carouselTestimonial" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselTestimonial" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

  <!-- Handle mouse meet entries -->
  <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'pnw_mouse_meets',
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
  <div class="container page-section">
    <!-- Introduction -->
    <div class="row intro-paragraph">
      <div class="col-md-8">
        <h2>Past Events</h2>
        <p class="intro">
          We have been lucky to have some fabulous years and events! Outlines denote Disney Legends. Hover over a guest to learn more.
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
              <h1 class="card-title"><?php the_title(); ?></h1>
            </div>
            <div class="card-body">
              <p class="card-text"><?php the_field('description'); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-success">Learn More</a>
            </div>
            <div class="card-footer speaker-container">
              <?php if( have_rows('event_speakers') ): ?>
                <?php while ( have_rows('event_speakers') ) : ?>
                  <?php $guest = get_post(the_row()); ?>
                  <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $guest->ID ), 'single-post-thumbnail' ); ?>
                  <?php $speaker_legend = $guest->disney_legend ? 'legend' : ''; ?>
                  <div class="speaker-img <?php echo $speaker_legend ?>" style="background-image: url('<?php echo $speaker_image[0]; ?>')">
                    <a tabindex="0" class="speaker-btn" role="button" data-toggle="popover" data-trigger="hover" title="<?php echo get_the_title($guest->ID); ?>" data-placement="bottom" data-content="<?php echo $guest->title; ?>"></a>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

      <?php endwhile; endif; wp_reset_postdata(); ?>
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

  <!-- Mouse Meet Info -->
  <div class="grizzly-background">
    <img class="peak" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/grizzly-peak.svg">
    <div class="container page-section align-center">
      <div class="row intro-paragraph">
        <div class="col-md-12">
          <h2>Mouse Meet Info</h2>
        </div>
      </div>
      <div class="row">
        <?php if( $info_query->have_posts() ) : while( $info_query->have_posts() ) : $info_query->the_post(); ?>
          <div class="col-md-4">
            <img src="<?php the_field('info_icon'); ?>" />
            <h4><?php the_title(); ?></h4>
            <p><?php the_field('info_intro'); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
          </div>
        <?php endwhile; else : ?>
          <h4>No Information Available.</h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- Store Section -->
  <!--div class="color-background primary-light">
    <div class="container page-section">
      <div class="row">
        <div class="col-md-6">
          <h2>Find your PNW Mouse Meet Logo gear here</h2>
          <p>
            Share your Pacific Northwest Mouse Meet spirit with PNWMM Logo items at our new
            Online Store! Here you can find shirts, notebooks, phone cases, art, mugs, sweatshirts
            totes and more!
          </p>
          <p>
            A portion of all sales goes to support PNW Mouse Meet events.
          </p>
          <a class="btn btn-primary" href="https://www.teepublic.com/user/pnwmousemeet" target="_blank" rel="noopener">Visit the Store</a>
        </div>
        <div class="col-md-6">
          <img src="http://pnwmousemeet.com/wp-content/uploads/2019/04/pnwmm-logo-items-group-1.png"></img>
        </div>
      </div>
    </div>
  </div>
</main><!-- /.container -->

<?php get_footer(); ?>
