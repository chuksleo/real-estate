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
        $data['total_members'] = null;
        $data['total_properties'] = null;
        $data['total_view'] = 0;
        $data['properties'] = null;
        $data['total_reviews'] = null;
        $data['total_inspection_request'] = null;
       if($this->ion_auth->logged_in()){
            $uid = $this->ion_auth->get_user_id();
             
            $data['total_properties'] = $this->property_model->getTotalUserProperties($uid);

            $properties = $this->property_model->user_properties($uid);
            $data['properties'] = $properties;  
            foreach ($properties as $prop) {
                $data['total_view'] = $data['total_view'] + $prop->view_count;
            }
            $data['total_reviews'] = $this->reviews_model->getTotalProperties();
       }else{
            redirect("/", "refresh");
       }
       
        

      

       
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $this->load->view('section/admin/header', $data);
        $this->load->view('section/dashboard', $data);
        $this->load->view('section/admin/footer', $data);
    }

    
    

}
