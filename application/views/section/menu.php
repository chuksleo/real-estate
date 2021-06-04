
<!--
Copyright (C) 2016 Anton Lungameni

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<!-- Navigation -->
<!--<div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>-->
<!--<div class="title-bar" data-responsive-toggle="nav_bar" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title"><img src="<?= base_url() ?>assets/images/logo.png"/></div>
</div>-->
<?php
$categories = $this->project_category_model->getCategories();
if ($this->ion_auth->logged_in()) {
    $project = $this->project_model->get_user_project($this->ion_auth->user()->row()->id);
}
?>

<div class="top-bar" >
    <div class="top-bar-title">
        <span data-responsive-toggle="responsive-menu" data-hide-for="medium" style="color: #ffffff;">
            <button class="menu-icon dark"  type="button" data-toggle></button>
        </span>
        <li><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png" height="60" width="60"/></a>
            <a style="color: #ffffff;" href="<?= base_url() ?>"><h4>Crowdfunding</h4></a></li>
    </div>
    <div id="responsive-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li>
                    <a href="#">Projects</a>
                    <ul class="menu vertical">
                        <!--Will be retrieved from db-->
                        <?php foreach ($categories as $cat) { ?>
                            <li><a href="<?= base_url() ?>project/index/<?= $cat->CategoryId ?>"><?= $cat->Title ?></a></li>
                        <?php } ?>
<!--                        <li><a href="<?= base_url() ?>project/index/Entrepreneurial">Entrepreneurial</a></li>
                    <li><a href="<?= base_url() ?>project/index/Social">Social</a></li> 
                    <li><a href="<?= base_url() ?>project/index/Education">Education</a></li>-->
                    </ul>
                </li>
                <li><a href="#">Funders</a>
                    <ul class="menu vertical">
                        <li><a href="#">Organizations</a></li>
                        <li><a href="#">Individuals</a></li>           
                    </ul>
                </li>
                <li><a href="#">Success Stories</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu dropdown" data-dropdown-menu>
                <li class="search"> <div  class="input-group"><input class="input-group-field" type="search" placeholder="Search Project" >
                        <div class="input-group-button"><button type="button" class="button">Search</button></div></div></li>
                <li></li>
                <?php
                if ($this->ion_auth->logged_in()) {
                    $user = $this->ion_auth->user()->row();
                    ?>
                    <li><a><i class="fa fa-user"></i> Welcome, <?= $user->first_name . " " . $user->last_name ?></a>
                        <ul class="menu vertical">
                            <?php if ($this->ion_auth->in_group(3)) { ?>
                                <li><a href="<?= base_url() ?>Project/details/<?=$project->ProjectId?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Project Dashboard</a></li>
                            <?php } ?>
                            <?php if ($this->ion_auth->in_group(4)) { ?>
                                <li><a>Funders Dashboard</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url() ?>auth/edit_user/<?= $user->id ?>"><i class="fa fa-edit"></i>Edit Profile</a></li>
                            <li><a href="<?= base_url() ?>auth/change_password"><i class="fa fa-pencil"></i>Change Password</a></li>
                            <?php if ($this->ion_auth->is_admin()) { ?>
                                <li><a href="Admin/index">Admin Dashboard</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url() ?>auth/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>

                <?php } else if (!$this->ion_auth->logged_in()) { ?>
                    <li>&nbsp;</li>
                    <li><a href="<?= base_url() ?>auth/create_user">Register</a></li>
                    <li>&nbsp;</li>
                    <li><a href="<?= base_url() ?>auth/login">Login</a></li>
                <?php } ?>
                <li></li>
            </ul>
        </div>
    </div>
</div>


<!-- /Navigation -->

<?php if (isset($message)) { ?>
    <div class="alert callout" data-closable>
        <p><?= $message ?></p>
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}?>