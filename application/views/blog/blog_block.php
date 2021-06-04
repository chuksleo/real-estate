
 <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                            <?php $attributes = array('name' => 'search_form', 'class' => 'sidebar__search-form'); ?>
    <?php echo  form_open('blog/search', $attributes ) ; ?>
                                
                                    <input type="search" placeholder="Search">
                                    <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                </form>
                            </div>
                            
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Latest Posts</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                 <?php foreach($latestpost as $latestpost_item):?>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $latestpost_item['post_image'] ?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="#" class="sidebar__post-content_meta"><i class="far fa-comments"></i>2 Comments</a>
                                                <a href="news-detail.html" class="sibebar_post_content_title"><?php echo $latestpost_item['post_title']?></a>
                                            </h3>
                                        </div>
                                    </li>
                                  <?php endforeach ?>
                                </ul>
                            </div>
                            <!--  <div class="sidebar__single sidebar__twitter">
                                <h3 class="sidebar__title">Tweets</h3>
                                <div class="sidebar__twitter_text">
                                    <p><span>@Layerdrops</span> Personalized Service for Your Most Valuable Assets. http://yhdj58.tp8/JK</p>
                                </div>
                                <h4><i class="fab fa-twitter"></i>Jitsin  -  16 Jan, 2020</h4>
                            </div> -->
                            <!--  <div class="sidebar__single sidebar__need_help">
                                <h3 class="sidebar__title">Need Help?</h3>
                                <div class="sidebar__need_help_text">
                                    <p><?php echo lang('phone_text')?></p>
                                    <h3><?php echo $settings['phone'] ?></h3>
                                </div>
                            </div> -->
                           
                        </div>
                    </div>
               </div>
           </div>
       </section>



























