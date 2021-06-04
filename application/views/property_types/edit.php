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
                        <h3><?php echo $action ?> Property Type</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/propertyTypeEdit/'.$property->ptype_id) ?>


         




        <div class="form-group">            <label for="title">Property Type Title</label>
                <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($property->title) ? $property->title : "" ?>" class="form-control" required>
        </div>
    <div class="form-row">

          <div class="form-group col-md-6">
            <label for="state">Property Type Status</label>
                <select name="status" class="form-control" required>
                                                 
                                                    <option value="On" <?php if($property->status == 'On'){ echo "Selected";} ?> >Active</option>
                                                    <option value="Off" <?php if($property->status == 'Off'){ echo "Selected";} ?> >Disabled</option>
                   </select>                                 
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please set a Status.</div>
          </div>

       


   </div>


     


        </div>
        

        <?= form_fieldset_close() ?>
         <div class="form-group col-md-6">
        <?= form_submit('submit', 'Save', array("class" => "btn btn-primary")) ?>
         <div class="form-group">
        <?= form_close() ?>















                        </div>








    </div></div> </div></div></div>

<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
