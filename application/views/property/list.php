

<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['page_title'] = "";
$this->load->view('section/header', $data);


?>





 <!-- Site Showcase -->
  <div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(<?= base_url() ?>assets/images/file2.jpg);">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1>Property Simple Listing</h1>
                  </div>
             </div>
         </div>
    </div>
    <!-- End Page Header -->
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
      <div id="content" class="content full">
          <div class="container">
              <div class="row">
                  <div class="col-md-9">
                      <div class="block-heading">
                          <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>Property Listing</h4>
                          <div class="toggle-view pull-right">
                              
                              <a href="/" class="active"><i class="fa fa-th-list"></i></a>
                          </div>
                      </div>
                    <div class="property-listing">

                    <?php if(!$properties){ echo "No properties Found.....";    } ?>
                        <ul>

                <?php foreach($properties as $property_item):?>
                    <?php  $link_text = $this->property_model->cleanTitle($property_item->title);?>
                <li class="type-rent col-md-12">
                    <div class="col-md-4"> <a href="#" class="property-featured-image"> <img src="<?php echo base_url() ?>assets/images/home.jpg" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a> </div>
                            <div class="col-md-8">
                              <div class="property-info">
                                <div class="price"><strong>$</strong><span><?php echo $property_item->price ?></span></div>
                                <h3><a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->id ?>"><?php echo $property_item->title ?></a></h3>
                                <span class="location"><?php echo $property_item->location_title ?></span>
                                <p><?php echo $property_item->description ?></p>
                              </div>
                              <div class="property-amenities clearfix"> <span class="area"><strong><?php echo $property_item->size_sqm ?></strong>Area</span> <span class="baths"><strong><?php echo $property_item->bathrooms ?></strong>Baths</span> <span class="beds"><strong><?php echo $property_item->bedrooms ?></strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                            </div>



                </li>
            <?php endforeach  ?>


                        </ul>
                    </div>
                    <ul class="pagination">
                      <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                  </div>




<?php
$this->load->view('property/sidebar', $data);
$this->load->view('section/footer', $data);
?>