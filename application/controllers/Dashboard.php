<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Green Lenovo
 */
class Dashboard extends CI_Controller {


     public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');   
         $this->load->model('reviews_model');
        $this->load->model('location_model');
        $this->load->model('inspection_request_model');
        $this->load->model('property_category_model');
        $this->load->model('property_types_model');
        $this->load->model('Property_facility_model');

        $this->load->model('property_category_map_model'); 
        
        
    }
    //put your code here
    public function index() {

       $uid = $this->ion_auth->get_user_id();
       $data['total_members'] = 20;
        $data['total_properties'] = $this->property_model->getTotalProperties();
        $data['total_reviews'] = $this->reviews_model->getTotalProperties();
        $data['total_inspection_request'] = $this->inspection_request_model->getTotalInspectionRequest();

      

       
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $this->load->view('section/admin/header', $data);
        $this->load->view('section/dashboard', $data);
        $this->load->view('section/admin/footer', $data);
    }

    
    

}
