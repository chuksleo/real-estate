



<?php
//Loading header


$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>

 <div class="content">
                <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body bg-primary text-white mailbox-widget pb-0">
                    <h2 class="text-white pb-3">Contact Us Mailbox</h2>
                    <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block"> INBOX</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="font-light mb-0"><span class="badge badge-pill text-white font-medium badge-danger mr-2"> <?=  $total_unread ?> Unread</span></h3>
                                </div>
                              
                            </div>
                            <!-- Mail list-->
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">

                                <thead>
                                    
                                    <tr>
                                        
                                       
                                        <td>Client Name</td>
                                        
                                        <td>Email</td>
                                        <td>Phone</td>

                                        <td>Message</td>
                                        <td>Date Created</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                    <tbody>

                                        <!-- row -->

                                        <?php foreach($messages as $message_item):?>

                                            
                                        <tr>
                                            <!-- label -->
                                            
                                            <!-- star -->
                                            <td><?= $message_item->first_name;  ?> <?= $message_item->last_name  ?> </td>
                                            <td>
                                                <span class="mb-0 text-muted"><?= $message_item->contact_email ?></span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <?= $message_item->phone ?>
                                            </td>
                                            <!-- Attachment -->
                                           
                                            <!-- Time -->
                                            <td class="text-muted">
                                            <h4><?= $message_item->subject ?></h4>
                                             <p>   <?= $message_item->contact_message ?></p></td>
                                             <td><?= $message_item->date_created;  ?></td>

                                             <td><a href="<?php echo base_url(); ?>admin/messageDelete/<?php echo $message_item->id ?>" class="btn btn-square btn-primary mb-2"> Delete</a></td>
                                        </tr>
                                        <!-- row -->


                                    <?php endforeach ?>




                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    


                        <div id="messageContent" class="message_view table-responsive" style="display: none">
                            

                       


                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//Loading footer
$this->load->view('section/admin/footer');
?>
