<?php get_header(); ?>

<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1>Bootstrap starter template</h1>
      <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </div>
  </section>

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
