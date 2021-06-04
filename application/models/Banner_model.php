<?php
class Banner_model extends CI_Model {
	public  function __construct()
	{

	}









	public function get_all_banners()
	{

				$num = 5;
				$stat = "Yes";
				$this->db->select()->from('front_banner AS fb')->where('fb.active =',$stat )->limit($num)->order_by('banner_id','desc');

				$query = $this->db->get();
				return $query->result_array();

	}

	public function get_total_images_by_category($id)
	{


				$this->db->select()->from('images AS i')->where('i.category_id =',$id);
				$query = $this->db->get();
				return $query->num_rows();

	}




}



?>