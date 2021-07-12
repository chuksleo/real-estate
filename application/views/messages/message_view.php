


 <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                  
                        		<?php 

                        			$property = $this->property_model->getPropertyById($message->propertyid);

                        			$link_text = $this->property_model->cleanTitle($property->title);

                        		?>


<button onclick="showInbox()">< Back</button>
                        

                        <tr>
                            <td>Client Name:</td>
                            <td><?= $message->name ?></td>

                        </tr>

                         <tr>
                            <td>Client Eamil:</td>
                            <td><?= $message->email ?></td>

                        </tr>
                         <tr>
                            <td>Client Phone:</td>
                            <td><?= $message->phone ?></td>

                        </tr>
                         <tr>
                            <td>Property:</td>
                            <td> <p><?= $property->title ?></p>
                            <p><?= $property->price ?></p>
                            <p><?= $property->address ?></p>


                             <a href="<?= base_url() ?>property/<?= $link_text ?>/<?=  $property->pid ?>" target="_blank" style="color: blue"> Click To View Property</a>

                             </td>

                        </tr>
                         <tr>
                            <td>Message:</td>
                            <td><?= $message->message ?></td>

                        </tr>





                        </table>
