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
      <div class="row">
           <div id="statpage" class="col-md-6col-sm-6 ">
                            <h3><?= $project->project_title ?></h3>
                            
                           <p> <?= $project->description ?>

                           
                            <a class="btn btn-lg whatsappbtn" href="https://api.whatsapp.com/send?phone=<?php echo($phone); ?>" style="">Contact on WhatsApp</a>


                        </div>



      </div>


      <div class="spacer-40"></div>
        <div class="row">

         
          <ul>

          <?php foreach($images as $img):?>
            <li class="col-md-6 col-sm-6 gallery-item format-image">
              <div class="grid-item-inner"> <a href="<?php echo base_url()?>assets/uploads/projects/<?= $img->image ?>" data-rel="prettyPhoto[gallery]" class="media-box"> <img src="<?php echo base_url()?>assets/uploads/projects/<?= $img->image?>" alt=""> </a> </div>
            </li>
            <?php endforeach ?>
          </ul>
         
        </div>
      </div>
    </div>
  </div>