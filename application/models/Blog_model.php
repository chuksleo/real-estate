<?php
class Blog_model extends CI_Model {
	public  function __construct()
	{

	}
	//get all banks from data base
	public function get_posts($num, $start=0)
	{


				$this->db->select()->from('blog_posts as b')->limit($num, $start)->order_by('b.post_id','desc');
				$query = $this->db->get();
				return $query->result_array();


	}


	public function get_total_num_post()
	{


				$this->db->select()->from('blog_posts');
				$query = $this->db->get();
				return $query->num_rows();


	}


	public function get_post_by($id)
	{


			$this->db->select()->from('blog_posts AS b')->where('b.post_id =',$id);

			$query = $this->db->get();
			return $query->row_array();
	}






        public function get_latest_post($num)
	{

		$pub = "Yes";
		$this->db->select()->from('blog_posts AS b')->where('publish =', $pub)->limit($num)->order_by('b.date_created','desc');
		$query = $this->db->get();
		return $query->result_array();
	}


	 public function find_posts($title, $num, $start)
	{

		$pub = "Yes";
		$this->db->select()->from('blog_posts AS b')->like('post_title', $title)->where('publish =', $pub)->order_by('b.date_created','desc');
		$query = $this->db->get();
		return $query->result_array();
	}


	 public function get_featured_post()
	{
		$f_id = 1;
		$pub = "Yes";
		$lim = 10;



		$this->db->select()->from('blog_posts AS b')->limit($lim)->where('b.featured =',$f_id)->order_by('b.post_id','desc');
		$this->db->where('publish =', $pub);


				$query = $this->db->get();
				return $query->result_array();
	}


	public function get_total_featured()
	{
		$f_id = 1;

		$this->db->select()->from('blog_posts AS b')->where('b.featured =',$f_id);

		$query = $this->db->get();
		return $query->num_rows();
	}


	public function get_comment_by_post_id($id)
	{

		$pub = "Yes";
		$this->db->select()->from('blog_comments AS b')->where('b.postid =',$id);
		$this->db->where('b.publish =',$pub);

		$query = $this->db->get();
		return $query->result_array();
	}


      	public function get_commentcount_by_post_id($id)
		{

				$pub = "Yes";
				$this->db->select()->from('blog_comments AS b')->where('b.postid =',$id);
				$this->db->where('b.publish =',$pub);

				$query = $this->db->get();
				return $query->num_rows();
		}

	public function set_comment()
	{
		$datestring = "%Y-%m-%d - %h:%i:%a";
		$time = time();
		$cur_date = mdate($datestring, $time);
		$pub = "No";
		$data = array(
			'postid' => $this->input->post('post_val'),
			'name' => $this->input->post('name_val'),
			'email' => $this->input->post('email_val'),
			'comment_body' => $this->input->post('message_val'),
			'publish' => $pub,
			'date_created' => $cur_date

		);
		return $this->db->insert('blog_comments', $data);
	}
}
/* End of file blog_posts_model.php */
/* Location: ./application/model/blog_posts_model.php */