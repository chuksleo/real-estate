<div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(http://placehold.it/1200x260&amp;text=IMAGE+PLACEHOLDER);">
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


 

  <div class="main" role="main">
      <div id="content" class="content full">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3><?php echo ($this->settings_model->getStaticContent('about_header_one')) ?></h3>
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

                    <div class="col-md-6">
                          <div class="block-heading">
                              <h4><span class="heading-icon"><i class="fa fa-question"></i></span><?php echo ($this->settings_model->getStaticContent('about_header_three')) ?></h4>
                          </div>
                          <div class="accordion" id="toggleArea">

                           <?php echo ($this->settings_model->getStaticContent('about_text_two')) ?>

                          </div>
                          <!-- End Toggle --> 
                        </div>




                    <div class="col-md-6">
                          <div class="block-heading">
                              <h4><span class="heading-icon"><i class="fa fa-question"></i></span><?php echo($this->settings_model->getStaticContent('about_header_four')); ?></h4>
                          </div>
                          <div class="accordion" id="toggleArea">

                            <?php echo ($this->settings_model->getStaticContent('about_text_three')) ?>

                          </div>
                          <!-- End Toggle --> 
                        </div>



                        


                  </div>
                </div>
            </div>
        </div>
  </div>