
<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/header', $data);
?>

 <!--Project Details Top-->
        <section class="project_details_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project_details_head">
                            <h3><?php echo $campaign->Title ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        <div class="project_details_image">

                        <?php if($campaign->image == null){ ?>    <img src="<?php echo base_url()?>assets/images/project/project_details_img-1.jpg" alt=""> <?php }else{ ?>

                          <img src="<?php echo base_url()?>uploads/campaign/profile/<?php echo $campaign->image ?>" alt="<?php echo $campaign->Title ?> image">


                          <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="project_details_right">
                            <div class="project_details_right_top">
                                <ul class="project_details_rate_list list-unstyled">
                                    <li><span>$<?php echo $campaign->Current ?></span>Raised</li>
                                    <li><span>60</span>Donors</li>
                                </ul>
                            </div>
                            <div class="progress-levels project_details_progress-levels">
                            <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="86">0</span>
                                                    <span class="percent">%</span>
                                                </div>
                                                <div class="bar-fill" data-percent="86"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="projects_details_categories list-unstyled">
                                <li>
                                    <div class="icon_box">
                                        <img src="assets/images/project/folder-icon.png" alt="">
                                    </div>
                                    <div class="content">
                                        <p><?php echo $campaign->title ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon_box">
                                        <img src="assets/images/project/flag.png" alt="">
                                    </div>
                                    <div class="content">
                                        <p>United Kingdom</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="projects_details_bottom">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5>$<?php echo $campaign->Current ?></h5>
                                        <p>Raised</p>
                                    </li>
                                    <li>
                                        <h5>$<?php echo $campaign->Amount ?></h5>
                                        <p>Goal</p>
                                    </li>
                                    <li>
                                        <h5>32</h5>
                                        <p>Days Left</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="project_details_btn_box">
                                <a href="#" class="thm-btn follow_btn"><i class="fa fa-heart"></i>Like</a>
                                <a href="<?php echo base_url() ?>donate/<?php echo str_replace(' ', '-', $campaign->Title) ?>/<?php echo $campaign->CampaignId ?>" class="thm-btn back_this_project_btn">Donate Now</a>
                            </div>
                            <div class="project_detail_share_box">
                                <div class="share_box_title">
                                    <h2>Share with friends</h2>
                                </div>
                                <div class="project_detail__social">
                                    <a href="#" class="tw-clr"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="fb-clr"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#" class="dr-clr"><i class="fab fa-dribbble"></i></a>
                                    <a href="#" class="ins-clr"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="project_details_text_box">
                                <p><span>All or nothing</span>. This project will only be funded if it reaches its goal by Tue, January 28 2020 4:59 AM UTC +00:00.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project_details_tab_box">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-tab-box tabs-box">
                            <ul class="tab-btns tab-buttons clearfix list-unstyled">
                                <li data-tab="#idea" class="tab-btn active-btn"><span>Campaign Description</span></li>                                
                                <li data-tab="#update" class="tab-btn"><span>Updates</span></li>
                                <li data-tab="#comm" class="tab-btn"><span>Comments</span></li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab active-tab" id="idea">
                                   <div class="project_idea_details">
                                       <div class="row">
                                           <div class="col-xl-8 col-lg-8">
                                               <div class="project_idea_details_content">
                                                        <?php echo $campaign->Description ?>
                                               </div>
                                           </div>
                                           <div class="col-xl-4 col-lg-4">
                                               <div class="project_details_right_content">
                                                   <div class="project_detail_creator">
                                                       <div class="project_detail_creator_image">
                                                           <img src="assets/images/project/person-img-1.png" alt="">
                                                       </div>
                                                       <div class="creator_info">
                                                           <h4><?php echo $campaign->first_name. " ". $campaign->last_name ;?></h4>
                                                           <h5>First Created · 0 backed</h5>
                                                       </div>
                                                       <div class="project_detail_creator_text">
                                                           <p>Crochet designer and Creator of the Woolly Chic brand. Loves British wool and is passionate about the environment.</p>
                                                       </div>
                                                   </div>
                                                   <div class="project_detail_pledge">
                                                       <div class="title">
                                                           <h3>Pledge Without<br>A Reward</h3>
                                                       </div>
                                                       <div class="field">
                                                           <input type="text" placeholder="$ 10">
                                                       </div>
                                                       <div class="text">
                                                           <h4>Back it because you<br>believe in it.</h4>
                                                           <p>Support the project for no reward, just because it speaks to you.</p>
                                                       </div>
                                                       <div class="project_detail_btn">
                                                           <a href="#" class="thm-btn">Continue</a>
                                                       </div>
                                                   </div>
                                                   <div class="project_detail_rewards">
                                                       <h3>Pledge $50 or more</h3>
                                                       <p>Reward description goes here. Lorem ipsum dolor sit amet, piscing elit. Vivamus dictum congue nunc, sed interdum massa in.</p>
                                                       <div class="estimated_delivery_date">
                                                           <p>Estimated Delivery</p>
                                                           <h4>December, 2022</h4>
                                                       </div>
                                                       <ul class="project_detail_rewards_list list-unstyled">
                                                           <li><i class="far fa-user-circle"></i>4 Donors</li>
                                                           <li><i class="far fa-user-circle"></i>20 rewards left</li>
                                                       </ul>
                                                       <div class="project_detail_rewards_btn">
                                                           <a href="#" class="thm-btn">Select this Reward</a>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>

                                <div class="tab" id="update">
                                    <div class="project_detail_update">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="project_detail_update_single">
                                                    <h4>#1 Update</h4>
                                                    <h3>Wow! What an incredible first day!</h3>
                                                    <div class="person_detail_box">
                                                        <div class="person_detail_left_box">
                                                            <div class="person_detail_left_img">
                                                                <img src="assets/images/project/project_detail_person-img-1.png" alt="">
                                                            </div>
                                                            <div class="person_detail_left_content">
                                                                <h5>by <span>Kevin Martin</span></h5>
                                                                <p>Jan 16, 2020</p>
                                                            </div>
                                                        </div>
                                                        <div class="person_detail_right_box">
                                                            <a href="#" class="thm-btn creator_btn">Creator</a>
                                                        </div>
                                                    </div>
                                                    <p class="project_detail_update_first_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vulputate sed mauris vitae pellentesque. Nunc ut ullamcorper libero. Aenean fringilla mauris quis risus laoreet interdum. Quisque imperdiet orci in metus aliquam egestas. Fusce elit libero, imperdiet nec orci quis, convallis hendrerit nisl. Cras auctor nec purus at placerat.</p>
                                                    <p class="project_detail_update_last_text">Quisque consectetur, lectus in ullamcorper tempus, dolor arcu suscipit elit, id laoreet tortor justo nec arcu. Nam eu dictum ipsum. Morbi in mi eu urna placerat finibus a vel neque. Nulla in ex at mi viverra sagittis ut non erat. Praesent nec congue elit. Nunc arcu odio, convallis a lacinia ut, tristique id eros. Suspendisse leo erat, pellentesque et commodo vel, varius in felis. Nulla mollis turpis porta justo eleifend volutpat.</p>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>

                                <div class="tab" id="comm">
                                    <div class="project_detail_comment_box">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="project_detail_comment_box_inner">
                                                    <h3 class="project_detail_comment_title">2 Comments</h3>
                                                    <div class="project_detail_comment_single">
                                                        <div class="project_detail_comment_image">
                                                            <img src="assets/images/project/comment-img-1.png" alt="">
                                                        </div>
                                                        <div class="project_detail_comment_content">
                                                            <h3>Kevin Martins<span>26 January, 2020</span></h3>
                                                            <p>Lorem Ipsum is simply dummy text of the rinting and typesetting been the industry standard dummy text ever sincer condimentum purus. In non ex at ligula fringilla lobortis. Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo.</p>
                                                        </div>
                                                    </div>
                                                    <div class="project_detail_comment_single">
                                                        <div class="project_detail_comment_image">
                                                            <img src="assets/images/project/comment-img-1.png" alt="">
                                                        </div>
                                                        <div class="project_detail_comment_content">
                                                            <h3>Kevin Martins<span>26 January, 2020</span></h3>
                                                            <p>Lorem Ipsum is simply dummy text of the rinting and typesetting been the industry standard dummy text ever sincer condimentum purus. In non ex at ligula fringilla lobortis. Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="project_detail_leave_comment__box">
                                                    <h3 class="leave_comment__box_title">Leave a Comment</h3>
                                                    <form class="project_detail_leave_comment__box_form" action="#">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <input type="text" name="name"
                                                                        placeholder="Full name" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-box">
                                                                    <input type="email" name="email"
                                                                        placeholder="Email address" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="input-box">
                                                                    <textarea name="review" placeholder="Write review"
                                                                        required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="project_detail_leave_comm_btn">
                                                                    <a href="#" class="thm-btn">Submit Comment</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Categories Two Start-->
        <div class="categories_two">
               <div class="container">
                   <div class="row">
                       <div class="col-xl-12">
                           <ul class="categories_two_menu list-unstyled">
                               <li><a href="#">Fashion</a></li>
                               <li class="active"><a href="#">Design</a></li>
                               <li><a href="#">Film & Video</a></li>
                               <li><a href="#">Games</a></li>
                               <li><a href="#">Health & Fitness</a></li>
                               <li><a href="#">Technology</a></li>
                               <li><a href="#">Education</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>

<?php
//Loading header
$data['title'] = 'Login';
$data['javascript'] = 'app.js';
$this->load->view('section/footer', $data);
?>