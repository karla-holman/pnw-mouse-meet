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
  <?php $hero = wp_get_attachment_image_src( get_the_post_thumbnail() ); ?>
  <div class="hero-full"<?php echo(!empty($hero) ? ' style="background-image: url(' . $hero . ')"' : '') ?>>
    <div class="container">
      <div class="text-overlay col-md-5">
        <div class="sparkle"></div>
        <?php if( $upcoming_query->have_posts() ) : while( $upcoming_query->have_posts() ) : $upcoming_query->the_post(); ?>
          <h1><?php the_title(); ?> Pacific Northwest Mouse Meet!</h1>
          <p><?php the_content(); ?></p>
        <?php endwhile; else : ?>
          <h1>TEST</h1>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Handle Content -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
  <?php endwhile; endif; ?>

  <!-- Handle mouse meet entries -->
  <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'pnw_mouse_meets',
      'posts_per_page' => '9',
      'meta_key' => 'event_date',
      'meta_query' => array(
          array(
              'key' => 'event_date',
              'value' => $today,
              'compare' => '<'
          )
      ),
      'orderby' => 'meta_value',
      'order' => 'ASC'
    );

    $query = new WP_Query( $args );
  ?>

  <!-- PAST EVENTS -->
  <div class="container page-section">
    <!-- Introduction -->
    <div class="row intro-paragraph">
      <div class="col-md-8 offset-md-2">
        <h2>Past Events</h2>
        <p class="intro">
          We have been lucky to have some fabulous years and events! Outlines denote Disney Legends. Hover over our guests to learn more.
        </p>
      </div>
    </div>
    <!-- Tiles -->
    <div class="row">
      <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <div class="col-md-4">
          <div class="card mouse-meet">
            <div class="card-header">
              <div class="sparkle-side"></div>
              <h1 class="card-title"><?php the_title(); ?></h1>
            </div>
            <div class="card-body">
              <p class="card-text"><?php the_content(); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-success">Learn More</a>
            </div>
          </div>
        </div>

      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</main><!-- /.container -->

<?php get_footer(); ?>
