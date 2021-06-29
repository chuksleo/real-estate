                 <?php 
      $categories = $this->property_category_model->getAllCategories();
      $locations = $this->location_model->mapLocation();


?> 

                  <!-- Start Sidebar -->
                  <div class="sidebar right-sidebar col-md-3">
                      <div class="widget sidebar-widget">
                      <h3 class="widgettitle">Search Properties</h3>
                          <div class="full-search-form">
                              <form action="<?php echo base_url() ?>property/search" method="POST">
                              <select id="select-category"  name="propery-category" class="form-control input-lg selectpicker" onchange="getCategoryTypes('search')">
                                <option value="" selected>Category ... </option>

                              <?php foreach ($categories as $cat): ?>
                              <?php  $link_text = $this->property_model->cleanTitle($cat->title);?>
                             <option value="<?= $cat->catId ?>"><?= $cat->title ?></option>
                            <?php endforeach ?>
                                
                            </select>
                            <select id="types" name="types" class="form-control input-lg " >
                           <option value="" selected>Choose...</option>
                       
                         </select>


                                  <select name="plocation" id="locations" class="form-control input-lg selectpicker">
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
                                                    <select name="furnishing" class="form-control input-lg selectpicker">
                                                        <option value="" selected>Furnishing</option>
                                                                <option value="">Furnished - 23 ads</option>
                                                                 <option value="">Semi-Furnished - 23 ads</option value="">
                                                                  <option value="">Unfurnished - 23 ads</option>
                                                    </select>

                                                     <select name="condition" class="form-control input-lg selectpicker">
                                                        <option value="Any" selected>Condition</option>
                                                        <option value="Any">Any</option>
                                                                <option value="">Newly Built - 23 ads</option>
                                                                <option value="">Fairly Used - 23 ads</option>
                                                                <option value="">Old - 23 ads</option>
                                                                <option value="">Renovated - 23 ads</option>
                                                                

                                                    </select>
                           
                                                    <select name="beds" class="form-control input-lg selectpicker">
                                                        <option value="Any" selected>Bedroom</option>
                                                        
                                                                <option>1 - 4 ads</option>
                                                                <option>2 - 4 ads</option>
                                                                <option>3 - 4 ads</option>
                                                                <option>4 - 4 ads</option>
                                                                <option>5 - 4 ads</option>
                                                                <option>6 - 4 ads</option>
                                                                <option>7 - 4 ads</option>
                                                                <option>8 - 4 ads</option>
                                                                <option>9 - 4 ads</option>
                                                                <option>10 - 4 ads</option>

                                                    </select>


                                                     <select name="baths" class="form-control input-lg selectpicker">
                                                        <option value="Any" selected>BathRooms</option>
                                                        
                                                                <option>1 - 4 ads</option>
                                                                <option>2 - 4 ads</option>
                                                                <option>3 - 4 ads</option>
                                                                <option>4 - 4 ads</option>
                                                                <option>5 - 4 ads</option>
                                                                <option>1 - 4 ads</option>
                                                                <option>2 - 4 ads</option>
                                                                <option>3 - 4 ads</option>
                                                                <option>4 - 4 ads</option>
                                                                <option>5 - 4 ads</option>
                                                                <option>6 - 4 ads</option>
                                                                <option>7 - 4 ads</option>
                                                                <option>8 - 4 ads</option>
                                                                <option>9 - 4 ads</option>
                                                                <option>10 - 4 ads</option>
                                                                
                                                    </select>


                                                                  <div class="col-md-6">
                                                  <label>Min Price</label>
                                                  <input type="text" class="form-control input-lg" name="minprice" placeholder="500000">
                                                    <!-- <select name="minprice" class="form-control input-lg selectpicker">
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
                                                <div class="col-md-6">
                                                  <label>Max Price</label>
                                                  <input type="text" class="form-control input-lg" name="maxprice" placeholder="500000">
                                                    <!-- <select name="maxprice" class="form-control input-lg selectpicker">
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


                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>



              </form>
                          </div>
                    </div>
                    <div class="widget sidebar-widget featured-properties-widget">
                        <h3 class="widgettitle">Featured Properties</h3>
                        <ul class="owl-carousel owl-alt-controls1 single-carousel" data-columns="1" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="yes">
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Rent</span> </a>
                            <div class="property-info">
                              <h4><a href="#">116 Waverly Place</a></h4>
                              <span class="location">NYC</span>
                              <div class="price"><strong>$</strong><span>2800 Monthly</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                            <div class="property-info">
                              <h4><a href="#">232 East 63rd Street</a></h4>
                              <span class="location">NYC</span>
                              <div class="price"><strong>$</strong><span>250000</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                            <div class="property-info">
                              <h4><a href="#">55 Warren Street</a></h4>
                              <span class="location">NYC</span>
                              <div class="price"><strong>$</strong><span>300000</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Rent</span> </a>
                            <div class="property-info">
                              <h4><a href="#">459 West Broadway</a></h4>
                              <span class="location">NYC</span>
                              <div class="price"><strong>$</strong><span>3100 Monthly</span></div>
                            </div>
                          </li>
                        </ul>
                    </div>
                  </div>  
              </div>
          </div>
      </div>
  </div>
  <!-- Start Site Footer -->