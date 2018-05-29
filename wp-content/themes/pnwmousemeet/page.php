<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $hero = wp_get_attachment_image_src( get_the_post_thumbnail() ); ?>
    <?php echo $hero ?>
    <div class="hero-full"<?php echo(!empty($hero) ? ' style="background-image: url(' . $hero . ')"' : '') ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
          <p>There would be a paragraph here</p>
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
  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no pages matched your criteria.' ); ?></p>
  <?php endif; ?>

</main><!-- /.container -->

<?php get_footer(); ?>
