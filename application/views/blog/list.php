 
 <div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header" style="background-image:url(<?php echo base_url()?>assets/images/backgrounds/blog.png);">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1><?php echo $page_name ?></h1>
                  </div>
             </div>
         </div>
    </div>

 <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9 posts-archive">

           <?php if(!$posts){ ?>

                <article class="post">


                   <p class="alert alert-warning">Opps!! Sorry No results Found</p>
                </article>



      <?php } ?>
      <?php foreach($posts as $post):?>     
            <article class="post">
              <div class="row">
                <div class="col-md-4 col-sm-4"> <a href="#"><img src="<?= base_url() ?>assets/images/file2.jpg" alt="" class="img-thumbnail"></a> </div>
                <div class="col-md-8 col-sm-8">
                  <h3><a href="<?php echo base_url() ?>blog/<?php echo $post['post_id'] ?>/<?php echo str_replace(' ', '-', $post['post_title']) ?>"><?php echo $post['post_title']?></a></h3>
                  <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> 28th Jan, 2014</span><span><i class="fa fa-archive"></i> <a href="#">Uncategorized</a></span> <span><a href="#"><i class="fa fa-comment"></i> 12</a></span></span>
                 <?php echo $post['intro_text']?>
                  <p><a href="<?php echo base_url() ?>blog/<?php echo $post['post_id'] ?>/<?php echo str_replace(' ', '-', $post['post_title']) ?>" class="btn btn-primary">Continue reading <i class="fa fa-long-arrow-right"></i></a></p>
                </div>
              </div>
            </article>
    <?php endforeach ?>

           
            <ul class="pagination">
              <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>



