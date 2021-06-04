<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Reported Campign(s)</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Campaign</th>
                                                <th>Comment</th>
                                                <th>Date Created</th>

                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($reports as $report):?>
                                            <tr>
                                                <td><?php echo $report->repid?></td>
                                                <td><a href="<?php echo base_url() ?>campaign/<?php echo str_replace(' ', '-', $report->Title) ?>/<?php echo $report->CampaignId ?>" class="link-color" target="_blank"><?php echo $report->Title?></a></td>
                                                <td><?php echo $report->comment ?></td>
                                                <td><?php echo $report->date_created ?></td>
                                               
                                                   <td><a href="<?php base_url() ?>#" class="btn btn-square btn-primary mb-2"> Delete</a></td>
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
