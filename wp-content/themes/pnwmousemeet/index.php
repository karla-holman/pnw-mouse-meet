<?php get_header(); ?>

<main role="main">
  <?php $hero = the_post_thumbnail(); ?>
  <div class="hero-full"<?php echo(!empty($hero) ? ' style="background-image: url(' . $hero . ')"' : '') ?>>
    <div class="container">
      <div class="text-overlay">
        <div class="sparkle"></div>
        <h1>Title Goes Here</h1>
        <p>There would be a paragraph here</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php the_title(); ?></h1>
          <p><?php the_content(); ?></p>


        <?php endwhile; else : ?>
          <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </div><!-- col -->
    </div><!-- row -->
  </div>


</main><!-- /.container -->

<?php get_footer(); ?>
