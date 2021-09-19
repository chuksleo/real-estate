<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		
	}

	function index()
	{
			
			


		$data['properties'] = $this->property_model->get_all_properties_admin();
		// $data['projects'] = $this->product_model->getAllPublishedProducts();
		$this->load->view('sitemap.xml', $data);
			

		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */