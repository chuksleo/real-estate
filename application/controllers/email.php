<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);


class Email extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

		/** $email_config = Array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'chuksleo.mark@gmail.com',
			'smtp_pass' => 'CHUKSLEOMC4REAL',
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n"
		); **/

		$this->load->model('emails_model');



		//$this->load->model('cars_model');

	}

	public function subscribe_email()
        {



		//$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('email_val', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('email/subscription_error_2');

		}else
		{
			$email = $this->input->post('email_val');
			$mail_val= $this->emails_model->get_emails($email);

			if(!$mail_val)
			{
				$this->emails_model->subscribe();
				echo '<div class="alert-box done">
							<i class="icon-ok"></i>
							<h4>Success! <span>You have succefuully subscribed for our mail alert</span></h4>
						</div>';
			}else
			{
				echo '<div class="alert-box done">
							<i class="icon-ok"></i>
							<h4>OOps! <span>It seems you have already subscribed</span></h4>
						</div>';
			}
		}


	}









	public function contact()
        {

        	echo "SENDING";


		
		$this->form_validation->set_rules('fname_val', 'Name', 'trim|required');
		$this->form_validation->set_rules('email_val', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject_val', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message_val', 'Message', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="alert-box alert radius" data-alert="">', '<a class="close" href="#"><small>&times;</small></a></div>');
			$name_error = form_error('name_val');
			$email_error = form_error('email_val');
			$messsage_error = form_error('message_val');
			echo validation_errors();


		}else
		{


			$this->emails_model->user_contact();
            $message_resp = '<div class="alert-box success radius" data-alert="">You contact message was sent succesfully. Our Online Agent will respond Soon 	<a class="close" href="#">×</a></div>';

            echo $message_resp;
			 
			 //if($this->emails_model->mail_contact())
			// {  // || $this->emails_model->mail_contact()
			 //	echo '<div class="alert-box done">
			 //				<i class="icon-ok"></i>
			 //				<h4>Success! <span>Your message was sent Successully our online Representative well get back to you soon</span></h4>
			 //			</div>';
			 //}else{

			       // = validation_errors();
			       
			    //   $error = $this->email->print_debugger();
			 	//echo '<div class="alert-box attention">
			 	//			<i class="icon-exclamation-sign"></i>
			 	//			<h4>Error! <span>A required Field is Missing</span></h4>
			 	//		</div>';
				//echo $error;
			// }

			//$this->email->clear();
			//$this->email->print_debugger();



		}


	}


	public function member()
        {




		//$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('sname_val', 'Name', 'trim|required');
		$this->form_validation->set_rules('msex_val', 'Sex', 'trim|required');
		$this->form_validation->set_rules('mphone_val', 'Phone', 'trim|required');
		$this->form_validation->set_rules('mcity_val', 'City', 'trim|required');
		$this->form_validation->set_rules('mstate_val', 'State', 'trim|required');
		$this->form_validation->set_rules('mnationality_val', 'Nationality', 'trim|required');
		$this->form_validation->set_rules('morg_val', 'Message', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="alert-box attention"><i class="icon-exclamation-sign"></i>', '</div>');
			$name_error = form_error('sname_val');
			$email_error = form_error('email_val');
			$messsage_error = form_error('message_val');
			$error = validation_errors();
			echo $error;
		}else
		{

		        //$this->emails_model->add_member();
			//$this->emails_model->mail_contact();
			if($this->emails_model->add_member())
			{  // || $this->emails_model->mail_contact()
				echo '<div class="alert-box done">
							<i class="icon-ok"></i>
							<h4>Success! <span>Your Registration  was Successfull our online Representative well get back to you soon</span></h4>
						</div>';
			}else{

			      // = validation_errors();
				echo '<div class="alert-box attention"><i class="icon-exclamation-sign">
				     <h4>Error! <span>A required Field is Missing</span></h4></div>';
			}

			//$this->email->clear();
			//$this->email->print_debugger();



		}


	}







	public function request_quote()
        {




		//$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('name_val', 'Name', 'trim|required');
		$this->form_validation->set_rules('email_val', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('purpose_val', 'Purpose', 'trim|required');
		$this->form_validation->set_rules('phone1_val', 'Purpose', 'trim|required');
		$this->form_validation->set_rules('message_val', 'Message', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
			$name_error = form_error('name_val');
			$email_error = form_error('email_val');
			$purpose_error = form_error('purpose_val');
			$phone1_error = form_error('phone1_val');
			$messsage_error = form_error('message_val');
			$this->session->set_flashdata('nameerror', $name_error);
			$this->session->set_flashdata('emailerror', $email_error);
			$this->session->set_flashdata('messageerror', $messsage_error);
			$this->session->set_flashdata('purposeerror', $purpose_error);
			$this->session->set_flashdata('phone1error', $phone1_error);
			$this->load->view('email/vali_error');

		}else
		{
		    $this->emails_model->set_quotation();


			//$from_val = $this->input->post('email_val');
			//$name_val = $this->input->post('name_val');
			//$to_val = $this->config->item('webmaster_email', 'tank_auth');
			//$subject_val = $this->input->post('purpose_val');
			//$messages_val = $this->input->post('message_val');
			//
			//
			//$this->email->set_newline("\r\n");
			//$this->email->from($from_val, $name_val);
			//$this->email->to($to_val);
			//$this->email->subject($subject_val);
			//$this->email->message($messages_val);


			if($this->emails_model->user_contact())
			{
				$this->load->view('email/contact_message_success');
			}else{


				$this->load->view('email/contact_message_error');
			}

			//$this->email->clear();
			//$this->email->print_debugger();



		}


	}





}
?>