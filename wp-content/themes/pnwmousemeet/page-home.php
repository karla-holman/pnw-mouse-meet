<?php
  /*
    Template Name: Home
  */
 ?>

 <?php get_header(); ?>

 <main role="main">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

     <!-- Hero -->
     <?php $hero = wp_get_attachment_image_src( get_the_post_thumbnail() ); ?>
     <?php echo $hero ?>
     <div class="hero-full d-flex align-content-center"<?php echo(!empty($hero) ? ' style="background-image: url(' . $hero . ')"' : '') ?>>
       <div class="container d-flex align-content-center">
         <div class="text-overlay col-lg-5 col-md-12 col-sm-12">
           <div class="content">
             <h1><?php the_title(); ?></h1>
             <p class="intro">Connect with Other Disney Fans</p>
             <p><?php the_field('hero_text'); ?></p>
           </div>
           <div class="hero-buttons">
            <a href="<?php the_field('hero_button_left_link'); ?>" target="_blank" class="btn btn-lg btn-info"><?php the_field('hero_button_left_label') ?></a>
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


     <div class="container">
       <div class="row">
         <div class="col-md-12">

             <p><?php the_content(); ?></p>

         </div><!-- col -->
       </div><!-- row -->
     </div>

     <!-- Events -->

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
