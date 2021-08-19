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
                                
                                <a href="<?php echo base_url() ?>admin/projects/add" class="btn btn-square btn-primary mb-2"> + Add Project </a>
                               

                                </div>
                                <div class="card-body">

                                   <?php $val = $this->session->flashdata('message'); echo '<div class="alert-info">'.$val.'</div>'; ?>
                                    <p id="message"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Title</th>
                                                <th>Description</th>                          
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($projects as $project):?>
                                            <tr>
                                               
                                                <td><?php echo $project->project_title ?></td>
                                                 <td><?php echo $project->description?></td>
                                               
                                                   <td>
                                                   <?php  $link_text = $this->property_model->cleanTitle($project->project_title);?>

                                                   
                                                                                   
                                                   <a href="<?php echo base_url() ?>admin/projects/edit/<?php echo $project->project_id ?>" class="btn btn-square btn-primary mb-2"> Edit</a>


                                                   <a href="<?php echo base_url() ?>admin/projects/delete/<?php echo $project->project_id ?>" class="btn btn-square btn-primary mb-2"> Delete</a>
                                                   </td>
                                                 
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
