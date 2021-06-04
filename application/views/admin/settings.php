<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Site Setting(s)</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                    
                                        <tbody>
                                            <tr>
                                                <td>Site Name</td>
                                                <td><?php echo $settings['site_name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Logo</td>
                                                <td><img src="<?php echo base_url()?>assets/uploads/files/<?php echo $settings['logo']?>"> </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $settings['email']?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $settings['address']?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?php echo $settings['phone']?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?php echo $settings['phone2']?></td>
                                            </tr>
                                            <tr>
                                                <td>Twitter</td>
                                                <td><?php echo $settings['twitter_link']?></td>
                                            </tr>
                                            <tr>
                                                <td>Facebook</td>
                                                <td><?php echo $settings['fb_link']?></td>
                                            </tr>
                                            <tr>
                                                <td>Linkedin</td>
                                                <td><?php echo $settings['linkedin_link']?></td>
                                            </tr>
                                            <tr>
                                                <td>Webmail</td>
                                                <td><?php echo $settings['webmail_link']?></td>
                                            </tr>
                                            

                                            <tr>
                                            <td></td>
                                               
                                                 
                                                   <td>
                                                   <a href="<?php base_url() ?>edit_settings" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                            </tr>


                                           

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
