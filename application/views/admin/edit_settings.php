
<script src="<?php echo base_url() ?>js/app.js"></script>

<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$data['user'] = $this->ion_auth->user()->row();
$this->load->view('section/admin/header', $data);
?>


<?php
echo validation_errors('<span class="error">', '</span>');
?>
        <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Edit Settings</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/edit_settings') ?>



         <div class="media-object">
            <div class="media-object-section main-section img-preview">
                <div class="form-group">   
                <?= form_label('Logo', 'pro_pic', array('class' => '')) ?> <br>
                <?= form_upload('userfile1', 'pro_pic', array(
                'value' => 'thhhh.jpg', 
                'class' => 'btn btn-primary ', 
                'accept' => 'image/*', 
                'onchange' => 'previewFile()')) ?>
                 </div>
                <img id="Pro_prev" src="<?php echo base_url() ?>assets/uploads/files/<?php echo $settings['logo'] ?>"  width="100%" alt="Image preview..." class="hide thumbnail img-preview">
              
            </div>           
        </div>




        <div class="form-group col-md-6">            
        <label for="title">Site Name</label>
                <input type="text" name="site" placeholder="Enter Site Name"  value="<?php echo isset($settings['site_name']) ? $settings['site_name'] : "" ?>" class="form-control" required>
        </div>

      
        <div class="form-group col-md-6">            
        <label for="title">Email</label>
                <input type="text" name="email" placeholder="Enter Valid Email"  value="<?php echo isset($settings['email']) ? $settings['email'] : "" ?>" class="form-control" required>
        </div>


        <div class="form-group col-md-6">            
        <label for="title">Address</label>
                <input type="text" name="address" placeholder="Enter Address"  value="<?php echo isset($settings['address']) ? $settings['address'] : "" ?>" class="form-control" required>
        </div>


        <div class="form-group col-md-6">            
        <label for="title">Phone</label>
                <input type="text" name="phone" placeholder="Enter primary phone"  value="<?php echo isset($settings['phone']) ? $settings['phone'] : "" ?>" class="form-control" required>
        </div>

         <div class="form-group col-md-6">            
        <label for="title">Secondary Phone</label>
                <input type="text" name="phone2" placeholder="Enter Secondary phone"  value="<?php echo isset($settings['phone2']) ? $settings['phone2'] : "" ?>" class="form-control" required>
        </div>


        <div class="form-group col-md-6">            
        <label for="title">Twitter Link</label>
                <input type="text" name="twitter" placeholder="Enter Twitter Link"  value="<?php echo isset($settings['twitter_link']) ? $settings['twitter_link'] : "" ?>" class="form-control" required>
        </div>


        <div class="form-group col-md-6">            
        <label for="title">Facebook Link</label>
                <input type="text" name="facebook" placeholder="Enter Facebook Link"  value="<?php echo isset($settings['fb_link']) ? $settings['fb_link'] : "" ?>" class="form-control" required>
        </div>




        <div class="form-group col-md-6">            
        <label for="title">Linkedin Link</label>
                <input type="text" name="linkedin" placeholder="Enter Facebook Link"  value="<?php echo isset($settings['linkedin_link']) ? $settings['linkedin_link'] : "" ?>" class="form-control" required>
        </div>




        <div class="form-group col-md-6">            
        <label for="title">Webmail Link</label>
                <input type="text" name="webmail" placeholder="Enter webmail Link"  value="<?php echo isset($settings['webmail_link']) ? $settings['webmail_link'] : "" ?>" class="form-control" required>
        </div>


    
        


        </div>
        

        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Save Campaign', array("class" => "btn btn-primary")) ?>
         <div class="form-group">
        <?= form_close() ?>


</div>








    </div></div> </div></div></div>

<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
<script>
    $(function () {
        $('#dpMonths').fdatepicker();
    });
</script>