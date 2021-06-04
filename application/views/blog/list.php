<?php if (!isset($page)):?>

 <!--Page Header Start-->
        <section class="page-header" style="background-image: url(<?php echo base_url()?>assets/images/backgrounds/blog.png);">
            <div class="container">
                <h2><?php echo $page_name ?></h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li><span><?php echo $page_name ?></span></li>
                </ul>
            </div>
        </section>

  <?php endif ?>




        <section class="blog_one">
            <div class="container">
                <div class="row">

                 <?php if(!$posts){ ?>

                <article>


                   <p class="alert alert-warning">Opps!! Sorry No results Found</p>
                </article>



      <?php } ?>
              <?php foreach($posts as $post):?>     
                    <div class="col-xl-4">
                        <!--Blog One Single-->
                        <div class="blog_one_single wow fadeInDown animated" data-wow-delay="200ms"
                            style="visibility: visible; animation-delay: 200ms; animation-name: fadeInDown;">
                            <div class="blog_one_image">
                                <img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $post['post_image'] ?>" alt="">
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="news-detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="news-detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_one_title">
                                    <h3><a href="<?php echo base_url() ?>donofund-blog/<?php echo $post['post_id'] ?>/<?php echo str_replace(' ', '-', $post['post_title']) ?>"><?php echo $post['post_title']?></a></h3>
                                </div>
                                <div class="blog_one_text">
                                   <?php echo $post['intro_text']?>
                                </div>
                                <div class="date_btn">
                                <a href="<?php echo base_url() ?>donofund-blog/<?php echo $post['post_id'] ?>/<?php echo str_replace(' ', '-', $post['post_title']) ?>" class="btn btn-gray btn-xs">Read more</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
               

<?php endforeach ?>


                </div>
            </div>
        </section>





