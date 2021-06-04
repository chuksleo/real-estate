
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
                        <h3>Edit Static Languges</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

        <?= form_open_multipart(base_url() . 'admin/edit_lang/'.$lang['id']) ?>



       



        <div class="form-group col-md-6">            
        <label for="title">Field</label>
                <input type="text" name="field" placeholder="Enter Title"  value="<?php echo isset($lang['field']) ? $lang['field'] : "" ?>" class="form-control" required>
        </div>


        
   
     
          <div class="form-group">
        <?= form_label('Value', 'value') ?>               
        <?php echo $this->ckeditor->editor('value', isset($lang['value']) ? $lang['value'] : ""); ?> <?php echo form_error('value', '<p class="error">'); ?>
       </div>


        <div class="form-group col-md-6">
            <label for="state">Select Status</label>
                <select name="status" class="form-control" required>
                                                  
                                                    <option value="Enabled" selected>Enabled</option>
                                                    <option value="Disabled">Disabled</option>
                                                   
               </select>
               <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Category.</div>
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
<script>
    $(function () {
        $('#dpMonths').fdatepicker();
    });
</script>