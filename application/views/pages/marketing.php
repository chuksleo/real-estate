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
 
<?php 

        $settings = $this->settings_model->get_all_settings();
        $first = $settings['phone'][0];
        $phone = "";
        if($first == '0'){
            $num = substr($settings['phone'], 1);
            $phone = "+234".$num;
        }



?>

  <div class="main" role="main">
      <div id="content" class="content full">
            <div class="container">
                <div class="page">
                    <div class="row">
                        <div id="statpage" class="col-md-12  col-sm-12">
                            <h3><?php echo ("Why Join Our Realestate Network Marketing")?></h3>
                            <?php echo ($this->settings_model->getStaticContent('market_network_text')) ?>


                            <a class="btn btn-lg whatsappbtn" href="https://api.whatsapp.com/send?phone=<?php echo($phone); ?>" >Contact on WhatsApp</a>
                    </div>
                        </div>
                        

                     


                  <div class="row">
                  <div class="col-md-12">
                    <h1>Properties</h1>
                </div>
 <div class="property-listing">
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
                                <div class="price"><strong>&#x20A6; </strong><span> <?= $price = $this->property_model->getMoneyFormat($property_item->price) ?></span></div>
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