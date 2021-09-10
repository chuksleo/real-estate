
<?php 
      $settings = $this->settings_model->get_all_settings();
      
?>

<div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(<?php echo base_url()?>assets/images/about.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
           </div>
       </div>
  </div>
  <!-- End Page Header -->
  </div>


 <style type="text/css">
   

 </style>

  <div class="main" role="main">
      <div id="content" class="content full">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div id="statpage" class="col-md-6 col-sm-6">
                            <h3><?php echo ($this->settings_model->getStaticContent('about_header_one')) ?></h3>
                            <?php echo ($this->settings_model->getStaticContent('about_text_main')) ?>


                            <div class="wrp">


                            <a class="icon icon-twitter" href="<?php echo($settings['twitter_link']); ?>" target="_blank"><i class="fa fa-twitter ico-ico"></i></a>

                            <a class="icon icon-facebook" href="<?php echo($settings['fb_link']); ?>" target="_blank"><i class="fa fa-facebook ico-ico"></i></a>

                            <a class="icon icon-instagram" href="<?php echo($settings['insta_link']); ?>" target="_blank"><i class="fa fa-instagram ico-ico"></i></a>

                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h3><?php echo ($this->settings_model->getStaticContent('about_header_two')) ?></h3>
                          <!-- Start Accordion -->
                          <div class="accordion" id="accordionArea">
                            <div class="accordion-group panel">
                              <div class="accordion-heading accordionize"> <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordionArea" href="#oneArea"> <?php echo ($this->settings_model->getStaticContent('home_header_one')) ?> <i class="fa fa-angle-down"></i> </a> </div>
                              <div id="oneArea" class="accordion-body in collapse">
                                <div class="accordion-inner"><?php echo ($this->settings_model->getStaticContent('home_text_one')) ?></div>
                              </div>
                            </div>
                            <div class="accordion-group panel">
                              <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#twoArea"> <?php echo ($this->settings_model->getStaticContent('home_header_two')) ?> <i class="fa fa-angle-down"></i> </a> </div>
                              <div id="twoArea" class="accordion-body collapse">
                                <div class="accordion-inner"><?php echo ($this->settings_model->getStaticContent('home_text_two')) ?></div>
                              </div>
                            </div>
                            <div class="accordion-group panel">
                              <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#threeArea"> <?php echo ($this->settings_model->getStaticContent('home_header_three')) ?> <i class="fa fa-angle-down"></i> </a> </div>
                              <div id="threeArea" class="accordion-body collapse">
                                <div class="accordion-inner"> <?php echo ($this->settings_model->getStaticContent('home_text_three')) ?></div>
                              </div>
                            </div>
                          </div>
                          <!-- End Accordion -->
                        </div>
                    </div>





                
                  <div class="row">
                    <div class="col-md-6">
                          <div class="block-heading">
                              <h4><span class="heading-icon"><i class="fa fa-question"></i></span><?php echo (strip_tags($this->settings_model->getStaticContent('about_header_three'))) ?></h4>
                          </div>
                          <div class="accordion" id="toggleArea">
                            <div class="accordion-group panel" style="font-size: 24px;">
                            <?php echo (strip_tags($this->settings_model->getStaticContent('about_mission_text'))) ?>
                             
                            </div>
                           
                            
                          </div>
                          <!-- End Toggle --> 
                      </div>




                       <div class="col-md-6">
                          <div class="block-heading">
                              <h4><span class="heading-icon"><i class="fa fa-question"></i></span><?php echo (strip_tags($this->settings_model->getStaticContent('about_header_four'))) ?></h4>
                          </div>
                          <div class="accordion" id="toggleArea">
                            <div class="accordion-group panel" style="font-size: 24px;">
                            <?php echo (strip_tags($this->settings_model->getStaticContent('about_vision_text'))) ?>
                             
                            </div>
                           
                            
                          </div>
                          <!-- End Toggle --> 
                      </div>
                  </div>




                
                </div>
            </div>
        </div>
  </div>