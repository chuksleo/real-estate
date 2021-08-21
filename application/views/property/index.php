<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3><?= $page_header ?></h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                 <?php if($this->ion_auth->is_admin()){?>
                                <a href="<?php echo base_url() ?>admin/properties/add" class="btn btn-square btn-primary mb-2"> + Add Property </a>

                                <?php }else{?>
                                <a href="<?php echo base_url() ?>user/properties/add" class="btn btn-square btn-primary mb-2"> + Add Property </a>
                                <?php } ?>

                                </div>
                                <div class="card-body">
                                   <?php $val = $this->session->flashdata('message'); echo '<div class="alert-info">'.$val.'</div>'; ?>
                                    <p id="message"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Posted By</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Sold Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($properties as $property):?>
                                            <tr>
                                               
                                                <td><?php echo $property->title ?></td>
                                                 <td><?php echo $property->price?></td>
                                                <td><?php echo $property->property_address?></td>

                                                <td><?php echo $property->username?></td>
                                                <td><?php echo $property->property_status ?></td>
                                                 <td><?php echo $property->date_created ?></td>
                                                  <td><?php echo $property->sold ?></td>
                                                   <td>
                                                   <?php  $link_text = $this->property_model->cleanTitle($property->title);?>

                                                   <?php if($this->ion_auth->is_admin()){?>
                                                        <button class="btn btn-square btn-primary mb-2" onclick="markSoldProperty(<?php echo $property->pid ?>)" >Mark Sold</button>  
                                                         <button class="btn btn-square btn-primary mb-2" onclick="markFeaturedProperty(<?php echo $property->pid ?>)" >Mark Featured</button>
                                                         <?php if($property->property_status == "Unpublished" ){?>
                                                          <button class="btn btn-square btn-primary mb-2" onclick="publishProperty(<?php echo $property->pid ?>)" >Publish</button>  
                                                        <?php }else{ ?>
                                                        <a href="#" onclick="unPublishProperty(<?php echo $property->pid ?>)" class="btn btn-square btn-primary mb-2"> Unpublish</a>

                                                          <?php } }?>
                                                  <a href="<?php echo base_url() ?>property/<?php echo $link_text ?>/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2" target="_blank"> View</a>  


                                                  <?php if($this->ion_auth->is_admin()){?>
                                                   <a href="<?php echo base_url() ?>admin/properties/edit/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                                  <?php }else{ ?>
                                                     <a href="<?php echo base_url() ?>user/properties/edit/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                                <?php } ?>
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
