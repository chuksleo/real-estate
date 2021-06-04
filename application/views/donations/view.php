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

                                            <dl class="dl-horizontal">

                      <!-- start -->
                      <dt>ID</dt>
                      <dd><?php echo $donation->id ?></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Full name</dt>
                      <dd><?php echo $donation->full_name ?></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Campaign</dt>
                      <dd><a href="<?php echo base_url() ?>campaign/<?php echo $donation->campaign_id ?>" target="_blank">Campaign <i class="fa fa-external-link-square"></i></a></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Email</dt>
                      <dd><?php echo $donation->email ?></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Donation</dt>
                      <dd><strong class="text-success"><?php echo $donation->amount ?></strong></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Country</dt>
                      <dd><?php echo $donation->country ?></dd>
                      <!-- ./end -->

                     

                      <!-- start -->
                      <dt>Payment gateway</dt>
                      <dd><?php echo $donation->payment_gateway ?></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Comment</dt>
                      <dd>
                                       <?php echo $donation->comment ?>
                       </dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Date</dt>
                      <dd><?php echo $donation->date_created ?></dd>
                      <!-- ./end -->

                      <!-- start -->
                      <dt>Anonymous</dt>
                      <dd>
                                                <?php echo $donation->Ananymous ?>
                                                </dd>
                      <!-- ./end -->

            <!-- start -->
                      <dt>Reward</dt>
                      <dd>
                                                No
                                                </dd>
                      <!-- ./end -->

                    </dl>
                                  
                                </div>
                            </div>
                        </div>



                    </div>
                    </div></div>


<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
