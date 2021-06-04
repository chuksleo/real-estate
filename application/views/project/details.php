<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('shared/header', $data);
$project_user = $this->ion_auth->user($project->UserId)->row();
?>


<?php $this->load->view('shared/menu'); ?>
<div class="medium-9 medium-centered small-9 small-centered large-9 large-centered">
    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Project Details</a></li>
        <li class="tabs-title"><a href="#panel2">Campaigns</a></li>
    </ul>

    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
            <div class="row">
                <div class="medium-12 small-12 large-12 column">
                    <h1 class="text-center"><?= $project->Title ?></h1> 
                    <p class="text-center">by <?= $project_user->first_name ?>&nbsp;<?= $project_user->last_name ?></p>
                    <?php if ($this->ion_auth->logged_in()) { ?>
                        <div class="text-center">
                            <a href="<?= base_url() ?>Campaign/create/<?= $projectId ?>" class="button primary ">Create Funding Campaign</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="small-6 small-centered mediuim-6 medium-centered large-6 large-centered">
                    <div class="flex-video widescreen hide-for-small-only">
                        <video height="800" width="800" class="center" controls="true" poster="<?= base_url() ?>/uploads/Projects/Profile/<?= $project->ProfilePic ?>">
                            <source src="<?= base_url() ?>/uploads/Projects/Profile/<?= $project->Video ?>"/>
                        </video>
                    </div>
                    <?php if ($this->ion_auth->logged_in() && $project->UserId == $this->ion_auth->user()->row()->id) { ?>
                        <div class="text-center">
                            <a class="button info " href="<?= base_url() ?>Project/edit/<?= $project->ProjectId ?>">Edit Project Details</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <div class="columns" data-equalizer>
                <div class="column large-8 meduim-8 small-8 callout" data-equalizer-watch >

                    <div class="media-object">
                        <p><?= $project->Description ?></p>
                    </div>
                </div>
                <div class="column small-4 meduim-4 large-4 callout" data-equalizer-watch>
                    <h3>Some Stats</h3>
                    <table class="stack">
                        <tr>
                            <td>Funders</td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>Raised</td>
                            <td>N$ 1500.00</td>
                        </tr>
                        <tr>
                            <td>Successful Funding Campaigns</td>
                            <td>3</td>
                        </tr>
                    </table>
                    <div>
                        <button class="button primary large"><i class="fa fa-heart"></i> Like</button>
                        <button class="button success large"><i class="fa fa-money"></i> Fund Us</button>
                    </div>
                </div>
            </div>
            <!--<div class="columns" >-->
            <!--<div class="medium-6 medium-centered large-6 large-centered small-6 small-centered">-->

            <!--<div class="column" >-->
            <!--            <div class="callout">-->

            <p class="show-for-small-only"><img class="thumbnail" src="<?= base_url() ?>/uploads/Projects/Profile/<?= $project->ProfilePic ?>" height="500" width="500" alt="Test"></p>

            <div class="flex-video widescreen hide-for-small-only">
<!--                    <video controls="true" poster="<?= base_url() ?>/uploads/Projects/Profile/<?= $project->ProfilePic ?>">
                    <source src="<?= base_url() ?>/uploads/Projects/Profile/<?= $project->Video ?>"/>
                </video>-->

            </div>

<!--                <p class="lead"> <br><small>N$ 1000.00</small></p>
<p class="subheader">End date is 25 January 2017.</p>
<p class="subheader">Remaining Amount: N$ 200.00</p>
<p><a href="<?= base_url() ?>index.php/Project/get_project/"><button class="button">More Info</button></a> &nbsp; 
    <a href="<?= base_url() ?>Funder/fund_Project/"><button class="button success">Fund Us</button></a></p>
<p></p>

<div class="progress" role="progressbar" tabindex="0" aria-valuenow="800" aria-valuemin="0" aria-valuetext="N$ 200.00" aria-valuemax="1000">
    <div class="progress-meter" style="width: 70%"></div> 
</div>-->
            <!--            </div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
        </div>
        <div class="tabs-panel" id="panel2">
            <h2>Current Campaign</h2>
            <?php if ($this->ion_auth->logged_in()) { ?>
                <button class="button primary">Create Funding Campaign</button>

            <?php } ?>
            <?php if ($campaigns == NULL) { ?>
                <p>No Campaigns Running!</p>
            <?php } else { ?>
                <?php
                foreach ($campaigns as $campaign) {
                    ?>
                    <div class="callout"><?= $campaign->Description ?></div>
                    <p><b>Start Date:</b> <?= $campaign->StartDate ?></p>
                    <p><b>End Date:</b> <?= $campaign->EndDate ?></p>
                    <p><b>Target Amount:</b> N$<?= $campaign->Amount ?></p>
                    <p><b>Current Pledged:</b> N$<?= $campaign->Current ?></p>

                    <div class="progress" role="progressbar" tabindex="0" aria-valuenow="800" aria-valuemin="0" aria-valuetext="N$ 200.00" aria-valuemax="1000">
                        <div class="progress-meter" style="width: 70%"></div>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>

</div>

<?php
//Loading footer
$this->load->view('shared/footer');
?>