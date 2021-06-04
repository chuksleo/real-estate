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

        <?= form_open_multipart(base_url() . 'admin/categoryadd/') ?>


     




        <div class="form-group">            <label for="title">Category Title</label>
                <input type="text" name="title" placeholder="Enter Title"  value="<?php echo isset($category->title) ? $category->title : "" ?>" class="form-control" required>
        </div>
    <div class="form-row">

          <div class="form-group col-md-6">
            <label for="state">Category Status</label>
                <select name="status" class="form-control" required>
                                                   
                                                    <option value="On" selected>Active</option>
                                                    <option value="Off">Disabled</option>
                   </select>                                 
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please select a Category.</div>
          </div>

       


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
<script>
    $(function () {
        $('#dpMonths').fdatepicker();
    });
</script>