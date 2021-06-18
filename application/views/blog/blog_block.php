

            <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">

            <div class="widget sidebar-widget search-form-widget">
                  <h3 class="widgettitle">Search the Blog</h3>
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Search Posts...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg"></i></button>
                  </span>
                </div>
            </div>


                      <div class="widget-recent-posts widget">
                 <h3 class="widgettitle">Recent Posts</h3>
                 <ul>
                  <?php foreach($latestpost as $latestpost_item):?>
                    <li class="clearfix">
                      <a href="#" class="media-box post-image">
                               <img src="<?php echo base_url() ?>assets/uploads/blog/<?php echo $latestpost_item['post_image'] ?>" alt="" class="img-thumbnail">
                        </a>
                          <div class="widget-blog-content">
                          <a href="<?php echo base_url() ?>blog/<?php echo $latestpost_item['post_id'] ?>/<?php echo str_replace(' ', '-', $latestpost_item['post_title']) ?>"><?php echo $latestpost_item['post_title']?></a>
                          </div>
                    </li>

                     <?php endforeach ?>
                   
                </ul>
              </div>


            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3 class="widgettitle">Post Categories</h3>
              </div>
              <ul>
                <li><a href="#">Faith</a> (10)</li>
                <li><a href="#">Missions</a> (12)</li>
                <li><a href="#">Salvation</a> (34)</li>
                <li><a href="#">Worship</a> (14)</li>
              </ul>
            </div>
            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3 class="widgettitle">Post Tags</h3>
              </div>
              <div class="tag-cloud"> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> </div>
            </div>
          </div>
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