<script src="<?php echo base_url() ?>js/app.js"></script>

<?php
//Loading header
$data['title'] = '';

$data['user'] = $this->ion_auth->user()->row();
$this->load->view('section/admin/header', $data);
?>


<?php
echo validation_errors('<span class="error">', '</span>');
?>
        <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3><?php echo $action ?> Banner</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/banners/'. $action.'/'.$banner->banner_id) ?>

                     <?php $val = $this->session->flashdata('image_errors'); echo '<div class="alert-success">'.$val.'</div>'; ?>
         <div class="media-object">
            <div class="media-object-section main-section img-preview">
                <div class="form-group">   
                <?= form_label('Banner', 'pro_pic', array('class' => '')) ?> <br>
                <?= form_upload('userfile1', 'pro_pic', array('class' => 'btn btn-primary ', 'accept' => 'image/*', 'onchange' => 'previewFile()')) ?>
                 </div>
                <img id="Pro_prev" src="<?php echo base_url() ?>assets/uploads/banners/<?= $banner->banner_image ?>"  width="100%" alt="Image preview..." class="hide thumbnail img-preview">

            </div>           
        </div>




        <div class="form-group col-md-6">            <label for="title">Title</label>
                <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($banner->title) ? $banner->title : "" ?>" class="form-control" required>
        </div>

        <div class="form-group col-md-6">            <label for="title">Slug Text</label>
                <input type="text" name="slug" placeholder="Enter Slug Text"  value="<?php echo isset($banner->slug) ? $banner->slug : "" ?>" class="form-control" >
        </div>

         


        

           <div class="form-group col-md-6">
            <label for="state">Active</label>
                <select name="status" class="form-control">
                    <option value="No" <?php if($banner->active == 'No'){ echo "Selected";} ?>>No</option>
                    <option value="Yes" <?php if($banner->active == 'Yes'){ echo "Selected";} ?>>Yes</option>
                  
                                                    
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Status.</div>
          </div>

         

          


        </div>
        

        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Save Banner', array("class" => "btn btn-primary")) ?>
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