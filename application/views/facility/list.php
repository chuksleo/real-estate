
<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/header', $data);
?>

    <!--Page Header Start-->
        <section class="page-header" style="background-image: url(<?php echo base_url() ?>assets/images/how-it-works.png);">
            <div class="container">
                <h2> Browse by Category</h2>
                <p style="color: #fff">Find the cause you are looking for by category</p>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Categories</span></li>
                    
                </ul>
            </div>
        </section>

<div id="rs-team" class="rs-team fullwidth-team pt-100 pb-70">
    <div class="container">

         <div class="block-title text-center">
                    <h3> </h3>
                    
                </div>

        <div class="row">

        <?php foreach($categories as $catitem):?>
            <div class="col-lg-4 col-md-6">
                <a href="#">
                <div class="team-item">
                    <div class="team-img">
                        <?php if(!$catitem->icon){?>
                       <img src="<?php echo base_url(); ?>assets/images/1608959457773.png" alt="">
                       <?php }else{ ?>
                        <img src="<?php ?>assets/uploads/files/<?php echo $catitem->icon ?>" alt="">
                        <?php } ?>

                       
                        <div class="normal-text">
                            <h4 class="team-name"><?php echo $catitem->title ?></h4>
                            
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                               
                                <div class="team-details">
                                    <h4 class="team-name">
                                        <a href="<?= base_url() ?>category/<?= $catitem->title ?>/<?= $catitem->catId ?>"><?php echo $catitem->title ?></a>
                                    </h4>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div></a>
            </div>
            <?php endforeach ?>

        </div>
    </div>
    <!-- .container-fullwidth -->
</div>




<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/footer', $data);
?>