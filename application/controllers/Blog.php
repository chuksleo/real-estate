<?php
class Blog extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog_model');



	}

	public function index($start=0)
        {

        $data['categories'] = $this->project_category_model->getCategories($num=10);


		$num =12;
		$data['page_name'] = "Blog";

		$data['site_description'] = lang('blog_page_description');
		$data['page_title'] = lang('blog_page_title').' | '.lang('site_slug') ;;

		$data['feturedpost'] = $this->blog_model->get_featured_post();
		$data['posts'] = $this->blog_model->get_posts($num, $start);

		$config['base_url'] = base_url().'blog/index';
		$config['total_rows'] = $this->blog_model->get_total_num_post();
		$config['per_page'] = $num;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['display_pages'] = TRUE;

		$cur_page = $this->pagination->cur_page;
		$total = $config['total_rows'];
		$data['s_val'] = $start + 1;
		$check = $start + $num;
		if($check > $total ){
			$data['num'] = $total;
		}else{
		$data['num'] = $start + $num;
		}
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['total'] = $total;
		$data['per_page'] = $num;


		$data['active_home'] = "";
		$data['active_about'] = "";
		$data['active_blog'] = "current";			
		$data['active_contact'] = "";
		$data['page_title'] = "DONOFUND: Blog";



		$this->load->view('section/header', $data);
		$this->load->view('blog/list', $data);
		$this->load->view('section/footer');

	    }





	public function post($id, $title)
        {

         $data['categories'] = $this->project_category_model->getCategories();
        $data['page_name'] = "Blog";
		$data['feturedpost'] = $this->blog_model->get_featured_post();
		$data['latestpost'] = $this->blog_model->get_latest_post($num=4);
		$data['post_details'] = $this->blog_model->get_post_by($id);
		$data['title'] = strtoupper($title).' |  .com' ;

		$data['post_comments'] = $this->blog_model->get_comment_by_post_id($id);
		$data['comment_count'] = $this->blog_model->get_commentcount_by_post_id($id);
		$data['site_description'] = lang('quote_descripion') ;

		$data['page_title'] = "DONOFUND: Blog - ". $data['post_details']['post_title'];

		$data['home'] = FALSE;
		$data['active_home'] = "";
		$data['active_about'] = "";
		$data['active_blog'] = "current";			
		$data['active_contact'] = "";
		 // $data['settings_content'] = $this->settings_model->get_all_settings();
		// $data['settings'] = $data['settings_content'][0];





		$this->load->view('section/header', $data);
		$this->load->view('blog/details', $data);
		$this->load->view('blog/blog_block', $data);
		$this->load->view('section/footer');

	    }



	public function search()
        {
        $data['page_name'] = "Blog";
		$data['page'] = "blog";
		$title = $this->input->post('search_text');
		$num =12;
		$start = 0;

        
         // $data['settings_content'] = $this->settings_model->get_all_settings();
		// $data['settings'] = $data['settings_content'][0];
		 $data['categories'] = $this->project_category_model->getCategories();
		$data['latestpost'] = $this->blog_model->get_latest_post($num=4);
		$data['posts'] = $this->blog_model->find_posts($title, $num, $start);

		$data['site_description'] = 'Identify with us and stay up to date with all our activity and events';
		$data['keywords'] = '' ;
		$data['title'] = $title.' |  Hodeeoffshore Services Limited' ;



		$data['home'] = FALSE;
		$data['active_home'] = "";
		$data['active_about'] = "";
		$data['active_blog'] = "current";			
		$data['active_contact'] = "";





		$this->load->view('section/header', $data);
		$this->load->view('blog/list', $data);
		$this->load->view('blog/blog_block', $data);
		$this->load->view('section/footer');

	    }
public function add_comment()
{





		$this->form_validation->set_rules('message_val', 'Comment', 'trim|required');
		$this->form_validation->set_rules('name_val', 'Comment', 'trim|required');
		$this->form_validation->set_rules('email_val', 'Comment', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$error_message = validation_errors();
			echo "<div class='alert alert-danger fade in' role='alert'><a href='#'class='close' data-dismiss='alert' aria-label='close'>&times;</a>$error_message</div>";

			//$this->load->view('section/footer');

		}
		else
		{


				 if($this->blog_model->set_comment()){
				 echo "<div class='alert alert-success fade in' role='alert'>   <a href='#'class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your Comment has been added Succefully and will be visible after Modaration</div>";

				 }else{
					echo "<div class='alert alert-danger fade in' role='alert'>   <a href='#'class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed to post your Comment. Please try again!</div>";

				 }


		}//end if  statement ....




}// end function add().....




}
/* End of file blog.php */
/* Location: ./application/controllers/blog.php */