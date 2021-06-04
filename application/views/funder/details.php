<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('shared/header', $data);
?>


<?php $this->load->view('shared/menu'); ?>

<div class="columns" >
    <div class="medium-6 medium-centered large-6 large-centered small-6 small-centered">
        <h1>Funder Details</h1> 
        <?php if(isset($pledges) && $pledges != NULL){ 
            foreach ($pledges as $pledge) { 
            $campaign = $this->campaign_model->get_campaign($pledge->CampaignId);
            $project = $this->project_model->get_project($campaign->ProjectId);
            //print_r($project);
            //print_r($campaign);
            //print_r($pledge);
                    ?>
        <div class="callout">
        <ul>
            <li>Project: <?=$project->Title?></li>
            <li>Amount: N$<?=$pledge->Amount?></li>
            <li>Date: <?=$pledge->DateCreated?></li>
            <li>Paid: <?=$pledge->Paid > 0 ? 'Paid': 'Not Paid'?></li>
        </ul>
        </div>
        <hr>
            <?php }} else{ ?>
        <div class="callout">
        <h3>No Donations Made yet</h3>
        </div>
            <?php }?>
    </div>
</div>
<?php
//Loading footer
$this->load->view('shared/footer');
?>