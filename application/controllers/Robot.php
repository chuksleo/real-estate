<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Robot extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
				
	}

	function index()
	{
			
			
			$this->load->view('robots.txt');
			

		
	}
}

/* End of file rorbot.php */
/* Location: ./application/controllers/welcome.php */