<?php
class Emails_model extends CI_Model {
	public  function __construct()
	{

	}
	
	

	public function user_contact()
	{
		// format date string
			$datestring = "%Y-%m-%d %h:%i:%s";

			// get stytem current time
			$time = time();
			$cur_date = mdate($datestring);

		$data = array(

			'first_name' => $this->input->post('fname_val'),
			'last_name' => $this->input->post('lname_val'),
			'contact_email' => $this->input->post('email_val'),
			'phone' => $this->input->post('phone_val'),
			'subject' => $this->input->post('subject_val'),
			'contact_message' => $this->input->post('message_val'),
			'date_created' => $cur_date,
			'last_updated' => $cur_date,
			'view_status' => 0,



		);


	      return $this->db->insert('contact_us', $data);



	}
	
	
	
	public function get_new_contacts()
		{
			$stat = 0;
			$this->db->select()->from('contact_us AS c')->where('c.view_status =',$stat);
			

				$query = $this->db->get();
				return $query->num_rows();

		}
	
	public function update_contact_read_status($reg_id)
		{
			$view_val = 1;
			$data = array(

				'view_status' => $view_val,
				
			);

		   $where = "id = ".$reg_id."";

		   $this->db->update('contact_us', $data, $where);

		}
		
	
	public function add_member()
	{
		// format date string
			$datestring = "%Y-%m-%d";

			// get stytem current time
			$time = time();
			$cur_date = mdate($datestring);

		$data = array(

			'name' => $this->input->post('sname_val'),
			'sex' => $this->input->post('msex_val'),
			'city' => $this->input->post('mcity_val'),
			'state' => $this->input->post('mstate_val'),
			'nationality' => $this->input->post('mnationality_val'),
			'organization' => $this->input->post('morg_val'),
			'phone' => $this->input->post('mphone_val'),
			'alt_phone' => $this->input->post('mphonealt_val'),
			'email' => $this->input->post('memail_val'),
			'message' => $this->input->post('message_val'),
			'view_status' => 0,
			'date_created' => $cur_date,



		);


	      return $this->db->insert('member', $data);



	}
	
	
	public function subscribe()
	{
		// format date string
			$datestring = "%Y-%m-%d";

			// get stytem current time
			$time = time();
			$cur_date = mdate($datestring);

		$data = array(

			'email' => $this->input->post('email_val'),
			'date_created' => $cur_date,



		);


	      return $this->db->insert('subscribe_mail', $data);



	}
	
	public function get_emails($email = FALSE)
	{
		if ($email === FALSE )
		{
			$this->db->select()->from('subscribe_mail AS sm')->order_by('date_created','desc');

			$query = $this->db->get();
			return $query->result_array();
		}

		$this->db->select()->from('subscribe_mail AS sm')->where('sm.email =',$email);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function mail_contact()
	{
	
	        
		$first_name = $this->input->post('fname_val');
		$last_name = $this->input->post('lname_val');
		$from_val = $this->input->post('email_val');
		$name_val = $first_name."-".$last_name;
		$to_val = $this->config->item('webmaster_email', 'tank_auth');
		$subject_val = $this->input->post('subject_val');
		$messages_val = $this->input->post('message_val');
		
		
		$this->email->set_newline("\r\n");
		$this->email->from($from_val, $name_val);
		$this->email->to($to_val);
		$this->email->subject($subject_val);
		$this->email->message($messages_val);


	      return $this->email->send();



	}
	
	
	




}



?>