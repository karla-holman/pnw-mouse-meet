<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo.png">
        <p class="small">
          This website is not part of, endorsed or authorized by, or affiliated with the Walt Disney Company or it's affiliates. Visit the official Disney website at Disney.com
        </p>
      </div>
      <div class="col-md-4 footer-links">
        <h5>Events & Partnerships</h5>
        <?php footer_nav(); ?>
      </div>
      <div class="col-md-4">
        <h5>Newsletter Signup</h5>
        <?php echo do_shortcode('[wpforms id="21" title="false" description="false"]');?>
      </div>
    </div>
  </div>
  <div class="footer-secondary d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-between flex-wrap">
        <div>
          &copy; <?php echo date('Y'); ?> Pacific Northwest Mouse Meet.
        </div>
        <div>
          <?php footer_secondary_nav(); ?>
        </div>
      </div>
    </div>
  </div>

</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
-->

<?php wp_footer(); ?>
</body>
</html>
