<?php
$number = 235000;
setlocale(LC_MONETARY,"de_DE");
?> 

<script type="text/javascript">
  

    function setView()
    {
      
      $('#number').show();
      $('#view-p-text').hide();
    }


</script>
<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['page_title'] = " ";

$this->load->view('section/header', $data);

// $daysleft = $this->campaign_model->getDaysLeft($campaign->EndDate);

//  $link_text = $this->campaign_model->cleanTitle($campaign->Title);


 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    


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
          <div class="col-md-8">
            <div class="single-property">
              <h2 class="page-title"><?= $property->title ?>, <span class="location"><?= $property->location_title ?></span></h2>
              <div class="price"><strong>$</strong><span><?= $price = $this->property_model->getMoneyFormat($property->price) ?></span></div>
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
                <li class="grid-item type-rent">
                  <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Rent</span> </a>
                    <div class="property-info">
                      <h4><a href="#">116 Waverly Place</a></h4>
                      <span class="location">NYC</span>
                      <div class="price"><strong>$</strong><span>2800 Monthly</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                  </div>
                </li>
                <li class="grid-item type-buy">
                  <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                    <div class="property-info">
                      <h4><a href="#">232 East 63rd Street</a></h4>
                      <span class="location">NYC</span>
                      <div class="price"><strong>$</strong><span>250000</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                  </div>
                </li>
                <li class="grid-item type-rent">
                  <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                    <div class="property-info">
                      <h4><a href="#">55 Warren Street</a></h4>
                      <span class="location">NYC</span>
                      <div class="price"><strong>$</strong><span>300000</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="sidebar right-sidebar col-md-4">
              <div class="widget">
                  <h3 class="widgettitle">Agent</h3>

                   <div class="col-md-12 col-sm-12 featured-block"> <img src="http://placehold.it/600x600&amp;text=IMAGE+PLACEHOLDER" alt="Search Anywhere" class="img-thumbnail">
              <h3>Chukwuka Chime</h3>
              <p></p>
              </div>
                  <div class="agent">

                    <div class="agent-contacts clearfix">







                      <a href="#" onclick="setView()" class="contact-btn btn btn-primary btn-block btn-lg pull-left"><span id="view-p-text" >View Contact</span><span id="number" style="display: none;">09087654321</span></a>

                      <br><br><br><br>
                      <a href="#" class="btn btn-primary btn-block btn-lg pull-left">Send Message</a>
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
                    <?= $property->description ?>
                  </div>
               </div>



               <div class="widget">
                  <h3 class="widgettitle">Additional Amenities</h3>
                  <div id="amenities">
                    <div class="additional-amenities">
                        <span class="available"><i class="fa fa-check-square"></i> Air Conditioning</span>
                         <span class="available"><i class="fa fa-check-square"></i> Heating</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Balcony</span>
                         <span class="available"><i class="fa fa-check-square"></i> Dishwasher</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Pool</span>
                         <span class="available"><i class="fa fa-check-square"></i> Internet</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Terrace</span>
                         <span class="available"><i class="fa fa-check-square"></i> Microwave</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Fridge</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Cable TV</span>
                         <span class="available"><i class="fa fa-check-square"></i> Security Camera</span>
                         <span class="available"><i class="fa fa-check-square"></i> Toaster</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Grill</span>
                         <span class="navailable"><i class="fa fa-check-square"></i> Oven</span>
                         <span class="available"><i class="fa fa-check-square"></i> Fans</span>
                     </div>
                  </div>
              </div>




               <div class="widget">
                  <h3 class="widgettitle">Share</h3>
                  <div class="agent">
                   <div class="agent-contacts clearfix">
                     <ul>
                        <li class="share-list">


                              <a  href="http://twitter.com/share?url=<?php echo $url ?>&text=<?php echo $property->title ?>&hashtags=impactalifethroughDonofund" target="_blank"><img src="<?php echo base_url() ?>assets/images/icon/twitter.png"></a>
                              
                        </li>



                        <li class="share-list"> <a href="http://www.facebook.com/sharer.php?u=<?php echo $url ?>" target="_blank"><img src="<?php echo base_url() ?>assets/images/icon/facebook.png"></a>
                          
                          </li>            


                        <li class="share-list"> <a href="#" target="_blank"><img src="<?php echo base_url() ?>assets/images/icon/print.png"></a>
                           
                        </li>

          </ul>
                      </div>
                  </div>
              </div>



             


               <div class="widget">
                  <h3 class="widgettitle">Safty Tips</h3>
                  <div id="description">
                   <ul class="b-advert-safety-list">
                      <li>Do not submit any upfront fees for a real estate inspection.</li>
                      <li> Do not go to unfamiliar places alone.</li>
                      <li>Double check real estate agency background and reviews </li>
                </ul>
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