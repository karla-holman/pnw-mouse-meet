<?php get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Hero -->
    <div class="hero full"<?php echo(has_post_thumbnail() ? ' style="background-position: top right; background-image: url(' . get_the_post_thumbnail_url() . ')"' : ''); ?>>
      <div class="container">
        <div class="text-overlay col-md-5">
          <div class="sparkle"></div>
          <h1><?php the_title(); ?></h1>
          <p><?php the_field('title'); ?></p>
        </div>
      </div>
    </div>

    <div class="container page-section">
      <div class="row">
        <!-- Left Side Bar -->
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Introduction</h5>
              <p><?php the_field('introduction'); ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <!-- Resources -->
    <?php if( have_rows('resources') ): ?>
      <a name="resources"></a>
      <div class="color-background primary-light">
        <div class="container page-section align-center">
          <div class="row intro-paragraph">
            <div class="col-md-12">
              <h2>Videos, Books & More</h2>
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
                        <h5 class="card-title"><a href="<?php echo $resource->external_link ?>" target="_blank"><?php echo get_the_title($resource); ?></a></h5>
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
