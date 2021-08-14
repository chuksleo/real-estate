<div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(<?php echo base_url()?>assets/images/about.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Lets Build For You</h1>
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
                            <h3><?php echo ("Why Let us Handle you Project") ?></h3>
                            <?php echo ($this->settings_model->getStaticContent('lets_build_text')); ?>


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
                  <div class="col-md-12">
                    <h1>Properties</h1>
                </div>
 <div class="property-listing">
                   <ul>

                <?php foreach($properties as $property_item):?>
                    <?php  $link_text = $this->property_model->cleanTitle($property_item->title);?>
                <li class="type-rent col-md-12">
                    <div class="col-md-4"> <a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>" class="property-featured-image"> <img src="<?php echo base_url() ?>assets/uploads/property/<?php echo $property_item->image ?>" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <?php if($property_item->admin_own == "No"){?> <span class="ribbon3">Promoted</span>
    <?php } ?></a> </div>
                            <div class="col-md-8">
                              <div class="property-info">
                                <div class="price"><strong>$</strong><span><?php echo $property_item->price ?></span></div>
                                <h3><a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>"><?php echo $property_item->title ?></a></h3>
                                <span class="location"><?php echo $property_item->location_title ?></span>
                                <p><?php echo $property_item->description ?></p>
                              </div>
                              <div class="property-amenities clearfix"> <span class="area"><strong><?php echo $property_item->size_sqm ?></strong>Area</span> <span class="baths"><strong><?php echo $property_item->bathrooms ?></strong>Baths</span> <span class="beds"><strong><?php echo $property_item->bedrooms ?></strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                            </div>



                </li>
            <?php endforeach  ?>


                        </ul>
                  

</div>

                   

                        


                  </div>

 <a href="<?php echo base_url() ?>all-properties" class="btn btn-primary btn-block btn-lg  btn-call-toaction">View More Properties... </a>


                      
                </div>
            </div>
        </div>
  </div>