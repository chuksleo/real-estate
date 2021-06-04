 
<?php if (!isset($page)):?>

 <!--Page Header Start-->
        <section class="page-header" style="background-image: url(<?php echo base_url()?>assets/images/backgrounds/blog.png);">
            <div class="container">
                <h2><?php echo $page_name ?></h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li><span><?php echo $page_name ?></span></li>
                    <li><span><?php// echo $post_title ?></span></li>
                </ul>
            </div>
        </section>

  <?php endif ?>






 <!--News Detail Start-->
       <section class="news_detail">
           <div class="container">
               <div class="row">
                   <div class="col-xl-8 col-lg-7">
                       <div class="news_detail_left">
                           <div class="news_detail_image">
                               <img src="assets/images/blog/news_detail-img-1.jpg" alt="">
                           </div>
                           <ul class="list-unstyled news_detail__meta">
                                <li><a href="news-detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><a href="news-detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <div class="news-detail_title">
                                <h3><a href="#">7 Days Itinerary Discovering Elba Island</a></h3>
                            </div>
                            <p class="news_detail_first_text"> <?php echo $post_details['body'] ?>.</p>
                            
                            
                          
                            <div class="author-one">
                                <div class="author-one__image">
                                    <img src="assets/images/blog/author-img-1.jpg" alt="">
                                </div>
                                <div class="author-one__content">
                                    <h3>Christine Eve</h3>
                                    <p>Lorem Ipsum is simply dummy text of the rinting and typesetting been the industry standard dummy text ever sincer condimentum purus.</p>
                                </div>
                            </div>
                            <div class="comment-one">
                                <h3 class="comment-one__title"><?php echo $comment_count ?> Comment(s)</h3>


                                <?php foreach($post_comments as $comment): ?>

                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="assets/images/blog/comment-1-1.png" alt="">
                                    </div>
                                    <div class="comment-one__content">
                                        <h3><?php echo $comment['name']?> <span><?php echo $comment['date_created']?></span></h3>
                                        <p><?php echo $comment['comment_body']?></p>
                                        <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                    </div>
                                </div>
                              <?php endforeach ?>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-form__title">Leave a Comment</h3>
                                <form class="comment-one__form">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input id="comment_name" type="text" placeholder="Full name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment_input_box">
                                                <input id="comment_email" type="email" placeholder="Email address" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment_input_box">
                                                <textarea id="comment_message" name="message" placeholder="Write message"></textarea>
                                            </div>
                                            <button type="submit" class="thm-btn comment-form__btn" onclick="post_comment()">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                       </div>
                   </div>


