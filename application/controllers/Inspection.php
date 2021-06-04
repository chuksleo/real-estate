<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Campaign
 *
 * @author Green Lenovo
 */
class Donation extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model("donation_model");
        $this->load->model("campaign_model");
        $this->load->model("country_model");
       
    }
    
    public function index () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['donations'] = $this->donation_model->user_donations($uid);
            $this->load->view("donations/index" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }



    public function all () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['donations'] = $this->donation_model->get_all_donation();
            $this->load->view("donations/index" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }




    public function view ($id) {

        if($this->ion_auth->logged_in() == true){

        $data['is_loggedin'] = $this->ion_auth->logged_in();       
        $data['donation'] = $this->donation_model->get_donations_byId($id);
        $this->load->view("donations/view" , $data);

         }else{

            redirect('/', 'refresh');
        }
    }

  


    public function pay ($title, $campaignid) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();  
        $data['categories'] = $this->project_category_model->getCategories();   
        $data['countries'] = $this->country_model->get_all_countries(); 
        $data['cat_title'] = $title;
        $donors = $this->donation_model->get_donations_count_bycampaignId($campaignid);
        if($donors == null){
            $donors = 0;
        }
        $data['donors'] = $donors; 

        $data['campaign'] = $this->campaign_model->get_campaign_byId($campaignid);

        $data['percentage'] = $this->campaign_model->getPercentageRaised($data['campaign']->Amount, $data['campaign']->Current);

        $this->load->view("campaign/pay" , $data);
    }

 


    public function makePayment(){


            $uid =  $this->input->post('user_val');
            $name = $this->input->post('name_val');
            $campaignid =  $this->input->post('campaign_val');
            $email = $this->input->post('email_val');
            $amount =  $this->input->post('amount_val');
            $country =  $this->input->post('country_val');
            $paymentgatway = "paystack";
            $ananymous = $this->input->post('ananymous_val');
            $comment = $this->input->post('comment_val');
            $tnumber = $this->input->post('refCode_val');
            


            $message_resp = "";
            if($this->donation_model->set_donation($uid, $name, $campaignid, $email, $amount, $country, $tnumber, $paymentgatway, $ananymous, $comment)){
                
                $this->campaign_model->updateAmountRaised($campaignid, $amount);


                $message_resp = '<div class="alert alert-success" role="alert" data-alert="">Your Payment Notification has been sent succesfully. Our Online Agent will respond Soon Thanks for your Surpport And Care<a class="close" href="#">x</a></div>';


            }else{
                 $message_resp = '<div class="alert-box danger radius" data-alert="">Error Saving Payment on server. Our Online Agent will respond Soon Thanks for your Surpport<a class="close" href="#">x</a></div>';


            }
           
            echo $message_resp;



    }




}
