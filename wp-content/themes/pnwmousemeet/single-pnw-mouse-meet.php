<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container">
      <div class="row">
        <!-- Side bar -->
        <div class="col-md-4">
          <h2><?php the_title(); ?></h2>
          <hr>
          <p><?php the_field('description'); ?></p>
          <hr>
          <p>
            <?php (empty(previous_post_link())) ? '<<' : previous_post_link('%link', '<<'); ?> -
            <?php (empty(next_post_link())) ? '>>' : next_post_link('%link', '>>'); ?>
          </p>
        </div>

        <!-- Main Images -->
        <div class="col-md-8">
            <?php the_field('images'); ?>
        </div><!-- col -->
      </div><!-- row -->
    </div>
  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
