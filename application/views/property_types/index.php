<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Property Types</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"><a href="<?php echo base_url() ?>admin/properties/types/add" class="btn btn-square btn-primary mb-2"> + Create Property Type </a></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Title</th>
                                                
                                                <th>Status</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($ptypes as $type):?>
                                            <tr>
                                               
                                                <td><?php echo $type->title ?></td>
                                                
                                                <td><?php echo $type->status?></td>
                                                
                                                   <td><a href="<?php echo base_url() ?>admin/properties/types/edit/<?php echo $type->ptype_id ?>" class="btn btn-square btn-primary mb-2"> Edit</a>   <a href="<?php echo base_url() ?>admin/properties/types/delete/<?php echo $type->ptype_id ?>" class="btn btn-square btn-primary mb-2"> Delete</a></td>
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
