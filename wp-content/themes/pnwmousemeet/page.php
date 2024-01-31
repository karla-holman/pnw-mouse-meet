<?php get_header(); ?>
<?php $ticket_info = get_field('ticket_info'); ?>
<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="hero"<?php echo(has_post_thumbnail() ? ' style="background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
          <?php if(get_field('hero_text')) : ?>
            <p><?php the_field('hero_text') ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="container page-section">
      <div class="row">
        <div class="col-md-12">

            <p><?php the_content(); ?></p>
            <a name="get-tickets"></a>
            <?php if( $ticket_info && ($ticket_info['ticket_text'] || $ticket_info['ticket_code'] )): ?>
              <!--div class="container page-section">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mouse-meet">
                      <div class="card-header">
                        <div class="sparkle-side"></div>
                        <h1 class="card-title">Ticket Information</h1>
                      </div>
                      <div class="card-body">
                        <p class="card-text"><?php echo $ticket_info['ticket_text'] ?></p>
                      </div>
                    </div>
                  </div-->

                  <!-- Map -->
                  <div class="col-md-12">
                    <div class="card mouse-meet">
                      <div class="card-header">
                        <div class="sparkle-side"></div>
                        <h1 class="card-title">Buy Tickets</h1>
                      </div>
                      <div class="card-body">
                        <p class="card-text"><?php echo $ticket_info['ticket_text'] ?></p>
                        <p class="card-text"><?php echo $ticket_info['ticket_code'] ?></p>
                      </div>
                    </div>
                  </div>
                <!--/div>
              </div-->
            <?php endif; ?>
        </div><!-- col -->
      </div><!-- row -->
    </div>
  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no pages matched your criteria.' ); ?></p>
  <?php endif; ?>

</main><!-- /.container -->

<?php get_footer(); ?>
