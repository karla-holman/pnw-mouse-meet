<?php
  /*
    Template Name: Home
  */
 ?>

 <?php get_header(); ?>

 <?php // Get Mouse Meet Popover
   $mouse_meet_html = "";
   $today = date('Ymd');
   $args = array(
     'post_type' => 'pnw_mouse_meets',
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

   if( $upcoming_query->have_posts() ) : while( $upcoming_query->have_posts() ) : $upcoming_query->the_post();
     $title = get_the_title();
     $date = get_field('event_date');
     $link = get_permalink();
     $date = new DateTime($date);
     $mouse_meet_html .= "<h5>" . $title . " Pacific Northwest Mouse Meet!</h5>";
     $mouse_meet_html .= "<p><i class=\"fa fa-calendar\"></i> " . $date->format('F j, Y') . "</p>";
     $mouse_meet_html .= "<p><a href=\"" . $link . "\" class=\"btn btn-info\">Learn More</a></p>";
   endwhile; else :
     $mouse_meet_html .= "No Mouse Meets Upcoming";
   endif;
 ?>

 <main role="main">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

     <!-- Hero -->
     <div class="hero full hero-video d-flex align-content-center"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
       <div class="container d-flex align-content-center">
         <div class="text-overlay col-lg-5 col-md-12 col-sm-12">
           <div class="content">
             <h1><?php the_title(); ?></h1>
             <p class="intro">Connect with Other Disney Fans</p>
             <p><?php the_field('hero_text'); ?></p>
           </div>
           <div class="hero-buttons">
            <a href="<?php the_field('hero_button_left_link'); ?>" target="_blank" class="btn btn-lg btn-info sparkley"><?php the_field('hero_button_left_label') ?></a>
            <?php
              $right_label = get_field('hero_button_right_label');
              $right_link = get_field('hero_button_right_link');

              if(!empty($right_label) && !empty($right_link)) :
            ?>
              <a href="<?php the_field('hero_button_right_link'); ?>" target="_blank" class="btn btn-lg btn-info"><?php the_field('hero_button_right_label') ?></a>
            <?php endif; ?>
           </div>
           <div class="sparkle"></div>
         </div>
       </div>
     </div>

     <!-- Special CTA -->
     <div class="mid-page-cta">
      <div class="container">
        <div class="row d-flex justify-content-between align-content-center">
          <p><?php the_field('cta_text'); ?></p>
          <a href="<?php the_field('cta_link'); ?>"><?php the_field('cta_label'); ?> <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

     <!-- Events -->
     <div class="container page-section">
        <!-- Introduction -->
        <div class="row intro-paragraph">
         <div class="col-md-8 offset-md-2">
           <h2>Mouse Meet Events</h2>
           <p class="intro">
             We have been lucky to have some fabulous years and events! Outlines denote Disney Legends. Hover over our guests to learn more.
           </p>
         </div>
        </div>
        <!-- Tiles -->
        <div class="row">
          <div class="col-md-4">
            <div class="card event-card">
              <div class="main-image" style="background-image: url('<?php echo the_field('pnw_mouse_meet_main_image'); ?>')"></div>
              <div class="card-body">
                <h5 class="card-title">PNW Mouse Meets</h5>
                <p class="card-text"><?php the_field('pnw_mouse_meet_description'); ?></p>
                <a href="<?php the_field('pnw_mouse_meet_link'); ?>" class="btn btn-info">Learn More</a>
                <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" id="pnw-mouse-meet">
                  Upcoming Events
                </button>
              </div>
              <div id="popover-content-pnw-mouse-meet" class="d-none">
                  <?php echo $mouse_meet_html ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card event-card">
              <div class="main-image" style="background-image: url('<?php echo the_field('mini_meet_ups_image'); ?>')"></div>
              <div class="card-body">
                <h5 class="card-title">Mini Meet Ups</h5>
                <p class="card-text"><?php the_field('mini_meet_ups_description'); ?></p>
                <a href="<?php the_field('mini_meet_ups_link'); ?>" class="btn btn-info">Learn More</a>
                <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" id="mini-meet-ups">
                  Upcoming Events
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card event-card">
              <div class="main-image" style="background-image: url('<?php echo the_field('pnw_mouse_trek_image'); ?>')"></div>
              <div class="card-body">
                <h5 class="card-title">PNW Mouse Treks</h5>
                <p class="card-text"><?php the_field('pnw_mouse_treks_description'); ?></p>
                <a href="<?php the_field('pnw_mouse_trek_link'); ?>" class="btn btn-info">Learn More</a>
                <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" id="pnw-mouse-treks">
                  Upcoming Events
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

     <!-- About Us -->
     <div class="wheel-background">
       <img class="wheel" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/wheel.svg">
       <div class="container">
         <div class="row d-flex align-content-center">
           <div class="col-md-9 offset-md-3 about-card card">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-6 text-area">
                   <h2>About Us</h2>
                   <p>
                     <?php the_field('about_us_text'); ?>
                   </p>
                   <a href="<?php the_field('about_us_page'); ?>" class="btn btn-info btn-float">Learn More</a>
                 </div>
                 <div class="col-md-6 card-img-bottom" style="background-image: url(<?php echo the_field('about_us_image'); ?>)">

                 </div>
              </div>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Sponsors -->
     <?php
       $args = array(
         'post_type' => 'sponsors',
         'posts_per_page' => '8',
         'orderby' => 'sponsor_level',
         'order' => 'ASC'
       );
       $query = new WP_Query( $args );
      ?>
      <!-- PAST EVENTS -->
      <div class="container page-section">
        <!-- Introduction -->
        <div class="row intro-paragraph">
          <div class="col-md-8 offset-md-2">
            <h2>Our Sponsors</h2>
            <p class="intro">
              We have been lucky to have some fabulous years and events! Outlines denote Disney Legends. Hover over our guests to learn more.
            </p>
          </div>
        </div>
        <!-- Tiles -->
        <div class="row d-flex justify-content-around">
          <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

            <div class="sponsor">
              <div class="sponsor-logo d-flex justify-content-center align-items-center">
                <?php
                  $field = get_field_object('sponsor_level');
                  $value = $field['value'];
                  $sponsor_file = ($value == 'diamond') ? 'diamond.svg' : 'platinum.svg';
                ?>
                <div class="sponsor-icon d-flex justify-content-center align-items-center <?php echo $value ?>">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/sponsors/<?php echo $sponsor_file ?>" />
                </div>
                <img class="logo-image" src="<?php the_field('logo'); ?>" />
              </div>
              <h4><a href="<?php the_field('site_link'); ?>" target="_blank"><?php the_title(); ?></a></h4>
              <p class="intro"><?php echo $field['choices'][ $value ]; ?></p>
            </div>

          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
   <?php endwhile; else : ?>
     <p><?php esc_html_e( 'Sorry, no pages matched your criteria.' ); ?></p>
   <?php endif; ?>

 </main><!-- /.container -->

 <?php get_footer(); ?>
