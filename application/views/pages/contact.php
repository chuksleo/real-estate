



<div class="site-showcase"> 
    <!-- Start Page Header -->
    <div class="parallax page-header" id="contact-map">
         <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=100%20king%20street%20west,%20suite%205700%20Toronto,%20ON%20M5x%201c7&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <!-- End Page Header --> 
  </div>
 











 <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="page">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <h3>Get in Touch</h3>
              <p>Please fill out this form as our online representive will answer any questions you have</p>
              <div class="row">
              <div id="contact_rmessage"></div>
                <form id="contactform" name="contactform" class="contact-form" >
                  <div class="col-md-6 margin-15">
                    <div class="form-group">
                      <input type="text" id="contact_fname" name="name"  class="form-control input-lg" placeholder="Name*">
                    </div>
                    <div class="form-group">
                      <input type="email" id="contact_email" name="email"  class="form-control input-lg" placeholder="Email*">
                    </div>
                    <div class="form-group">
                      <input type="text" id="contact_phone" name="phone" class="form-control input-lg" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea cols="6" rows="5" id="contact_message" name="comments" class="form-control input-lg" placeholder="Message"></textarea>
                      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="contact_us()"> Send Message</button>
                      
                    </div>
                  </div>
                </form>
              </div>
              <div class="clearfix"></div>
              <div id="message"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3>Our Location</h3>
              <div class="padding-as25 lgray-bg">
                    <p class="big"><?php echo $settings['address'] ?></p>
                  <p>Email us at <a href="mailto:<?php echo $settings['email'] ?>"><strong><?php echo $settings['email'] ?></strong></a> or Call us on <strong><?php echo $settings['phone'] ?></strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
