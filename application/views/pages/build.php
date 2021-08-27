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
                        <div id="statpage" class="col-md-12 col-sm-12">
                            <h3><?php echo ("Why Let us Handle your Project") ?></h3>
                            
                           <?php echo ($this->settings_model->getStaticContent('lets_build_text')); ?>


                           
                            <a class="btn btn-lg whatsappbtn" href="https://api.whatsapp.com/send?phone=<?php echo($phone); ?>" style="">Contact on WhatsApp</a>


                        </div>
                        </div>
                       
                  <!-- <div class="row"> -->
                 
          <div class="col-md-12 jk">

          <h1>A Tour On Our Projects</h1>
            <ul class="grid-holder col-3" style="overflow: unset !important;">
             
            
            <?php foreach ($projects as $project):?>
             
             <?php $images = $this->project_images->getImagesByProjectId($project->project_id);?>
              <li class="grid-item post format-gallery">
                <div class="grid-item-inner">
                  <div class="media-box">
                    <div class="flexslider" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="slide" data-pause="yes">
                      <ul class="slides">
                        <?php foreach($images as $imag):?>
                        <li class="item"><a href="<?php echo base_url() ?>assets/uploads/projects/<?= $imag->image ?>" data-rel="prettyPhoto[postname]"><img src="<?php echo base_url() ?>assets/uploads/projects/<?= $imag->image ?>" alt="" ></a></li>
                       

                      <?php endforeach ?>
                      </ul>
                    </div>
                  </div>
                  <div class="grid-content">
                    <h4><a href="blog-post.html"><?= $project->project_title ?></a></h4>
                    
                    <?= $project->description ?>
                  </div>
                </div>
              </li>
             <?php endforeach ?>
            </ul>
            
           
          </div>
          <!-- </div> -->

                      
                </div>
            </div>
        </div>
  </div>