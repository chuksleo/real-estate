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
                        <h3><?php echo ucfirst($action) ?> Property</h3>
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
            <input type="button" name="upload" id="upload" value="Upload" class="remove-image" />  
            </div>



               <button id="uploading" class="remove-image" type="button" style="display: none;" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Uploading...
            </button> 
          </div>
     


        </form>

<style type="text/css">
  .delete {
    position: absolute;
    z-index: 1;
}
</style>

        <?php $attributes = array('class' => '', 'id' => 'propertyform'); ?>
        <?= form_open_multipart(base_url() . 'user/properties/'. $action.'/'.$property->pid, $attributes) ?>

         <div id="uploaded_image" class="col-lg-12">  

        
         <?php foreach ($images as $image): ?>
          
          
         <span class="delete" onclick='deleteImage(<?=  $image->imgid ?>)'><i class="fas fa-window-close" ></i></span>
         <input type="hidden" id="image-name" name="image" value="<?=  "$image->filename" ?>">
         <img src="<?php echo base_url() ?>assets/uploads/property/<?= $image->filename ?>" class="img-thumbnail col-sm-2 item-<?php echo $image->imgid ?>" />
          <?php endforeach ?>
           </div>  

           



          
        <div class="form-group">            
          <label for="title">Title</label>
          <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($property->title) ? $property->title : "" ?>" class="form-control" required>
        </div>
        <div class="form-row">

            <div class="form-group col-md-6">
              <label for="state">Select Category</label>
                  <select name="category" id="select-category" onchange="getCategoryTypes('create')" class="form-control" required>
                                                      <option value="" selected>Choose...</option>
                                                      <?php foreach($categories as $cat):?>
                                                      <option value="<?php echo $cat->catId ?>"><?php echo $cat->title ?></option>
                                                     <?php endforeach ?>
                 </select>
                 <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please select a Category.</div>
            </div>



            <div class="form-group col-md-6">
              <label for="state">Select Property  Type</label>
                  <select name="type" id="types" class="form-control" required>
                                                      <option value="None" selected>Choose...</option>
                                                       
                 </select>
                 <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please select a type.</div>
            </div>

       


           
        </div>
        <div class="form-row">
  

            <div class="form-group col-md-6">
                  <label for="state">Size(sqm)</label>
                    <input name="size"  type='text' id="size"  value="<?php echo isset($property->size_sqm) ? $property->size_sqm : "" ?>" class='form-control' data-language='en'  required /> 
                </div>



            <div class="form-group col-md-6">
                  <label for="state">Address</label>
                    <input name="address"  type='text' id="address"  value="<?php echo isset($property->property_address) ? $property->property_address : "" ?>" class='form-control' data-language='en'  required /> 
                </div>



        </div>


        <div class="form-row"> 


           <div class="form-group col-md-6">
                <?= form_label('Price', 'Amount') ?>  
       
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">₦</div>
                    </div>
                    <input name="price" id="price" type="text" class="form-control" value="<?php echo isset($property->price) ? $property->price : "" ?>" placeholder="0000" required>
                    <div class="input-group-append">
                        <div class="input-group-text">.00</div>
                    </div>

                    
                </div>
            </div>


             <div class="form-group check-negotiate">


                  <?php
                    $data = array(
                    'name'        => 'negotiate',
                    'id'          => 'check-price-negotiable',
                    'value'       => 'No',
                    'checked'     => FALSE,

                    );

                      echo form_checkbox($data);

                  ?>
                   <label for="check-price-negotiable">Price Negotiable</label>
                    
                </div>


        </div>

         

        </div>


       </div>







                          <div class="card">
                        <div class="card-header">Facilicites</div>
                        <div class="card-body">

                                  <div class="row">

                                  <?php foreach($facilities as $facility): ?>
                                    <?php 
                                          $title =  $this->property_model->cleanTitle($facility->name);

                                          $isExist = $this->property_model->checkValueInFacilityArray($facility->facility_id, $property_facilities);

                                          // echo $isExist;

                                      ?>
                                      <div class="col-sm-3 col-md-3">

                                     
                                          <div class="form-group">
                                           <?php
                                                $data = array(
                                                'name' => $title,
                                                'id'   => 'check-'.$title,
                                                'value'    => $facility->facility_id,
                                                 'checked'     => $isExist,


                                                  );

                                              echo form_checkbox($data);

                                          ?>
                                          <label for="check-<?= $title ?>"><?= $facility->name ?></label>
                                          </div>


                                         </div><!--end Col -->

                                         <?php endforeach ?>
                                </div>


                                            </div><!-- end row -->

                        </div>











            <div class="card">
                        <div class="card-header">Other Details</div>
                        <div class="card-body">


                          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="state">Select Location</label>
                  <select name="location" class="form-control" required>
                                                      <option value="" selected>Choose...</option>
                                                      <?php foreach($locations as $location):?>
                                                      <option value="<?php echo $location['location'] ?>" <?php if($location['location'] == $property->location_title){ echo "selected";} ?> >
                                                      <?php echo $location['location'] ?></option>

                                                        <?php if($location['sublocation']){?>


                                                          <?php $i=0;  foreach($location['sublocation'] as $sublocation): ?>
                                                              <option value="<?php echo $sublocation ?>" <?php if($sublocation == $property->location_title){ echo "selected";} ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <?php echo $sublocation ?></option>

                                                                <?php $i=0;  foreach($location['lastsublocations'] as $lsublocation): ?>
                                                              <option value="<?php echo $lsublocation ?>" <?php if($lsublocation == $property->location_title){ echo "selected";} ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <?php echo $lsublocation ?></option>



                                                          <?php endforeach ?>


                                                          <?php endforeach ?>

                                                        <?php } ?>
                                                       <?php endforeach ?>
                 </select>
                 <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please select a Location.</div>
            </div>



            <div class="form-group col-md-6">
              <label for="state">Condition</label>
                  <select name="condition" class="form-control" required>
                      <option value="Newly Built" <?php if($property->property_condition == 'Newly Built'){ echo "Selected";} ?>>Used</option>
                      <option value="Fairly Used" <?php if($property->property_condition == 'Fairly Used'){ echo "Selected";} ?>>New</option>
                      <option value="Old" <?php if($property->property_condition == 'Old'){ echo "Selected";} ?>>Old</option>
                                                      
                                                      
                 </select>
                 <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please select a condition.</div>
            </div>

       


           
        </div> 





        <div class="form-row">

            <div class="form-group col-md-6">
              <label for="state">Bedroom(s)</label>
                  <input name="bedroom"  type='text' id="bedroom"  value="<?php echo isset($property->bedrooms) ? $property->bedrooms : "" ?>" class='form-control' data-language='en'  required /> 
                
            </div>



            <div class="form-group col-md-6">
              <label for="state">Bathroom(s)</label>
                    <input name="bathroom"  type='text' id="bathroom"  value="<?php echo isset($property->bathrooms) ? $property->bathrooms : "" ?>" class='form-control' data-language='en'  required /> 
                
            </div>

       


           
        </div> 



         <div class="form-row">

          

           
        </div> 


       <div class="form-group">
                                <?= form_label('Property Description', 'description') ?>               
                                <?php echo $this->ckeditor->editor('description', isset($property->description) ? $property->description : ""); ?> <?php echo form_error('description', '<p class="error">'); ?>
       </div>




                        
                        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Save Property', array("class" => "btn btn-primary")) ?>
         <div class="form-group"> 
        <?= form_close() ?>

    </div> <!-- End Col 12 -->
            </div></div> <!-- card Two -->

 
   

    </div> </div>




    
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