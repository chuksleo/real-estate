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
        $this->load->model("campaign_model");
         $this->load->model("donation_model");
       
        
    }
    //put your code here
    public function index() {

       $uid = $this->ion_auth->get_user_id();
       $data['total_donations'] = $this->donation_model->getTotalUserDonations($uid);
       $funds= $this->donation_model->getTotalUserDonationAmounts($uid);

       $amount = 0;
       foreach($funds as $fund){
            $amount = ($amount + $fund->amount);
       }

       
        $data['total_campaigns'] = $this->campaign_model->getTotalUserCampaigns($uid);
        $data['total_raised'] = $amount;

        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $this->load->view('section/admin/header', $data);
        $this->load->view('section/dashboard', $data);
        $this->load->view('section/admin/footer', $data);
    }

    
    

}
