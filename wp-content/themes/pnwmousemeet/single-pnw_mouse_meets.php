<?php get_header(); ?>

<main role="main">
  <?php global $past; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <?php $date = get_field('event_date'); ?>
    <?php $past = $date && $date < date('Ymd'); ?>
    <?php $date_object = new DateTime($date); ?>
    <?php $ticket_info = get_field('ticket_info'); ?>
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="row">
          <div class="text-overlay col-md-5">
            <div class="sparkle"></div>
            <div class="content">
              <h1><?php the_title(); ?><br>Pacific Northwest Mouse Meet!</h1>
              <?php if ( $date ) : ?>
                <p><i class="fa fa-calendar"></i> <?php echo $date_object->format('F j, Y') ?></p>
              <?php endif; ?>
              <p><i class="fa fa-map-marker"></i> <a href="<?php echo the_permalink(get_field('location')->ID) ?>"><?php echo get_the_title(get_field('location')) ?></a></p>
            </div>
            <div class="hero-buttons">
              <?php if ( $past ) : ?>

              <?php elseif (!$ticket_info['ticket_text']) : ?>
                <a class="btn btn-lg btn-info sparkley disabled">Tickets Coming Soon!</a>
              <?php else : ?>
                <a class="btn btn-lg btn-info sparkley" href="#get-tickets">Get Tickets!</a>
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
            <a href="#mini-meets">Related Events</a>
            <?php if( have_rows('resources') ): ?>
              <a href="#resources">Videos & More</a>
            <?php endif; ?>
          <?php else : ?>
            <a href="#event-location">Event Location</a>
            <a href="#guest-speakers">Guest Speakers</a>
            <a href="#mini-meets">Related Events</a>
            <a href="#things-to-do">Things to Do</a>
            <a href="#mouse-meet-info">Mouse Meet Info</a>
            <a href="#event-hotel">Hotel Information</a>
          <?php endif; ?>
        </div>
      </div>
    </div>


    <!-- The Content -->
    <?php if( get_the_content() ): ?>
      <div class="color-background success">
        <div class="container page-section">
          <div class="row">
            <div class="card mouse-meet">
              <div class="card-body">
                <?php the_content() ?>
              </div>
            </div>
          </div><!-- row -->
        </div>
      </div>
    <?php endif; ?>


    <?php if(!$past) : ?>
      <!-- Tickets -->
      <a name="get-tickets"></a>
      <?php if( $ticket_info['ticket_text'] || $ticket_info['ticket_code'] ): ?>
        <div class="container page-section">
          <div class="row">
            <div class="col-md-8">
              <div class="card mouse-meet">
                <div class="card-header">
                  <div class="sparkle-side"></div>
                  <h1 class="card-title">Ticket Information</h1>
                </div>
                <div class="card-body">
                  <p class="card-text"><?php echo $ticket_info['ticket_text'] ?></p>
                </div>
              </div>
            </div>

            <!-- Map -->
            <div class="col-md-4">
              <div class="card mouse-meet">
                <div class="card-header">
                  <div class="sparkle-side"></div>
                  <h1 class="card-title">Buy Tickets</h1>
                </div>
                <div class="card-body">
                  <p class="card-text"><?php echo $ticket_info['ticket_code'] ?></p>
                </div>
              </div>
            </div>
          </div><!-- row -->
        </div>
      <?php endif; ?>

      <!-- Location -->
      <a name="event-hotel"></a>
      <?php $post_object = get_field('hotel'); ?>
      <?php if( $post_object ): ?>

        <?php
          // override $post
        	$post = $post_object;
        	setup_postdata( $post );
        ?>
        <div class="container page-section" style="border-bottom: 1px solid #016E73">
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
      <?php $past_gallery = get_field('past_gallery'); ?>
      <?php if( $past_gallery['external_photo_gallery'] || $past_gallery['photo_gallery'] ): ?>
        <a name="event-photos"></a>
        <div class="container page-section align-center">
          <div class="row">
            <div class="col-md-12">
              <h2>Photos From the Event</h2>
              <p class="intro_text">Check out some highlights from the event or view more on our external gallery!</p>
              <a href="<?php echo $past_gallery['external_photo_gallery']; ?>" class="btn btn-info" style="margin-bottom: 40px;" target="_blank">View More</a>

              <?php echo $past_gallery['photo_gallery']; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <!-- Guest Speakers -->
    <a name="guest-speakers"></a>
    <?php
      if($past) {
        $background = get_stylesheet_directory_uri() . '/dist/images/wheel.svg';
        $class = 'wheel-background';
        $imgClass = 'wheel';
      }
      else {
        $background = get_stylesheet_directory_uri() . '/dist/images/space-mountain.svg';
        $class = 'grizzly-background';
        $imgClass = 'peak';
      }
    ?>
    <div class="<?php echo $class; ?>">
      <img class="<?php echo $imgClass; ?>" src="<?php echo $background; ?>">
      <div class="container page-section align-center">
        <div class="row intro-paragraph">
          <div class="col-md-12">
            <h2>Guest Speakers</h2>
          </div>
        </div>
        <div class="row">
          <!-- Guest Speakers -->
          <?php if( have_rows('event_speakers') ): ?>
            <?php while ( have_rows('event_speakers') ) : ?>
              <?php $guest = get_post(the_row()); ?>
              <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $guest->ID ), 'single-post-thumbnail' ); ?>
              <?php $speaker_legend = $guest->disney_legend ? 'legend' : ''; ?>
              <?php $speaker_link = $guest->replacement_link ? $guest->replacement_link : get_permalink($guest->ID); ?>
              <div class="col-md-4">
                <div class="card event-card">
                  <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo get_the_title($guest); ?></h5>
                    <p class="card-text"><?php echo $guest->title; ?></p>
                    <a href="<?php echo $speaker_link; ?>" class="btn btn-info">Learn More</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo the_field('speaker_placeholder'); ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title">Coming Soon</h5>
                  <p class="card-text">Guest Speakers will be announced soon.</p>
                  <a href="<?php the_permalink($speaker_one->ID); ?>" class="btn btn-info disabled">Learn More</a>
                </div>
              </div>
            </div>
            <?php if( get_field('early_link') ): ?>
              <div class="col-md-4">
                <a href="<?php the_field('early_link') ?>"><img src="<?php the_field('early_img') ?>" style="max-width: 100px;"></a>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div><!-- Row -->
      </div><!-- Container -->
    </div> <!-- End Speakers -->

    <!-- Related Mini Meets -->
    <?php if( have_rows('mini_meets') ): ?>
    <a name="mini-meets"></a>
    <div class="color-background primary">
      <div class="container page-section align-center">
        <div class="row intro-paragraph">
          <div class="col-md-12">
            <h2>Other Related Events</h2>
          </div>
        </div>
        <div class="row">
          <?php while ( have_rows('mini_meets') ) : ?>
            <?php $meet_up = get_post(the_row()); ?>
            <?php $meet_up_image = wp_get_attachment_image_src( get_post_thumbnail_id( $meet_up->ID ), 'single-post-thumbnail' ); ?>
            <div class="col-md-4">
              <div class="card event-card">
                <div class="main-image" style="background-image: url('<?php echo $meet_up_image[0]; ?>')"></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo get_the_title($meet_up); ?></h5>
                  <p class="card-text"><?php echo $meet_up->description; ?></p>
                  <a href="<?php the_permalink($meet_up->ID); ?>" class="btn btn-info">Learn More</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div><!-- Row -->
      </div><!-- Container -->
    </div> <!-- End Meet Ups -->
    <?php endif; ?>

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
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
              </div>
            <?php endwhile; else : ?>
              <h4>No Information Available.</h4>
            <?php endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    <?php else : ?>

      <!-- Resources -->
      <?php if( have_rows('resources') ): ?>
        <a name="resources"></a>
        <div class="container page-section align-center">
          <div class="row intro-paragraph">
            <div class="col-md-12">
              <h2>Videos & More</h2>
            </div>
          </div>
          <div class="row">
            <!-- Resources -->
              <?php while ( have_rows('resources') ) : ?>
                <?php $resource = get_post(the_row()); ?>
                <?php $resource_image = wp_get_attachment_image_src( get_post_thumbnail_id( $resource->ID ), 'single-post-thumbnail' ); ?>
                <div class="col-md-4">
                  <div class="card resource-card">
                    <?php if($resource->video_embed): ?>
                      <div class="main-image">
                        <?php echo $resource->video_embed ?>
                      </div>
                    <?php else: ?>
                      <div class="main-image" style="background-image: url('<?php echo $resource_image[0]; ?>')"></div>
                    <?php endif; ?>
                    <div class="card-body">
                      <!-- Header -->
                      <?php if($resource->external_link): ?>
                        <h5 class="card-title"><a href="<?php echo $resource->external_link ?>"><?php echo get_the_title($resource); ?></a></h5>
                      <?php elseif($resource->file_upload): ?>
                        <h5 class="card-title"><a target="_blank" href="<?php echo wp_get_attachment_url( $resource->file_upload ) ?>"><?php echo get_the_title($resource); ?></a></h5>
                      <?php else: ?>
                        <h5 class="card-title"><?php echo get_the_title($resource); ?></h5>
                      <?php endif; ?>

                      <!-- Content -->
                      <?php if (get_post_field('post_content', $resource->ID)): ?>
                        <p><?php echo get_post_field('post_content', $resource->ID);?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          </div><!-- Row -->
        </div><!-- Container -->
      <?php endif; ?>
    <?php endif; ?>
  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Oops! No Meet Found.' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
