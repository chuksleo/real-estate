<?php //$categories = $this->project_category_model->getCategories($num=4);?>
 <!-- Start Site Footer -->
  <footer class="site-footer">
      <div class="container">
          <div class="row">
            <!-- <div class="col-md-3 col-sm-6 footer-widget widget">
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
              </div> -->
            <div id="footmenu" class="col-md-4 col-sm-6 footer-widget widget ">
                <h3 class="widgettitle newcolor">Quick Links</h3>
               <ul class="newcolor">
                <li><a href="<?php echo base_url() ?>property/add">Sell with us</a></li>
                <li><a href="<?php echo base_url() ?>all-properties">View All Properties</a></li>
                <li><a href="<?php echo base_url() ?>properties/popular">Popular Properties</a></li>
                <li><a href="<?php echo base_url() ?>about-us">About us</a></li>
               
               </ul>
           </div>
            <div class="col-md-4 col-sm-6 footer-widget widget">
              <h3 class="widgettitle newcolor">Facebook Fanpage</h3>
                  <ul class="twitter-widget"></ul>
           </div>
            <div id="footmenu" class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle newcolor">Our Newsletter</h3>
                <?php echo ($this->settings_model->getStaticContent('footer_text_one')) ?>
                <div id="submessage_footer"></div>
               
                    <input type="email" name="nl-email" id="email-address" placeholder="Enter your email" class="form-control">
                    <button id="subtn" class="btn-primary btn-block btn-lg" onclick="subscribe_bottom()">Subscribe</button>
                    
               
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
<script src="<?php echo base_url()?>assets/js/init.js"></script> 
<!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]-->
</body>
</html>







































   