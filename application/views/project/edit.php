<script src="<?php echo base_url() ?>js/app.js"></script>

<script type="text/javascript">


</script>
<?php
//Loading header
$data['title'] = 'Login';

$data['user'] = $this->ion_auth->user()->row();
$this->load->view('section/admin/header', $data);



?>


<?php
echo validation_errors('<span class="error">', '</span>');
?>
        <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3><?php echo ucfirst($action) ?> Project</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header">Basic Info</div>
                        <div class="card-body">


      <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  

        <div class="file-upload">
              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

           

            
            <input id="image_file" class="file-upload-input" name="image_file" type='file' onchange="readURL(this);" accept="image/*" />
            
            <div class="drag-text">
              <h3>Drag and drop a file or select add Image</h3>
            </div>
          </div>
          <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
             <input type="button" name="upload" id="projectupload" value="Upload" class="remove-image" /> 


            <button id="uploading" class="remove-image" type="button" style="display: none;" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Uploading...
            </button> 


            </div>
          </div>
     


        </form>



        <?php $attributes = array('class' => '', 'id' => 'propertyform'); ?>
        <?= form_open_multipart(base_url() . 'admin/projects/'. $action.'/'.$project->project_id, $attributes) ?>

         <div id="uploaded_image" class="col-lg-12">  

        
         <?php foreach ($images as $image): ?>
          

         <img src="<?php echo base_url() ?>assets/uploads/projects/<?= $image->image ?>" class="img-thumbnail col-sm-2" />
          <?php endforeach ?>
           </div>  

           



          
        <div class="form-group">            
          <label for="title">Project Title</label>
          <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($project->project_title) ? $project->project_title : "" ?>" class="form-control" required>
        </div>
        <div class="form-row">

            

          <div class="form-group">
                                <?= form_label('Project Description', 'description') ?>               
                                <?php echo $this->ckeditor->editor('description', isset($project->description) ? $project->description : ""); ?> <?php echo form_error('description', '<p class="error">'); ?>
        </div>




                        
         <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
                    <?= form_submit('submit', 'Update Project', array("class" => "btn btn-primary")) ?>
                 <div class="form-group"> 
                    <?= form_close() ?>

                </div> 
        </div>

       


           
        </div>



        

         

        </div>


       </div>







                          











           </div>




    
    </div> <!-- ENd Row -->


    </div>

<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
<script>
    $(function () {
        $('#dpMonths').fdatepicker();
    });
</script>