<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>All Properties</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"><a href="<?php echo base_url() ?>admin/properties/add" class="btn btn-square btn-primary mb-2"> + Add Property </a></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Last Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($properties as $property):?>
                                            <tr>
                                               
                                                <td><?php echo $property->title ?></td>
                                                 <td><?php echo $property->price?></td>
                                                <td><?php echo $property->address?></td>
                                                <td><?php echo $property->status ?></td>
                                                 <td><?php echo $property->date_created?></td>
                                                  <td><?php echo $property->last_updated ?></td>
                                                   <td>
                                                   <?php  $link_text = $this->property_model->cleanTitle($property->title);?>
                                                  <a href="<?php echo base_url() ?>properties/<?php echo $link_text ?>/<?php echo $property->id ?>" class="btn btn-square btn-primary mb-2" target="_blank"> View</a>  


                                                   <a href="<?php base_url() ?>user-property/edit/<?php echo $property->id ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
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
