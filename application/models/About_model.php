<?php
class About_model extends CI_Model {
	public  function __construct()
	{

	}









	public function get_first_about_content()
	{

				$num = 3;
				$this->db->select()->from('about_us  AS au')->limit($num)->order_by('id','asc');

				$query = $this->db->get();
				return $query->result_array();

	}
	
	
	
	public function get_about_by_id($id)
	{

				
				$this->db->select()->from('about_us  AS au')->where('id = ', $id);

				$query = $this->db->get();
				return $query->row_array();

	}
	
	
	public function get_second_about_content()
	{

				$num = 2;
				$this->db->select()->from('about_us  AS au')->limit($num)->order_by('id','desc');

				$query = $this->db->get();
				return $query->result_array();

	}
	
	
	


}



?>