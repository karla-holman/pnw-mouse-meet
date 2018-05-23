<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        Logo
      </div>
      <div class="col-md-4">
        <?php footer_nav(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        Copyright <?php echo date('Y'); ?>
      </div>
      <div class="col-md-6">
        <?php footer_secondary_nav(); ?>
      </div>
    </div>
  </div>

</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
