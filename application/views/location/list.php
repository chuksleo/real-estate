<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Locations(s)</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"><a href="<?php echo base_url() ?>admin/locations/add" class="btn btn-square btn-primary mb-2"> + Create Location </a></div>
                                <div class="card-body">
                                    <p id="message"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Featured</th>
                                                <th>Parent</th>
                                                <th>Status</th>                                               
                                                <th>Date Created</th>                         
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>

                                        <?php foreach($locations as $location):?>
                                            <?php if($location->parentid != 0){$plocation = $this->location_model->getLocationById($location->parentid);}?>
                                            <tr>
                                                <td><?php echo $location->location_title?></td>
                                                <td><?php echo $location->featured?></td>
                                                 <td><?php if($location->parentid == 0){echo "Main"; }else{ echo $plocation->location_title; }?></td>
                                                <td><?php echo $location->status?></td>
                                                <td><?php echo $location->date_created ?></td>
                                                 
                                                   <td>
                                                   <?php  $link_text = $this->property_model->cleanTitle($location->location_title);?>
                                                  <a href="<?php echo base_url() ?>admin/locations/edit/<?php echo $location->lid ?>" class="btn btn-square btn-primary mb-2" target="_blank"> Edit</a>  


                                                   <a href="<?php base_url() ?>locations/delete/<?php echo $location->lid ?>" class="btn btn-square btn-primary mb-2"> Delete</a></td>
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
