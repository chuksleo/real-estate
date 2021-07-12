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
class Home extends CI_Controller {

    //put your code here
    public function index() {
        $this->load->library('ion_auth');
        $this->load->model('property_model');
        $this->load->model('location_model');
        $this->load->model('banners_model');

        $this->load->model('blog_model');
        
        $this->load->model('testimonial_model');
        // if ($this->ion_auth->logged_in()) {
        //     $data['project'] = $this->campaign_model->campaign_model();
        // }
        // $data['feturedpost'] = $this->blog_model->get_featured_post();
        $data['featured_location'] = $this->location_model->getFeturedLocation();
        $data['properties'] = $this->property_model->get_properties_limit();
        $data['featured_properties'] = $this->property_model->getFeaturedProperty();
        // $data['testimonials'] = $this->testimonial_model->get_front_testimony();
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['locations'] = $this->location_model->mapLocation();
        $data['page_title'] = "REALESTATE9JA: Africa #1 Housing Platform ";
         $data['banners'] = $this->banners_model->getAllBanners();

        $this->load->view('section/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('section/footer');
    }
    
    

}
