<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Withdrawals(s)</h3>
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
                                                <th>Campaign</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Status</th>
                                                <th>Date</th>                                              
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($withdrawals as $withdrawal):?>
                                            <tr>
                                                <td><?php echo $withdrawal->id?></td>
                                                <td><?php echo $withdrawal->campaign_id?></td>
                                                <td><?php echo $withdrawal->amount ?></td>
                                                <td><?php echo $withdrawal->method ?></td>
                                                <td><?php echo $withdrawal->status ?></td>
                                                 <td><?php echo $withdrawal->date ?></td>
                                                
                                                   <td>
                                                   <?php if($withdrawal->status == "Paid"){ ?>

                                                   <span class="badge badge-success">Paid</span>
                                                 
                                                   <?php }else{ ?>


                                                          <a href="<?php base_url() ?>withdrawal/view/<?php echo $withdrawal->id ?>" class="btn btn-square btn-primary mb-2"> Cancel </a>
                                                   <?php } ?>
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
