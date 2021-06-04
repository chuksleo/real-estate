<?php
class Settings_model extends CI_Model {
	public  function __construct()
	{

	}


	public function get_all_settings()
	{


				$this->db->select()->from('settings AS st');

				$query = $this->db->get();
				return $query->row_array();

	}




	public function getStaticLang()
	{


				$this->db->select()->from('static_lang AS sl');

				$query = $this->db->get();
				return $query->result();

	}

	public function getStaticLangById($id)
	{


				$this->db->select()->from('static_lang AS sl')->where('sl.id =',$id);

				$query = $this->db->get();			

				return $query->row_array();;

	}



	public function getStaticContent($field)
	{


				$this->db->select('value')->from('static_lang AS sl')->where('sl.field =',$field);

				$query = $this->db->get();
				$result = $query->row_array();
				$value = $result['value'];

				return $value;

	}



	 public function update_settings($sitename, $logo, $email, $address, $phone, $phone2, $twitter, $facebook, $linkedin, $webmail){
	 	$id = 1;
        $this->site_name = $sitename;
        $this->logo = $logo; 
        $this->email = $email; 
        $this->address = $address; 
        $this->phone = $phone;
        $this->phone2 = $phone2;
        $this->twitter_link = $twitter;
        $this->fb_link = $facebook;
        $this->linkedin_link = $linkedin;
        $this->webmail_link = $webmail;
        return $this->db->update("settings", $this, array("id" => $id));
    }





    public function updateStaticLang($field, $value, $status, $id){
	 	
        $this->field = $field;
        $this->value = $value; 
        $this->status = $status;         
        return $this->db->update("static_lang", $this, array("id" => $id));
    }






}



?>
