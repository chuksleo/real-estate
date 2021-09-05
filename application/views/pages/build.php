  <?php $settings = $this->settings_model->get_all_settings(); ?><div class="site-showcase">
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

<?php 

        
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
                        <div id="statpage" class="col-md-12 col-sm-12">
                            <h3><?php echo ("Why Let us Handle your Project") ?></h3>
                            
                           <?php echo ($this->settings_model->getStaticContent('lets_build_text')); ?>


                           
                            <a class="btn btn-lg whatsappbtn" href="https://api.whatsapp.com/send?phone=<?php echo($phone); ?>" style="">Contact on WhatsApp</a>


                        </div>
                        </div>
                       
                  <!-- <div class="row"> -->




                <div class="spacer-40"></div>
    <div class="container">
      <div class="row">
          <div class="property-columns" id="latest-properties">
              <div class="col-md-12">
                <div class="block-heading">
                  <h4><span class="heading-icon"><i class="fa fa-leaf"></i></span>A Tour on Our Projects</h4>
                  <a href="simple-listing-fw.html" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
              <ul>

                 <?php foreach ($projects as $project):?>
                  <?php $images = $this->project_images->getImagesByProjectId($project->project_id);?>

                  <?php  $link_text  = $this->property_model->cleanTitle($project->project_title);?>

                <li class="col-md-4 col-sm-6 type-rent">
                      <div class="property-block">
                          <a href="#" class="property-featured-image">
                          <?php if($images):?>
                              <img src="<?php echo base_url() ?>assets/uploads/projects/<?= $images[0]->image ?>" alt="">
                            <?php endif ?>
                          </a>
                      <div class="property-info">
                              <h4><a href="<?php echo base_url() ?>lets-build/<?= $link_text ?>/<?= $project->project_id ?>"><?= $project->project_title ?></a></h4>
                             
                            <p><?php echo strip_tags(substr($project->description, 0, 500 )) ?></p>
                      </div>
                        <div class="">
                          <a href="<?php echo base_url() ?>lets-build/<?= $link_text ?>/<?= $project->project_id ?>" class="btn btn-primary btn-block">Tour Now </a>

                        </div>
                          



                          </div>
                </li>
     
             
         <?php endforeach ?>
                
              
              </ul>
          </div>
        </div>
      </div>






                 
      
          <!-- </div> -->

                      
                </div>
            </div>
        </div>
  </div>