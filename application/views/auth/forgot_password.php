<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['catregories'] = $categories;
$this->load->view('section/header', $data);
?>

<section class="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 login-box">



    <div class="medium-6 medium-centered large-6 large-centered small-6 small-centered">
<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), array("class" => "button"));?></p>

<?php echo form_close();?>
         </div>
</div></div></div></section>
<?php
//Loading footer
$this->load->view('section/footer');
?>
