<footer class="footer">
  <div class="container page-section">
    <div class="row">
      <div class="col-md-4">
        <img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo.png">
        <p class="small">
          This website is not part of, endorsed or authorized by, or affiliated with the Walt Disney Company or it's affiliates. Visit the official Disney website at Disney.com
        </p>
      </div>
      <div class="col-md-4 footer-links">
        <h5>Site Links</h5>
        <?php footer_nav(); ?>
      </div>
      <div class="col-md-4">
        <!-- Begin Mailchimp Signup Form -->
        <div id="mc_embed_signup">
        <form action="https://pnwmousemeet.us3.list-manage.com/subscribe/post?u=2a9af9ed852fbc16842c4631d&amp;id=15c095562c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
        	<h5>Subscribe to our mailing list</h5>
        <div class="form-group">
        	<label for="mce-EMAIL">Email Address</label>
        	<input type="email" value="" name="EMAIL" class="form-control required email" id="mce-EMAIL" required>
        </div>
        <div class="row">
          <div class="form-group col">
          	<label for="mce-FNAME">First Name </label>
          	<input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME">
          </div>
          <div class="form-group col">
          	<label for="mce-LNAME">Last Name </label>
          	<input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME">
          </div>
        </div>
        <div class="form-group input-group">
            <strong>Email Format </strong>
            <ul><li><input class="form-check-input" type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label class="form-check-label" for="mce-EMAILTYPE-0">html</label></li>
        <li><input class="form-check-input" type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label class="form-check-label" for="mce-EMAILTYPE-1">text</label></li>
        </ul>
        </div>
        	<div id="mce-responses" class="clear">
        		<div class="response" id="mce-error-response" style="display:none"></div>
        		<div class="response" id="mce-success-response" style="display:none"></div>
        	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2a9af9ed852fbc16842c4631d_15c095562c" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-info"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
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
