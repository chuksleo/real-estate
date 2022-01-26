<?php
$number = 235000;
setlocale(LC_MONETARY,"de_DE");
?> 

<script type="text/javascript">
  

    function setView()
    {
      
      $('#number').show();
      $('#number2').show();
      $('#view-p-text').hide();
    }


</script>
<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['page_title'] = $property->title." | RealEstate9ja.com";
$data['page_description'] = $property->description;
$settings = $this->settings_model->get_all_settings();

$data['ogimage'] = base_url().'assets/uploads/property/'.$property->image;
$data['ogurl'] = base_url().$link;
$this->load->view('section/header', $data);

 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
$user_ip=$_SERVER['REMOTE_ADDR'];

$this->property_model->setPageViewForProperty($property->pid);

?>


<?php 

        
        $first = $settings['phone'][0];
        $phone = "";
        if($first == '0'){
            $num = substr($settings['phone'], 1);
            $phone = "+234".$num;
        }



?>



 

 <!-- Site Showcase -->
  <div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(<?= base_url() ?>assets/images/file2.jpg);">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1>Property Details</h1>
                  </div>
             </div>
         </div>
    </div>
    <!-- End Page Header -->
  </div>
  <!-- Start Content -->
<?php print_r($images)?>
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="single-property">
            

              <h2 class="page-title"><?= $property->title ?>, <span class="location"><?= $property->location_title ?></span></h2>
              <div class="price"><strong>&#x20A6;</strong><span><?= $price = $this->property_model->getMoneyFormat($property->price) ?></span></div>
              <div class="property-amenities clearfix"> <span class="area"><strong>For</strong>Sale</span> <span class="area"><strong><?= $property->size_sqm ?></strong>Area</span> <span class="baths"><strong><?= $property->bathrooms ?></strong>Baths</span> <span class="beds"><strong><?= $property->bedrooms ?></strong>Beds</span> <span class="parking"><strong><?= $property->agreement_fee ?></strong>Fees</span> </div>
              <div class="property-slider">
                <div id="property-images" class="flexslider">
                  <ul class="slides">

                  <?php foreach($images as $img):?>
                    <li class="item"> <img  src="<?php echo base_url() ?>assets/uploads/property/<?php echo $img->filename ?>" alt=""> </li>
                    

                  <?php endforeach ?>
                  </ul>
                </div>
                <div id="property-thumbs" class="flexslider">
                  <ul class="slides">
                      <?php foreach($images as $imgs):?>
                        <li class="item"> <img class="thumbnail" src="<?php echo base_url() ?>assets/uploads/property/<?php echo $imgs->filename ?>" alt=""> </li>
                    

                      <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Start Related Properties -->
            <h3>Related Properties</h3>
            <hr>
            <div class="property-grid">
              <ul class="grid-holder col-3">

              <?php foreach($realated_properties as $property_item):?>
                <?php  $link_text = $this->property_model->cleanTitle($property_item->title);

                  $img_count = $this->property_images->getImagesCountByPropertyId($property_item->pid);
                ?>
                <li class="grid-item type-rent">
                  <div class="property-block"> <a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>" class="property-featured-image"> <img src="<?php echo base_url() ?>assets/uploads/property/<?php echo $property_item->image ?>" alt="<?php echo $property_item->title ?>"> <span class="images-count"><i class="fa fa-picture-o"></i> <?php echo $img_count ?></span><?php if($property_item->admin_own == "No"){?> <span class="ribbon3">Promoted</span>
    <?php } ?> </a>
                    <div class="property-info">
                      <h4><a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property_item->pid ?>"><?php echo substr($property_item->title, 0, 25); if(strlen($property_item->title) > 25){ echo "...";}?></a></h4>
                      <span class="location"><?php echo $property_item->location_title ?></span>
                      <div class="price"><strong>&#x20A6;</strong><span><?= $price = $this->property_model->getMoneyFormat($property_item->price) ?></span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong><?php echo $property_item->size_sqm ?></strong>Area</span> <span class="baths"><strong><?php echo $property_item->bathrooms ?></strong>Baths</span> <span class="beds"><strong><?php echo $property_item->bedrooms ?></strong>Beds</span>  </div>
                  </div>
                </li>
              <?php endforeach ?>
              </ul>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="sidebar right-sidebar col-md-4">
              <div class="widget">
                  <h3 class="widgettitle">Agent</h3>

                   <div class="col-md-12 col-sm-12 featured-block"> <img src="<?php echo base_url()?>assets/uploads/files/<?php echo($settings['logo']); ?>" alt="<?php echo($settings['site_name']); ?>" class="">
              <h3>RealEstate9ja Agent</h3>
              <p></p>
              </div>
                  <div class="agent">

                    <div class="agent-contacts clearfix">







                      <a href="#" onclick="setView()" class="contact-btn btn btn-primary btn-block btn-lg pull-left"><span id="view-p-text" >View Contact</span>
                      <span id="number" style="display: none;"><?php echo $settings['phone'] ?></span> 
                      <span id="number2" style="display: none;"><?php if($settings['phone2']){echo ", ". $settings['phone2'];} ?></span></a>

                      <br><br><br><br>
                      
                      <div id="pmessage" style="display: none;">
                        <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name" class="form-control input-lg" required>
                        <input type="email" id="emailc" name="emailc" placeholder="Enter Email" class="form-control input-lg" required>
                        <input type="tel" id="phone" name="phone" placeholder="Phone e.g 07000011111" class="form-control input-lg" required>
                        <input type="hidden" id="property" name="property"  value="<?= $property->pid ?>" class="form-control input-lg" required>


                      </div>
                      <textarea cols="6" rows="5" id="contact_message" name="comments" class="form-control input-lg" onfocus="showFields()" placeholder="Message" required></textarea>
                       <div id="contact_rmessage"></div>
                      <button id="btnsend" class="btn btn-primary btn-block btn-lg pull-left" onclick="sendMessage()" >Send Message</button>


                       <button id="btnsending" class="btn btn-primary btn-block btn-lg pull-left" style="display: none">Sending ...</button>


                       <a class="btn btn-lg whatsappbtn" href="https://api.whatsapp.com/send?phone=<?php echo($phone); ?>">Contact on WhatsApp</a>
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul> -->

                        
                      </div>
                  </div>
              </div>
                 <div class="widget">
                  <h3 class="widgettitle">Description</h3>
                  <div id="description">
                    <?= $property->property_description ?>
                  </div>
               </div>



               <div class="widget">
                  <h3 class="widgettitle">Additional Amenities</h3>
                  <div id="amenities">
                    <div class="additional-amenities">
                      <?php foreach($facilities as $facility): ?>
                        <span class="available"><i class="fa fa-check-square"></i> <?=  $facility->name ?></span>
                      <?php endforeach ?>
                     </div>
                  </div>
              </div>




               <div class="widget">
                  <h3 class="widgettitle">Share</h3>
                  <div class="agent">
                   <div class="agent-contacts clearfix">
                     <ul>
                        <li class="share-list">


                              <a  href="http://twitter.com/share?url=<?php echo $url ?>&text=<?php echo $property->title ?>&hashtags=RealEstate9jaProperties" target="_blank"><img src="<?php echo base_url() ?>assets/images/icon/twitter.png"></a>
                              
                        </li>



                        <li class="share-list"> <a href="http://www.facebook.com/sharer.php?u=<?php echo $url ?>" target="_blank"><img src="<?php echo base_url() ?>assets/images/icon/facebook.png"></a>
                          
                          </li>            


                        <li class="share-list"> <a href="#" onclick="window.print()"><img src="<?php echo base_url() ?>assets/images/icon/print.png"></a>
                           
                        </li>

          </ul>
                      </div>
                  </div>
              </div>



             


              
             
           </div>
        </div>
      </div>
    </div>
  </div>

<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/footer', $data);
?>