

<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['page_title'] = lang('popular_property_title');
$data['page_description'] = lang('pr_description');

$this->load->view('section/header', $data);


?>





 <!-- Site Showcase -->
  <div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(<?= base_url() ?>assets/images/file2.jpg);">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1>Realestate9ja - <?php echo $title?></h1>
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

                      <!--  <div class="block-heading">

                       </div> -->


 <div id="custom-search-input">
                            <div class="input-group col-md-12">
                            <form action="<?php echo base_url() ?>property/search" method="POST">
                            <div class="col-md-10 col-sm-10">
                                <input type="text" name="ptitle" class="search-query form-control input-lg" placeholder="Search For Property for Sale" />
                            </div>
                             <div class="col-md-2 col-sm-2">
                                <span class="input-group-btn">
                                    <button class="btn-search btn" type="submit">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                              </div>
                                </form>
                            </div>
                        </div>

                      
                    <div class="property-listing">
                     

                       <?php $val = $this->session->flashdata('message'); if($val){echo '<div class="alert alert-warning fade in">'.$val.'</div>'; }?>

                    <?php if(!$properties){ echo ' <div class="alert alert-warning fade in"> <a class="close" data-dismiss="alert" href="#">×</a> <strong> Sorry!</strong>No Properties Found .... </div>';    } ?>
                        <ul>

                <?php foreach($properties as $property_item):?>
                    <?php  $link_text = $this->property_model->cleanTitle($property_item->title);

                      $img_count = $this->property_images->getImagesCountByPropertyId($property_item->pid);
                    ?>
                <li class="type-rent col-md-12">
                    <div class="col-md-4"> <a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>" class="property-featured-image"> <img src="<?php echo base_url() ?>assets/uploads/property/<?php echo $property_item->image ?>" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> <?php echo $img_count ?></span> <?php if($property_item->admin_own == "No"){?> <span class="ribbon3">Promoted</span>
    <?php } ?></a> </div>
                            <div class="col-md-8">
                              <div class="property-info">
                                <div class="price"><strong>&#x20A6;</strong><span><?= $price = $this->property_model->getMoneyFormat($property_item->price) ?></span></div>
                                <h3><a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>"><?php echo $property_item->title ?></a></h3>
                                <span class="location"><?php echo $property_item->location_title ?></span>
                                <p><?php echo substr(strip_tags($property_item->property_description), 0, 150)  ?>....</p>
                              </div>
                              <div class="property-amenities clearfix"> <span class="area"><strong><?php echo $property_item->size_sqm ?></strong>Area</span> <span class="baths"><strong><?php echo $property_item->bathrooms ?></strong>Baths</span> <span class="beds"><strong><?php echo $property_item->bedrooms ?></strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                            </div>



                </li>
            <?php endforeach  ?>


                        </ul>
                    </div>
                    
                  
                  </div>




<?php
$this->load->view('property/sidebar', $data);
$this->load->view('section/footer', $data);
?>