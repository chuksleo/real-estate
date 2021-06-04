<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/admin/header', $data);
?>



      <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Static Languages</h3>
                    </div>
                    <div class="row">
                    		 <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                    <thead>
                                    	
                                    	<th>ID</th>
                                    	<th>FIELD</th>
                                    	<th>VALUE</th>
                                    	<th>STATUS</th>
                                    	<th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php foreach ($langs as $lang): ?>
                                        	
                                            <tr>
                                                <td><?php echo $lang->id ?></td>
                                                <td><?php echo $lang->field ?></td>
                                                <td><?php echo $lang->value ?></td>
                                                <td><?php echo $lang->status ?></td>
                                                <td>
                                                   <a href="<?php base_url() ?>edit_lang/<?php echo $lang->id ?>" class="btn btn-square btn-primary mb-2"> Edit</a></td>
                                            </tr>
                                           
                                           	<?php endforeach  ?> 


                                           

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
