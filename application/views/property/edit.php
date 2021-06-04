
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
                        <h3><?php echo ucwords($action)  ?> Campaign</h3>
                        <p> <?php echo $campaign->Title ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'user-campaign/'. $action.'/'.$campaign->CampaignId) ?>



         <div class="media-object">
            <div class="media-object-section main-section img-preview">
                <div class="form-group">   
                <?= form_label('Campaign Photo', 'pro_pic', array('class' => '')) ?> <br>
                <?= form_upload('userfile1', 'pro_pic', array('class' => 'btn btn-primary ', 'accept' => 'image/*', 'onchange' => 'previewFile()')) ?>
                 </div>
                <img id="Pro_prev" src="<?php echo base_url() ?>uploads/campaign/profile/<?php echo $campaign->image ?>"  width="100%" alt="Image preview..." class="hide thumbnail img-preview">

            </div>           
        </div>




        <div class="form-group">            
        <label for="title">Campaign Title</label>
                <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($campaign->Title) ? $campaign->Title : "" ?>" class="form-control" required>
        </div>
<div class="form-row">

          <div class="form-group col-md-6">
            <label for="state">Select Category</label>
                <select name="Category" class="form-control" required>
                                                   
                                                    <?php foreach($categories as $cat):?>
                                                    <option value="<?php echo $cat->catId ?>" <?php if($cat->catId == $campaign->CategoryId){ echo "Selected";} ?> ><?php echo $cat->title ?></option>
                                                   <?php endforeach ?>
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Category.</div>
          </div>

       


 <div class="form-group col-md-6">
        <?= form_label('Target Amount', 'Amount') ?>  
       
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">₦</div>
                                                        </div>
                                                        <input name="Amount" id="Amount" type="text" class="form-control" value="<?php echo $campaign->Amount ?>" placeholder="0000" required <?php if(!$this->ion_auth->is_admin()){echo "disabled";}?>>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">.00</div>
                                                        </div>
                                                    </div>
   </div>
   </div>

   
      <div class="form-group col-md-6">
       
        <?= form_label('Campaign End Date', 'EndDate') ?>
        <input name="EndDate"  type='text' id="dpd2"  value="<?php echo isset($campaign->EndDate) ? $campaign->EndDate : "" ?>" class='datepicker-here form-control' data-language='en' required <?php if(!$this->ion_auth->is_admin()){echo "disabled";}?> />
      
      </div>
    
          <div class="form-group">
        <?= form_label('Campaign Description', 'description') ?>               
        <?php echo $this->ckeditor->editor('description', isset($campaign->Description) ? $campaign->Description : ""); ?> <?php echo form_error('description', '<p class="error">'); ?>
       </div>
       <input type="hidden" value="<?php echo $campaign->UserId ?>" name="user">

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