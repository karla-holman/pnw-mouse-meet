<?php get_header(); ?>

<main role="main">
  <?php global $past; ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <?php $date = get_field('event_date'); ?>
    <?php $format = "m/d/Y"; ?>
    <?php $date_object = DateTime::createFromFormat($format, $date); ?>
    <?php $past = $date && $date_object < new DateTime('now'); ?>
    <?php $ticket_info = get_field('ticket_info'); ?>
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="row">
          <div class="text-overlay col-md-5">
            <div class="sparkle"></div>
            <div class="content">
              <h1><?php the_title(); ?></h1>
              <?php if ( $date ) : ?>
                <p><i class="fa fa-calendar"></i> <?php echo $date_object->format('F j, Y') ?></p>
              <?php endif; ?>
              <p><i class="fa fa-map-marker"></i> <a href="<?php echo the_permalink(get_field('location')->ID) ?>"><?php echo get_the_title(get_field('location')) ?></a></p>
            </div>
            <div class="hero-buttons">
              <?php if ( $past || !$ticket_info['ticket_text'] ) : ?>

              <?php else : ?>
                <a class="btn btn-lg btn-info sparkley" href="#get-tickets">Get Tickets!</a>
              <?php endif; ?>
            </div>
          </div>
          <?php if( get_field('schedule') ) : ?>
            <div class="col-md-7">
              <div class="card">
                <div class="card-header">
                  <h3>Details</h3>
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
          <a href="#description">Description</a>
          <?php if( have_rows('event_speakers') ): ?>
            <a href="#guest-speakers">Guest Speakers</a>
          <?php endif; ?>
          <?php if( have_rows('resources') ): ?>
            <a href="#resources">Books & More</a>
          <?php endif; ?>
          <a href="#event-location">Event Location</a>
        </div>
      </div>
    </div>


    <!-- The Content -->
    <a name="description"></a>
    <?php if( get_the_content() ): ?>
      <div class="color-background success">
        <div class="container page-section">
          <div class="row">
            <div class="card mouse-meet">
              <div class="card-header">
                <h3>Event Information</h3>
              </div>
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
    <?php if( have_rows('event_speakers') ): ?>
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
            <!-- Guest Speakers -->
            <?php while ( have_rows('event_speakers') ) : ?>
              <?php $guest = get_post(the_row()); ?>
              <?php $speaker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $guest->ID ), 'single-post-thumbnail' ); ?>
              <?php $speaker_legend = $guest->disney_legend ? 'legend' : ''; ?>
              <div class="col-md-4">
                <div class="card event-card">
                  <div class="main-image" style="background-image: url('<?php echo $speaker_image[0]; ?>')"></div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo get_the_title($guest); ?></h5>
                    <p class="card-text"><?php echo $guest->title; ?></p>
                    <a href="<?php the_permalink($guest->ID); ?>" class="btn btn-info">Learn More</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div><!-- Row -->
        </div><!-- Container -->
      </div> <!-- End Speakers -->
    <?php endif; ?>

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
            <?php if( get_field('link_external') ): ?>
              <h2><a href="<?php the_field('link_external') ?>"><?php the_title(); ?></a></h2>
            <? else: ?>
              <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <? endif; ?>
            <p><?php the_field('overview'); ?></p>
            <?php if( get_field('link_external') ): ?>
              <a class="btn btn-primary" href="<?php the_field('link_external') ?>">More Information</a>
            <? else: ?>
              <a class="btn btn-primary" href="<?php the_permalink() ?>">More Information</a>
            <? endif; ?>
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

    <!-- Resources -->
    <?php if( have_rows('resources') ): ?>
      <a name="resources"></a>
      <div class="color-background primary-light">
        <div class="container page-section align-center">
          <div class="row intro-paragraph">
            <div class="col-md-12">
              <h2>Books & More</h2>
              <p class="intro_text"><?php the_field('resource_intro'); ?>
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
      </div>
    <?php endif; ?>

  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Oops! No Meet Found.' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
