

<div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard </h2>
                        </div>
                    </div>
                    <div class="row">
                     <?php if($this->ion_auth->is_admin()){ ?>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-building"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Properties</p>
                                                <span class="number"><?php echo $total_properties ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <a href=""><i class="fas fa-envelope-open-text"></i> View More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-eye"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Views Today</p>
                                                <span class="number"><?php echo $total_reviews?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <a href="<?php ?>admin/"><i class="fas fa-envelope-open-text"></i> View More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="violet fas fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">New Clients</p>
                                                <span class="number"><?php echo $total_members ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                             <a href=""><i class="fas fa-envelope-open-text"></i> View More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="orange fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Today Messages</p>
                                                <span class="number"><?php echo $total_inspection_request ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <a href=""><i class="fas fa-envelope-open-text"></i> View More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <?php }else{ ?>


                          <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-building"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">My Properties</p>
                                                <span class="number"><?php echo $total_properties ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <a href=""><i class="fas fa-envelope-open-text"></i> View More...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                         <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-file"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Views Today</p>
                                                <span class="number"><?php if(!isset($todayViews)){echo "0";}else{ echo $todayViews; }?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>



                         <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-file"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle"> Contacts Today</p>
                                                <span class="number"><?php if(!isset($todayContacts)){echo "0";}else{ echo $todayContacts; }?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                         <?php } ?>
                    </div>
                    <div class="row">
                        
            <?php if(!$this->ion_auth->is_admin()){ ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">My Property View Stat</h5>
                                        <p class="text-muted">Live website data update for properties</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th>Property Title</th>
                                                    <th class="text-right">Number of Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo "My Title" ?> <a href="#"><i class="fas fa-link blue" title="view property"></i></a></td>
                                                    <td class="text-right">8,340</td>
                                                </tr>
                                               
                                              
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



 <?php }else{ ?>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Top Properties</h5>
                                        <p class="text-muted">Live website data update for properties</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th>Property Title</th>
                                                    <th class="text-right">Number of Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo "My Title" ?> <a href="#"><i class="fas fa-link blue" title="view property"></i></a></td>
                                                    <td class="text-right">8,340</td>
                                                </tr>
                                               
                                              
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                         <?php } ?>
                    </div>
<?php if($this->ion_auth->is_admin()){ ?>
                     <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">All Time</div>
                            <h2 class="page-title">Statistics </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="blue large-icon mb-2 fas fa-building"></i>
                                            <h4 class="mb-0">+21,900</h4>
                                            <p class="text-muted">TOTAL PROPERTIES</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="orange large-icon mb-2 fas fa-eye"></i>
                                            <h4 class="mb-0">+22,566</h4>
                                            <p class="text-muted">TOTAL Views</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="grey large-icon mb-2 fas fa-envelope"></i>
                                            <h4 class="mb-0">+15,566</h4>
                                            <p class="text-muted">TOTAL Clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="olive large-icon mb-2 fas fa-briefcase"></i>
                                            <h4 class="mb-0">+98,601</h4>
                                            <p class="text-muted">TOTAL Messages</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
   
