<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>


<!-- Modal -->

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
                                            <tr id="<?php echo "property_".$property->pid ?>">
                                               
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


                                                        <?php if($property->featured == "Yes" ){?>
                                                         <button class="btn btn-square btn-primary mb-2" onclick="markFeaturedProperty(<?php echo $property->pid ?>, 'No')" >Unmark Featured</button>


                                                        <?php }else{ ?>
                                                            <button class="btn btn-square btn-primary mb-2" onclick="markFeaturedProperty(<?php echo $property->pid ?>, 'Yes')" >Mark Featured</button>

                                                        <?php }?>
                                                        
                                                         <?php if($property->property_status == "Unpublished" ){?>
                                                          <button class="btn btn-square btn-primary mb-2" onclick="publishProperty(<?php echo $property->pid ?>)" >Publish</button>  
                                                        <?php }else{ ?>
                                                        <a href="#" onclick="unPublishProperty(<?php echo $property->pid ?>)" class="btn btn-square btn-primary mb-2"> Unpublish</a>

                                                          <?php } }?>
                                                          <button class="btn btn-square btn-primary mb-2" onclick="showDeleteDialogue(<?php echo $property->pid ?>)" >Delete</button>  


                                                  <a href="<?php echo base_url() ?>property/<?php echo $link_text ?>/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2" target="_blank"> View</a>  


                                                  <?php if($this->ion_auth->is_admin()){?>
                                                   <a href="<?php echo base_url() ?>admin/properties/edit/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                                  <?php }else{ ?>
                                                     <a href="<?php echo base_url() ?>user/properties/edit/<?php echo $property->pid ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                                <?php } ?>



                                            <div class="modal fade" id="<?php echo "property_".$property->pid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                 <p>You are about to permanently delete property: <?php echo $property->title ?> </p>
                                                 <p>Do you wish to Continue?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                  <button type="button" class="btn btn-primary" onclick="deleteProperty(<?php echo $property->pid ?>)">Yes</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                            </tr>
                                         <?php endforeach ?> 
                               

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                    </div></div>


<script type="text/javascript">
   let formModal = null
    function closeForm(){
        $('.modal').modal('hide');
        formModal.hide(false);
    }
    var pid
    function showDeleteDialogue(pid){
        
        formModal = $('#property_'+pid).modal({backdrop: 'static', keyboard: false, show: true});

    }



</script>
<?php

//Loading footer
$this->load->view('section/admin/footer');
?>
