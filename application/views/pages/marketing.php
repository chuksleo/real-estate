<div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(<?php echo base_url()?>assets/images/about.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Join RealEstate Network Marketing</h1>
                </div>
           </div>
       </div>
  </div>
  <!-- End Page Header -->
  </div>


 

  <div class="main" role="main">
      <div id="content" class="content full">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3><?php echo ("")?></h3>
                            <?php echo ($this->settings_model->getStaticContent('about_text_one')) ?>
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

                   




                   

                        


                  </div>
                </div>
            </div>
        </div>
  </div>