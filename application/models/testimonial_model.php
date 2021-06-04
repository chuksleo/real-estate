<?php
class Testimonial_model extends CI_Model {
	public  function __construct()
	{

	}









	public function get_all_testimony()
	{

				$num = 5;
				$this->db->select()->from('testimonials  AS ts')->limit($num)->order_by('test_id','desc');

				$query = $this->db->get();
				return $query->result_array();

	}
	
	
	public function get_front_testimony()
	{

				$num = 3;
				$this->db->select()->from('testimonials  AS ts')->limit($num)->order_by('test_id','desc');

				$query = $this->db->get();
				return $query->result_array();

	}



}



?>