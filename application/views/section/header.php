<!DOCTYPE HTML>

<html class="no-js">

<?php 
      $settings = $this->settings_model->get_all_settings();
      $categories = $this->property_category_model->getAllCategories();
     
     $firstname =  $this->session->userdata('firstname'); 
?>








<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $page_title ?></title>
<meta name="description" content="<?php echo $page_description ?>">
<meta name="keywords" content="">
<meta name="author" content="Realestste9ja.com">
<meta name="robots" content="index,follow">
 <meta property="og:type" content="website" />
<meta property="og:image" content="<?= $ogimage ?>"/>


<meta property="og:title" content="<?php echo $page_title ?>"/>
<meta property="og:description" content="<?php echo $page_description ?>">
<meta property="og:url" content="<?= $ogurl ?>"/>
<meta property="og:site_name" content="Realestste9ja.com"/>


   
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- Color Style -->
<link href="<?php echo base_url()?>assets/colors/color1.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/responsiveslides.css" rel="stylesheet" type="text/css">
<!-- <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" type="text/css">
 -->
<!-- SCRIPTS


  ================================================== -->
<script src="<?php echo base_url()?>assets/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
  <script src="<?php echo base_url()?>assets/js/responsiveslides.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.js"></script><!-- Modernizr -->

<script>

// Wrap every letter in a span
var textWrapper = document.querySelector('.ml9 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml9 .letter',
    scale: [0, 1],
    duration: 1500,
    elasticity: 600,
    delay: (el, i) => 45 * (i+1)
  }).add({
    targets: '.ml9',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });

  
var contactForm = document.getElementById('contactForm');
contactForm.addEventListener('submit', contact_us, false);



function showFields(){
    $('#pmessage').show();

}
function copyLink() {
  /* Get the text field */
  var copyText = document.getElementById("pagelink");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied Link: " + copyText.value);
} 


function subscribe_bottom()
{

            console.log("btn cliced");
            var email_cont = $('input#email-address').val();
             $("#subtn").hide();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>email/subscribe_email',
                data: {'email_val':email_cont},

                success: function(resp) {
                  $("#subtn").show();
                     $("#submessage_footer").html(resp);
                }

            });
}
 

function contact_us()
        {
            $('#sendingm').show();
            $('#sendm').hide();
            var fname = $('input#contact_fname').val();
            var email = $('input#contact_email').val();
            var phone = $('input#contact_phone').val();
            var message = $('textarea#contact_message').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>email/contact',
                data: {'fname_val':fname,'email_val':email,'phone_val':phone,'message_val':message},
                success: function(resp) {

                    $('#sendingm').hide();
                    $('#sendm').show(); 
                     $("#contact_rmessage").html(resp);
                }

            });
        }

function sendMessage()
        {


         
          $('#btnsending').show();
          $('#btnsend').hide();
            //$('input#loader').show();
            var fname = $('input#fullname').val();
            var email = $('input#emailc').val();
            var phone = $('input#phone').val();
            var property = $('input#property').val();
            var message = $('textarea#contact_message').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>property/sendMessage',
                data: {'name_val':fname,'email_val':email,'phone_val':phone,'property_val':property,'message_val':message},
                success: function(resp) {
                    $('#btnsending').hide();
                    $('#btnsend').show(); 
                    //$('#prog').hide();
                     $("#contact_rmessage").html(resp);
                }

            });
        }

       
var page;
function getCategoryTypes(page){
    console.log(page);

    var page_val = page;
    var catId = $('select#select-category').val();
       
    
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>category/get_types',
        data: {'catid':catId,'page_val':page_val},
        success: function(resp) {
          
          document.getElementById('types').innerHTML = resp
        }
      });


}

    </script>

</head>
<body class="home">
<!--[if lt IE 7]>
  <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">

  <!-- Start Site Header -->
  <header class="site-header">
   

   <div id="top-social" class="col-md-8 col-sm-12 mobile-social-horizontal">
    <span>follow us on: </span><ul class="horiz-nav pull-right">
                  <li><a href="<?php echo($settings['insta_link']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="<?php echo($settings['fb_link']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?php echo($settings['twitter_link']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              </ul>
   </div> 
    <div class="top-header hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <ul class="horiz-nav pull-left">
             <?php if ($this->ion_auth->logged_in() == false) { ?>
            <li><a href="<?= base_url() ?>auth/login"><i class="fa fa-check-circle"></i> Login</a></li>
             
              <li><a href="<?= base_url() ?>auth/register"><i class="fa fa-check-circle"></i> Register</a></li>

               <?php }else{ ?>

                 <li class="dropdown"><a  data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <?php echo $firstname ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url() ?>user/properties">My properties</a></li>
                  <li><a href="<?= base_url() ?>property/add">Add a property</a></li>
                  <li><a href="<?= base_url() ?>dashboard">My Profile</a></li>
                  <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
                </ul>
              </li>
          <?php } ?>    
              </ul>
          </div>
          <div class="col-md-8 col-sm-6">
            <ul class="horiz-nav pull-right">
                  <li><a href="<?php echo($settings['insta_link']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="<?php echo($settings['fb_link']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?php echo($settings['twitter_link']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="middle-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-8 col-xs-8">
            <h1 class="logo"> <a href="<?php echo base_url() ?>"> <img src="<?php echo base_url()?>assets/uploads/files/<?php echo($settings['logo']); ?>" class="logo-img" alt="<?php echo($settings['site_name']); ?>"></a> </h1>
          </div>
          <div class="col-md-8 col-sm-4 col-xs-4">
              <div class="contact-info-blocks hidden-sm hidden-xs">
                  <div>
                      <i class="fa fa-phone"></i> Front Desk
                    <span><?php echo($settings['phone']); ?></span>
                </div>
                  <div>
                      <i class="fa fa-envelope"></i> Email Us
                    <span><?php echo($settings['email']); ?></span>
                </div>
                  <div>
                      <i class="fa fa-clock-o"></i> Working Hours
                    <span><?php echo($settings['working_hours']); ?></span>
                </div>
             </div>
              <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>



    <div class="main-menu-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">



       
    
            <nav class="navigation">
              <ul class="sf-menu">
                <li><a href="<?php echo base_url() ?>">Home</a></li>


                
                 <li><a href="javascript:;">Properties</a>
                  <ul class="dropdown">

                    <li><a href="<?php echo base_url() ?>all-properties">All Properties</a></li>
                    <li class="">
                      <a href="<?php echo base_url() ?>featured-properties"><?php  echo "Featured Properties" ?></a> </li>
                    <li class="">
                      <a href="<?php echo base_url() ?>properties/popular"><?php  echo "Popular Properties" ?></a> </li>
                    <?php foreach ($categories as $cat): ?>
                      <?php  $link_text = $this->property_model->cleanTitle($cat->title);?>
                    <li><a href="<?= base_url() ?>property-category/<?= $link_text ?>/<?= $cat->catId ?>"><?= $cat->title ?></a></li>
                    <?php endforeach ?>

                    <li class=""><a href="<?php echo base_url() ?>network-marketing"><?php  echo "Join Real Estate Network Marketing" ?></a>
                                  
                    </li>
                    
                  </ul>
                </li>

                <li class="">
                 <a href="<?php echo base_url() ?>lets-build"><?php  echo "Let's Build For You" ?></a>
                                  
                </li>
                 <li class="">
                 <a href="<?php echo base_url() ?>post-request"><?php  echo "Post A Request" ?></a>
                                  
                </li>
                


                <li class="">
                 <a href="<?php echo base_url() ?>about-us"><?php  echo "About us" ?></a>
                                  
                </li>
                                

                  
              </ul>

              <a href="<?php echo base_url() ?>property/add" class="btn btn-primary btn-block btn-lg top-btn-add btnselltop">+Sell With us </a>

                  
            </nav>


            
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Site Header -->
  








































































