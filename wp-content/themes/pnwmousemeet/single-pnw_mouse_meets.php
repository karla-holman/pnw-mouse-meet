<?php get_header(); ?>

<main role="main">
  <?php global $past; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <?php $date = get_field('event_date'); ?>
    <?php $past = $date && $date < date('Ymd'); ?>
    <?php $date_object = new DateTime($date); ?>
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="row">
          <div class="text-overlay col-md-5">
            <div class="sparkle"></div>
            <div class="content">
              <h1><?php the_title(); ?> Pacific Northwest Mouse Meet!</h1>
              <?php if ( $date ) : ?>
                <p><i class="fa fa-calendar"></i> <?php echo $date_object->format('F j, Y') ?></p>
              <?php endif; ?>
              <p><i class="fa fa-map-marker"></i> <a href="<?php echo the_permalink(get_field('location')->ID) ?>"><?php echo get_the_title(get_field('location')) ?></a></p>
            </div>
            <div class="hero-buttons">
              <?php if ( $past || !get_field('ticket_link') ) : ?>

              <?php else : ?>
                <a class="btn btn-lg btn-info sparkley" href="<?php the_field('ticket_link') ?>" target="_blank">Get Tickets!</a>
              <?php endif; ?>
            </div>
          </div>
          <?php if( get_field('schedule') ) : ?>
            <div class="col-md-7">
              <div class="card">
                <div class="card-header">
                  <h3>Schedule</h3>
                </div>
                <div class="card-body">
                  <?php the_field('schedule'); ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Special CTA -->
    <div class="mid-page-cta">
      <div class="container">
        <div style="padding-bottom: 20px;" class="row d-flex justify-content-around align-content-center align-items-center">
          <?php if($past) : ?>
            <a href="#event-photos">Event Photos</a>
            <a href="#guest-speakers">Guest Speakers</a>
            <a href="#guest-responses">Guest Responses</a>
            <a href="#resources">Videos & More</a>
          <?php else : ?>
            <a href="#event-location">Event Location</a>
            <a href="#guest-speakers">Guest Speakers</a>
            <a href="#things-to-do">Things to Do</a>
            <a href="#mouse-meet-info">Mouse Meet Info</a>
            <a href="#event-hotel">Hotel Information</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if(!$past) : ?>
      <!-- Location -->
      <a name="event-location"></a>
      <?php $post_object = get_field('location'); ?>
      <?php if( $post_object ): ?>

        <?php
          // override $post
        	$post = $post_object;
        	setup_postdata( $post );
        ?>
        <div class="container page-section">
          <div class="row">
            <div class="col-md-4">
              <h6>Event Venue</h6>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php the_field('overview'); ?></p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>">More Information</a>
              <a class="btn btn-info" href="<?php the_field('directions_link'); ?>" target="_blank">Directions</a>
            </div>

            <!-- Map -->
            <div class="col-md-4">
                <div class="fill-image" style="background-image: url('<?php echo the_field('map'); ?>')"></div>
            </div>

            <!-- Image -->
            <div class="col-md-4">
                <div class="fill-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            </div>
          </div><!-- row -->
        </div>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p><?php esc_html_e( 'Oops! No Location Found.' ); ?></p>
      <?php endif; ?><!-- END Location -->
    <?php else : ?>
      <!-- Image Gallery -->
      <div class="container page-section align-center">
        <div class="row">
          <div class="col-md-12">
            <h2>Photos From the Event</h2>
            <p class="intro_text">Check out some highlights from the event or view more on our SmugMug Gallery!</p>
            <a href="<?php the_field('external_photo_gallery'); ?>" class="btn btn-info" style="margin-bottom: 40px;" target="_blank">View More</a>

            <?php the_field('photo_gallery'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Guest Speakers -->
    <a name="guest-speakers"></a>
    <div class="wheel-background">
      <img class="wheel" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/wheel.svg">
      <div class="container page-section align-center">
        <div class="row intro-paragraph">
          <div class="col-md-12">
            <h2>Guest Speakers</h2>
          </div>
        </div>
        <div class="row">
          <!-- Speaker 1 -->
          <?php $speaker_one = get_field('speaker_one'); ?>


          <?php if($speaker_one) : ?>
            <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $speaker_one->ID ), 'single-post-thumbnail' ); ?>
            <?php $speaker_legend = $speaker_one->disney_legend ? 'legend' : ''; ?>

            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo get_the_title($speaker_one); ?></h5>
                  <p class="card-text"><?php echo $speaker_one->title; ?></p>
                  <a href="<?php the_permalink($speaker_one->ID); ?>" class="btn btn-info">Learn More</a>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title">Coming Soon</h5>
                  <p class="card-text">Guest Speakers will be announced soon.</p>
                  <a href="<?php the_permalink($speaker_one->ID); ?>" class="btn btn-info disabled">Learn More</a>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Speaker 2 -->
          <?php $speaker_two = get_field('speaker_two'); ?>
          <?php if($speaker_two) : ?>
            <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $speaker_two->ID ), 'single-post-thumbnail' ); ?>
            <?php $speaker_legend = $speaker_two->disney_legend ? 'legend' : ''; ?>

            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo get_the_title($speaker_two); ?></h5>
                  <p class="card-text"><?php echo $speaker_two->title; ?></p>
                  <a href="<?php the_permalink($speaker_two->ID); ?>" class="btn btn-info">Learn More</a>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title">Coming Soon</h5>
                  <p class="card-text">Guest Speakers will be announced soon.</p>
                  <a href="<?php the_permalink($speaker_one->ID); ?>" class="btn btn-info disabled">Learn More</a>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Speaker 3 -->
          <?php $speaker_three = get_field('speaker_three'); ?>
          <?php if($speaker_one) : ?>
            <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $speaker_three->ID ), 'single-post-thumbnail' ); ?>
            <?php $speaker_legend = $speaker_three->disney_legend ? 'legend' : ''; ?>

            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo get_the_title($speaker_three); ?></h5>
                  <p class="card-text"><?php echo $speaker_three->title; ?></p>
                  <a href="<?php the_permalink($speaker_three->ID); ?>" class="btn btn-info">Learn More</a>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title">Coming Soon</h5>
                  <p class="card-text">Guest Speakers will be announced soon.</p>
                  <a href="<?php the_permalink($speaker_one->ID); ?>" class="btn btn-info disabled">Learn More</a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div> <!-- End Speakers -->

    <!-- Things to Do -->
    <a name="things-to-do"></a>
    <?php if ( !$past ): ?>
      <?php
        $args = array(
          'post_type' => 'things_to_do',
          'orderby' => 'meta_value',
          'order' => 'ASC'
        );

        $query = new WP_Query( $args );
      ?>
      <div class="container page-section">
        <div class="row intro-paragraph">
          <div class="col-md-12">
            <h2>Things to Do</h2>
            <p class="intro">So many things happening at the Mouse Meet. What will you do first?</p>
          </div>
        </div>
        <!-- Tiles -->
        <div class="row d-flex justify-content-around">
          <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

            <div class="to-do col-md-3">
              <div class="to-do-icon d-flex justify-content-center align-items-center">
                <img class="logo-image" src="<?php echo get_the_post_thumbnail_url(); ?>" />
              </div>
              <h4><?php the_title(); ?></h4>
              <p><?php the_content(); ?>
            </div>

          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    <?php else : ?>
      Nothing
    <?php endif; ?>

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
    <a name="mouse-meet-info"></a>
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
              <a href="<?php the_field('info_link'); ?>" class="btn btn-primary">Learn More</a>
            </div>
          <?php endwhile; else : ?>
            <h4>No Information Available.</h4>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>

    <!-- Location -->
    <a name="event-hotel"></a>
    <?php $post_object = get_field('hotel'); ?>
    <?php if( $post_object ): ?>

      <?php
        // override $post
      	$post = $post_object;
      	setup_postdata( $post );
      ?>
      <div class="container page-section">
        <div class="row">
          <div class="col-md-4">
            <h6>Where to Stay</h6>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_field('overview'); ?></p>
            <a class="btn btn-primary" href="<?php the_permalink(); ?>">More Information</a>
            <a class="btn btn-info" href="<?php the_field('directions_link'); ?>" target="_blank">Directions</a>
          </div>

          <!-- Map -->
          <div class="col-md-4">
              <div class="fill-image" style="background-image: url('<?php echo the_field('map'); ?>')"></div>
          </div>

          <!-- Image -->
          <div class="col-md-4">
              <div class="fill-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
          </div>
        </div><!-- row -->
      </div>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p><?php esc_html_e( 'Oops! No Location Found.' ); ?></p>
    <?php endif; ?><!-- END Location -->


  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Oops! No Meet Found.' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
