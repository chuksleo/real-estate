<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Banner(s)</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"><a href="<?php echo base_url() ?>admin/banners/add" class="btn btn-square btn-primary mb-2"> + Create Banner </a></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Status</th>                                               
                                                                       
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($banners as $banner):?>
                                            <tr>
                                                <td><?php echo $banner->title?></td>
                                                <td><?php echo $banner->slug?></td>
                                                 <td><img width="100" src="<?php echo base_url() ?>assets/uploads/banners/<?= $banner->banner_image ?>"></td>
                                                <td><?php echo $banner->active?></td>
                                               
                                                   <td>
                                                   <?php  $link_text = $this->property_model->cleanTitle($banner->title);?>
                                                  <a href="<?php echo base_url() ?>banners/edit/<?php echo $banner->banner_id ?>" class="btn btn-square btn-primary mb-2" target="_blank"> Edit</a>  


                                                   <a href="<?php base_url() ?>banners/delete/<?php echo $banner->banner_id ?>" class="btn btn-square btn-primary mb-2"> Delete</a></td>
                                            </tr>
                                         <?php endforeach ?> 

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                    </div></div>


<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
