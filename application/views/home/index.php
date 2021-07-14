<?php 
      $categories = $this->property_category_model->getAllCategories();


?>
  <!-- Site Showcase -->
  <div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
      <ul class="slides">
      <?php foreach($banners as $banner):?>
        <li class=" parallax" style="background-image:url(<?php echo base_url() ?>assets/uploads/banners/<?php echo $banner->banner_image ?>);"> <p>dfsfsdfhksdfbksd sdfksdfbksdbfksdf sd fksd fsdk f</p>
        </li>
      <?php endforeach ?>


      </ul>
    </div>
    <!-- End Hero Slider --> 
    <!-- Site Search Module -->
    <div class="site-search-module">
      <div class="container">
        <div class="site-search-module-inside">
          <form action="<?php echo base_url() ?>property/search" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                    <select id="select-category"  name="propery-category" class="form-control input-lg selectpicker" onchange="getCategoryTypes('search')">
                        <option value="" selected>Category ... </option>

                      <?php foreach ($categories as $cat): ?>
                      <?php  $link_text = $this->property_model->cleanTitle($cat->title);?>
                     <option value="<?= $cat->catId ?>"><?= $cat->title ?></option>
                    <?php endforeach ?>
                        
                    </select>
                </div>
                 <div class="col-md-2">
                    <select id="types" name="types" class="form-control input-lg" >
                           <option value="" selected>Choose...</option>
                       
                    </select>
                </div>
               
                <div class="col-md-3">
                    <select name="plocation" id="locations" class="form-control input-lg ">
                        <option value="" selected>Set Location</option>
                    
                                                      <?php foreach($locations as $location):?>
                                                      <option value="<?php echo $location['location'] ?>">
                                                      <?php echo $location['location'] ?></option>

                                                        <?php if($location['sublocation']){?>


                                                            <?php $i=0;  foreach($location['sublocation'] as $sublocation): ?>
                                                                  <option value="<?php echo $sublocation ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $sublocation ?></option>
                                                                          <?php if($location['lastsublocations']): ?>
                                                                            <?php $i=0;  foreach($location['lastsublocations'] as $lsublocation): ?>
                                                                          <option value="<?php echo $lsublocation ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <?php echo $lsublocation ?></option>



                                                                          <?php endforeach ?>
                                                                          <?php endif ?>

                                                            <?php endforeach ?>

                                                        <?php } ?>
                                                       <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-2"> <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search"></i> Search</button> </div>
                <div class="col-md-2"> <a href="#" id="ads-trigger" class="btn btn-default btn-block"><i class="fa fa-plus"></i> <span>Advanced</span></a> </div>
              </div>
              <div class="row hidden-xs hidden-sm">
               <div class="col-md-2">
                  <label>Condition</label>
                    <select name="condition" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option>Fairly Used</option>
                      <option>Newly Built</option>
                      <option>Old</option>
                      <option>Renovated</option>
                      
                    </select>
                </div>
                <div class="col-md-2">
                  <label>Min Beds</label>
                    <select name="beds" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                </div>
                <div class="col-md-2">
                  <label>Min Baths</label>
                    <select name="baths" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                </div>
                <div class="col-md-2">
                  <label>Min Price</label>
                   <input type="text" class="form-control input-lg" name="minprice" placeholder="500000" >
                    <!-- <select name="minprice" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option value="">$1000</option>
                      <option value="">$5000</option>
                      <option value="">$10000</option>
                      <option value="">$50000</option>
                      <option value="">$100000</option>
                      <option value="">$500000</option>
                      <option value="">$1000000</option>
                      <option value="">$3000000</option>
                      <option value="">$5000000</option>
                      <option value="">$10000000</option>
                    </select> -->
                </div>
                <div class="col-md-2">
                  <label>Max Price</label>
                   <input type="text" class="form-control input-lg" name="maxprice" placeholder="500000">
                   <!--  <select name="maxprice" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option>$1000</option>
                      <option>$5000</option>
                      <option>$10000</option>
                      <option>$50000</option>
                      <option>$100000</option>
                      <option>$500000</option>
                      <option>$1000000</option>
                      <option>$3000000</option>
                      <option>$5000000</option>
                      <option>$10000000</option>
                    </select> -->
                </div>
                <div class="col-md-2">
                  <label>Min Area (Sq Ft)</label>
                  <input type="text" class="form-control input-lg" placeholder="Any">
                </div>
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="featured-blocks">
        <div class="container">
          <div class="row">
          <div class="col-md-4 col-sm-4 featured-block"> <img src="<?php echo base_url() ?>assets/images/search.png" alt="Search Anywhere" class="">
              <h3><?php echo ($this->settings_model->getStaticContent('home_header_one')) ?></h3>
              <?php echo ($this->settings_model->getStaticContent('home_text_one')) ?>    
            </div>
            <div class="col-md-4 col-sm-4 featured-block"> <img src="<?php echo base_url() ?>assets/images/verify.png" alt="Friendly Agents" class="">
              <h3><?php echo ($this->settings_model->getStaticContent('home_header_two')) ?></h3>
               <?php echo ($this->settings_model->getStaticContent('home_text_two')) ?>
            </div>
            <div class="col-md-4 col-sm-4 featured-block"> <img src="<?php echo base_url() ?>assets/images/best-price.png" alt="Search Anywhere" class="">
              <h3> <?php echo ($this->settings_model->getStaticContent('home_header_three')) ?></h3>
               <?php echo ($this->settings_model->getStaticContent('home_text_three')) ?>
            </div>

           
          </div>
        </div>
      </div>
      <div class="spacer-40"></div>
    <div class="container">
      <div class="row">
          <div class="property-columns" id="latest-properties">
              <div class="col-md-12">
                <div class="block-heading">
                  <h4><span class="heading-icon"><i class="fa fa-leaf"></i></span>Recently Listed</h4>
                  <a href="<?= base_url() ?>all-properties" class="btn btn-primary btn-sm pull-right">View more properties <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
              <ul>
                <?php foreach($properties as $property_item):?>
                <li class="col-md-4 col-sm-6 type-rent">
                      <div class="property-block">
                       <?php  $link_text = $this->property_model->cleanTitle($property_item->title);?>
                          <a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>" class="property-featured-image">
                              <img src="<?php echo base_url() ?>assets/uploads/property/<?php echo $property_item->image ?>" alt="">
                              <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                              <span class="badges">Buy</span>
                          </a>
                      <div class="property-info">
                              <h4><a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>" title="<?php echo $property_item->title ?>"><?php echo substr($property_item->title, 0, 30); if(strlen($property_item->title) > 30){ echo "...";}?> </a></h4>
                              <span class="location"><?php echo $property_item->location_title ?></span>
                              <div class="price"><strong>N</strong><span><?php echo $property_item->price ?></span></div>
                      </div>
                      <div class="property-amenities clearfix">
                              <span class="area"><strong><?php echo $property_item->size_sqm ?></strong>Area</span>
                              <span class="baths"><strong><?php echo $property_item->bathrooms ?></strong>Baths</span>
                              <span class="beds"><strong><?php echo $property_item->bedrooms ?></strong>Beds</span>
                              <span class="parking"><strong><?php echo $property_item->property_condition ?></strong>Condition</span>
                          </div>
                      </div>
                </li>
            <?php endforeach  ?>
              
              </ul>
          </div>
        </div>
      </div>
      <div id="featured-properties">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-heading">
                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Featured Properties</h4>
              </div>
            </div>
          </div>
          <div class="row">
              <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">

                <?php foreach($featured_properties as $property_item):?>

                  <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                      <img src="<?php echo base_url() ?>assets/images/home.jpg" alt="">
                      <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                      <span class="badges">Buy</span>
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html"><?php echo $property_item->title ?></a></h4>
                          <span class="location"><?php echo $property_item->location_title ?></span>
                          <div class="price"><strong>$</strong><span><?php echo $property_item->price ?></span></div>
                      </div>
                  </li>
                  <?php endforeach  ?>
            
              </ul>
          </div>
        </div>
      </div>


      <div class="container">
          <br><br>
          <div class="row">
            <div class="col-md-12">
              <div class="block-heading">
               <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Top Locations</h4>
            <a href="about.html" class="btn btn-primary btn-sm pull-right">All Locations <i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
        
          

        <div class="row">
          <div class="col-md-12">



           <div id="rs-team" class="rs-team fullwidth-team pt-100 pb-70">
              <div class="container">

                   <div class="block-title text-center">
                              <h3> </h3>
                              
                          </div>

                  <div class="row">

                  <?php foreach($featured_location as $location):?>
                     <?php  $link_text = $this->property_model->cleanTitle($location->location_title);?>
                      <div class="col-lg-6 col-md-8">
                          <a href="<?= base_url() ?>property/location/<?= $link_text ?>/<?= $location->lid ?>">
                          <div class="team-item">
                              <div class="team-img">
                                  <?php if(!$location->banner_image){?>
                                 <img src="<?php echo base_url(); ?>assets/images/1608959457773.png" alt="">
                                 <?php }else{ ?>
                                  <img style="width: 100%; height: 400px" src="<?php echo base_url() ?>assets/uploads/location/<?php echo $location->banner_image ?>" alt="">
                                  <?php } ?>

                                 
                                  <div class="normal-text">
                                      <p class="">200</p>
                                      <h4 class="team-name"><?php echo $location->location_title ?> Properties</h4>
                                      
                                  </div>
                              </div>
                              <div class="team-content">
                                  <div class="display-table">
                                      <div class="display-table-cell">
                                         
                                          <div class="team-details">
                                              <h4 class="team-name">
                                                  <a class="btn btn-primary" href="<?= base_url() ?>property/location/<?= $link_text ?>/<?= $location->lid ?>">View <?php echo $location->location_title ?> Properties</a>
                                              </h4>
                                              
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div></a>
                      </div>
                      <?php endforeach ?>

                  </div>
              </div>
              <!-- .container-fullwidth -->
          </div>  
              
            <?php //foreach($featured_location as $location):?>
              <!-- <li class="grid-item post format-image">
                <div class="grid-item-inner"> <a href="" data-rel="prettyPhoto" class="media-box"> <img src="<?php echo base_url() ?>assets/uploads/location/<?php echo $location->banner_image ?>" alt=""> </a> 
                  <div class="city-name">
                      <p>200</p>
                       <h3 class=""><?php echo $location->location_title?> Propertie(s)</h3>
                                 
                  </div>

                </div>
              </li> -->
            <?php //endforeach ?>   
              
             
            <!-- </ul> -->
            
          </div>
        </div>


    </div>



        <div class="container">
         <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Our Partners</h4>
            <a href="about.html" class="btn btn-primary btn-sm pull-right">All partners <i class="fa fa-long-arrow-right"></i></a>
         </div>
         <div class="row">
            <ul class="owl-carousel" id="clients-slider" data-columns="6" data-autoplay="yes" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="6" data-items-desktop-small="4" data-items-mobile="2" data-items-tablet="4">
              <li class="item"> <a href="#"><img src="images/partner-1.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-2.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-3.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-4.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-5.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-1.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-2.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-3.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-4.png" alt=""></a> </li>
              <li class="item"> <a href="#"><img src="images/partner-5.png" alt=""></a> </li>
            </ul>
         </div>
      </div>
    </div>
  </div>
 