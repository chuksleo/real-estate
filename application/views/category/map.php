<script src="<?php echo base_url() ?>js/app.js"></script>

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
                        <h3><?php echo $action ?> Category</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/categoryMap') ?>


         




    <div class="form-row">

          <div class="form-group col-md-12">
            <label for="state">Category</label>
                <select name="category" id="select-category" class="form-control" onchange="getCategoryTypes('map')" required>
                                        <option value="">Select Category ...</option>   
                                                 <?php  foreach ($categories as $category): ?>
                                                    
                                                
                                                    <option value="<?php echo $category->catId ?>"><?php echo $category->title?></option>

                                                <?php endforeach ?>
                                                   
                   </select>                                 
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Category.</div><br><br>
                

 
<div id="response"></div>
<div id="types"></div>




  
          </div>

<div class="col-md-12">
    
    <h4>Pick Types For Category:</h4>              
<hr>
</div>


<?php foreach ($types as $type): ?>
           <?php $clean_title = $this->property_model->cleanTitle($type->title)  ?>
<div class="col-md-6">
     

    <div class="funkyradio">
       
       
        <div class="funkyradio-primary">
            <input type="checkbox" value="<?= $type->ptype_id ?>" name="<?= $clean_title ?>" id="check-<?=$clean_title ?>"  />
            <label for="check-<?=$clean_title ?>"><?= $type->title ?></label>
        </div>
        
        
    </div>
</div>
<?php endforeach ?>



       


   </div>



     


        </div>
        

        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Save Category', array("class" => "btn btn-primary")) ?>
         <div class="form-group">
        <?= form_close() ?>















                        </div>








    </div></div> </div></div></div>

<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
