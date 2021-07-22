<?php //$categories = $this->project_category_model->getCategories($num=4);?>
 <!-- Start Site Footer -->
  <footer class="site-footer">
      <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Latest News</h3>
                  <ul>
                      <li>
                          <a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                          <span class="meta-data">1 March, 2014</span>
                      </li>
                      <li>
                      <a href="blog-post.html">Lorem ipsum dolor sit amet elit, consectetur adipiscing.</a>
                          <span class="meta-data">28 February, 2014</span>
                      </li>
                      <li>
                      <a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                          <span class="meta-data">26 February, 2014</span>
                      </li>
                  </ul>
              </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Quick Links</h3>
               <ul>
                <li><a href="submit.html">Sell with us</a></li>
                <li><a href="login.html">View All Properties</a></li>
                <li><a href="pricing.html">Top Location Properties</a></li>
                <li><a href="about.html">About us</a></li>
               
               </ul>
           </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
              <h3 class="widgettitle">Facebook Fanpage</h3>
                  <ul class="twitter-widget"></ul>
           </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Our Newsletter</h3>
                <?php echo ($this->settings_model->getStaticContent('footer_text_one')) ?>
                <form method="post" id="newsletterform" name="newsletterform" class="newsletter-form" action="mail/newsletter.php">
                    <input type="email" name="nl-email" id="nl-email" placeholder="Enter your email" class="form-control">
                    <input type="submit" name="nl-submit" id="nl-submit" class="btn btn-primary btn-block btn-lg" value="Subscribe">
                </form>
                <div class="clearfix"></div>
                <div id="nl-message"></div>
           </div>
       </div>
   </div>
  </footer>
  <footer class="site-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="copyrights-col-left col-md-6 col-sm-6">
          <p>&copy; <?php echo ($this->settings_model->getStaticContent('footer_text_two')) ?></p>
        </div>
        <div class="copyrights-col-right col-md-6 col-sm-6">
          <div class="social-icons">
              <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
             <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
             <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
             <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
             <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-youtube"></i></a>
             <a href="#"><i class="fa fa-rss"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Site Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="<?php echo base_url()?>assets/plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="<?php echo base_url()?>assets/plugins/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel --> 
<script src="<?php echo base_url()?>assets/plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="<?php echo base_url()?>assets/js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script> <!-- UI --> 
<script src="<?php echo base_url()?>assets/js/waypoints.js"></script> <!-- Waypoints --> 
<script src="<?php echo base_url()?>assets/js/init.js"></script> <!-- All Scripts -->
<!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
</body>
</html>







































   