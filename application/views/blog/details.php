  <!-- End Site Header -->
  <!-- Site Showcase -->
  <div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(http://placehold.it/1200x260&amp;text=IMAGE+PLACEHOLDER);">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1><?php echo $page_name ?></h1>
                  </div>
             </div>
         </div>
    </div>
    <!-- End Page Header -->
  </div>  


  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <h2 class="post-title"><?php echo $post_details['title'] ?></h2>
            </header>
            <article class="post-content">
                  <div class="post-meta meta-data">
                      <span><i class="fa fa-calendar"></i> Posted on 20th Feb, 2014</span>
                      <span><i class="fa fa-user"></i> By Admin</span>
                    <span><i class="fa fa-tag"></i> Categories: <a href="#">Uncategorized</a></span>
                    <span><a href="#comments"><i class="fa fa-comment"></i> 188 Comments</a></span>
                </div>
              <div class="featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> </div>
             <?php echo $post_details['body'] ?>
             
            <!--   <div class="post-meta"> <i class="fa fa-tags"></i> <a href="#">Sold</a>, <a href="#">Property</a> </div> -->
            </article>
            <section class="post-comments" id="comments">
              <h3><i class="fa fa-comment"></i> Comments (4)</h3>
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
              <ol class="comments">
                <li>
                  <div class="post-comment-block">
                    <div class="img-thumbnail"> </div>
                   
                    <h5>John Doe says</h5>
                    <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                    <p>Curabitur nec nulla lectus, non hendrerit lorem. Quisque lorem risus, porttitor eget fringilla non, vehicula sed tortor. Proin enim quam, vulputate at lobortis quis, condimentum at justo. Phasellus nec nisi justo. Ut luctus sagittis nulla at dapibus. Aliquam ullamcorper commodo elit, quis ornare eros consectetur a.</p>
                  </div>
                </li>
               
              </ol>
            </section>





            <section class="post-comment-form">
              <h3><i class="fa fa-share"></i> Post a comment</h3>
              <form>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-4 col-sm-4">
                      <input type="text" class="form-control input-lg" placeholder="Your name">
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <input type="email" class="form-control input-lg" placeholder="Your email">
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <input type="url" class="form-control input-lg" placeholder="Website (optional)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea cols="8" rows="4" class="form-control input-lg" placeholder="Your comment"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-lg">Submit your comment</button>
                    </div>
                  </div>
                </div>
              </form>
            </section>
          </div>
 