<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Donation(s)</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Full Name</th>
                                                <th>Campaign</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Country</th>
                                                <th>Date</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($donations as $donation):?>
                                            <tr>
                                                <td><?php echo $donation->id?></td>
                                                <td><?php echo $donation->full_name?></td>
                                                <td><?php echo $donation->campaign_id?></td>
                                                <td><?php echo $donation->email ?></td>
                                                <td><?php echo $donation->amount ?></td>
                                                 <td><?php echo $donation->country ?></td>
                                                  <td><?php echo $donation->date_created ?></td>
                                                   <td><a href="<?php base_url() ?>donation/view/<?php echo $donation->id ?>" class="btn btn-square btn-primary mb-2"> View</a></td>
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
