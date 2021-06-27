<?php
//Loading header
$data['title'] = 'Login';
// $data['javascript'] = 'app.js';
// $data['catregories'] = $categories;
$this->load->view('section/header', $data);
?>



<div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(http://placehold.it/1200x260&amp;text=IMAGE+PLACEHOLDER);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Login/Register</h1>
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
                <div class="page">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="alert alert-default fade in">
                                <h4>Before you Login/Register!</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>
                         </div>
                        </div>
                        <div class="col-md-4 col-sm-4 login-form">


                   
                    <h1><?php echo lang('login_heading'); ?></h1>
                    <p><?php echo lang('login_subheading'); ?></p>


                        <?php echo form_open("auth/login"); ?>

                         <div class="input-group">
                                    <div class="col-xl-12">
                                    <div class="billing_input_box">
                            <?php echo lang('login_identity_label', 'identity'); ?>
                            <?php echo form_input(isset($identity)? $identity : ""); ?>
                            </div>
                        </div></div>

                         <div class="input-group">
                                    <div class="col-xl-12">
                                    <div class="billing_input_box">
                                        <?php echo lang('login_password_label', 'password'); ?>
                                        <?php echo form_input(isset($password)? $password : ""); ?>
                            </div>
                       </div></div>

                         <div class="input-group">
                                    <div class="col-xl-12">
                            <?php echo lang('login_remember_label', 'remember'); ?>
                            
                        <div class="switch">            
                            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="switch-input"'); ?>            
                            <label class="switch-paddle" for="remember">
                                <span class="show-for-sr">Remember me</span>
                            </label>
                        </div>
                        </p>


                         <div class="place_order_btn">
                         <?php echo form_submit('submit', lang('login_submit_btn'), array("class" => "btn btn-primary")); ?></div>

                        <?php echo form_close(); ?>

                        <p><a href="forgot_password" class="button"><?php echo lang('login_forgot_password'); ?></a></p>

                        </div>

    
                    </div>
                </div>
            </div>
        </div>
  </div>

<?php
//Loading footer
$this->load->view('section/footer');
?>










                  
                    </div>
                </div>
            </div>
        </div>
  </div>
  <!-- Start Site Footer -->