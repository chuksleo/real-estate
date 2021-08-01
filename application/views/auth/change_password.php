
<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>


 <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3><?php echo lang('change_password_heading');?></h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        
                        <div class="card-body">
                           <div id="infoMessage"><?php echo $message;?></div>
                           <?php echo form_open("auth/change_password");?>


                   <div class="form-group">        
                     <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                     <?php echo form_input($old_password);?>
               </div>

              <div class="form-group">   
                     <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                     <?php echo form_input($new_password);?>
               </div>

              <div class="form-group">   
                     <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                     <?php echo form_input($new_password_confirm);?>
               </div>

               <?php echo form_input($user_id);?>
               <div class="form-group">   <?php echo form_submit('submit', lang('change_password_submit_btn') , array("class" => "btn btn-primary"));?></div>

               <?php echo form_close();?>


                        </div>
                        </div>
                        </div>
                     </div>
</div>
</div>



<?php
//Loading footer
$this->load->view('section/admin/footer');
?>