
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
                        <h3><?php echo ucfirst($action)  ?> Location</h3>
                        <p> <?php echo $loc->location_title ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/locations/'. $action.'/'.$loc->lid) ?>



         <div class="media-object">
            <div class="media-object-section main-section img-preview">
                <div class="form-group">   
                <?= form_label('location Banner', 'pro_pic', array('class' => '')) ?> <br>
                <?= form_upload('userfile1', 'pro_pic', array('class' => 'btn btn-primary ', 'accept' => 'image/*', 'onchange' => 'previewFile()')) ?>
                 </div>
                <img id="Pro_prev" src="<?php echo base_url() ?>assets/uploads/location/<?php echo $loc->banner_image ?>"  width="100%" alt="Image preview..." class="hide thumbnail img-preview">

            </div>           
        </div>




        <div class="form-group col-md-6">            
        <label for="title">Location Title</label>
                <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($loc->location_title) ? $loc->location_title : "" ?>" class="form-control" required>
        </div>

          <div class="form-group col-md-6">
           <label for="state">Select Parent</label>
                <select name="parentid" class="form-control" required>
                                                   <option selected> --- Select Parent --- </option>
                                                   <?php foreach($locations as $location):?>
                                                    <option value="<?php echo $location->lid ?>"  <?php if($loc->parentid != 0 and $loc->parentid == $location->lid){ echo "Selected";} ?>   ><?php echo $location->location_title ?></option>
                                                   <?php endforeach ?>
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Location Parent.</div>
          </div>


    <div class="form-group col-md-6">
            <label for="state">Featured</label>
                <select name="featured" class="form-control">
                                                     <option value="No" <?php if($loc->featured == 'No'){ echo "Selected";} ?>>No</option>
                                                    <option value="Yes" <?php if($loc->featured == 'Yes'){ echo "Selected";} ?>>Yes</option>
                                                    
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a featured.</div>
          </div>


    <div class="form-group col-md-6">
            <label for="state">Status</label>
                <select name="status" class="form-control" required>
                                                    
                                                    <option value="publish" <?php if($loc->status == 'publish'){ echo "Selected";} ?>>Publish</option>
                                                    <option value="unpublish" <?php if($loc->status == 'unpublish'){ echo "Selected";} ?>>Unpublish</option>
                                                   
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Status.</div>
          </div>
          <input type="hidden" value="<?php echo $loc->date_created ?>" name="dateval">

   
     
    
          <div class="form-group">
        <?= form_label('Location Description', 'description') ?>               
        <?php echo $this->ckeditor->editor('description', isset($loc->description) ? $loc->description : ""); ?> <?php echo form_error('description', '<p class="error">'); ?>
       </div>
       
        </div>
        

        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Update Location', array("class" => "btn btn-primary")) ?>
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