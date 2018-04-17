 <footer class="inner">
  <!-- End contact -->
  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-1">
        <a href="index.htm" class="logo"> <img alt="Tutdev" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/logo-footer.png"> </a>
        </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
             <nav id="sub-menu">
                <ul>
                   <li><a href="/about/tutorials_writing.htm">Write for us</a></li>
                   <li><a href="/about/faq.htm">FAQ's</a></li>
                   <li><a href="/about/about_helping.htm">Helping</a></li>
                   <li><a href="/about/contact_us.htm">Contact</a></li>
                </ul>
             </nav>
          </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
        <p>©
          <?php echo date('Y'); ?> <?php bloginfo( 'sitename' ); ?>. <?php _e('All rights reserved', 'tutdev'); ?>.
          <?php _e('This website is proundly to use WordPress', 'tutdev'); ?>
        </p>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
           <div class="news-group">
              <input class="form-control-foot search" name="textemail" id="textemail" autocomplete="off" placeholder="Enter email for newsletter" type="text">
              <span class="input-group-btn"> <button class="btn btn-default btn-footer" id="btnemail" type="submit">go</button> </span>
              <div id="newsresponse"></div>
           </div>
        </div>
      </div>
    </div>
  </div>
</footer>
  <?php wp_footer(); ?>
</body> <!--end body-->
</html> <!--end html -->
