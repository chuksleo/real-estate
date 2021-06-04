<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of donation_model
 *
 * @author CHUKWUKA CHIME
 */
class Inspection_request_model extends CI_Model {

        
    public function get_all_donation(){
        $query = $this->db->get("inspection_request");
        return $query->result();
    }

    
    public function getTotalInspectionRequest(){

        $query = $this->db->get("inspection_request");
        return $query->num_rows();

    }

    // public function getAllInspectionRequest(){

    //    $this->db->select()->from('inspection_request');

    //     $query = $this->db->get();
    //     return $query->num_rows();

    // }


    public function getTotalUserinspection_request($uid){

       $this->db->select()->from('inspection_request AS d')->where('d.uid =',$uid);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function getTotalUserDonationAmounts($uid){

       $this->db->select('amount')->from('inspection_request AS d')->where('d.uid =',$uid);

        $query = $this->db->get();
        return $query->result();

    }

    public function getTotalDonationAmounts(){

       $this->db->select('amount')->from('inspection_request');

        $query = $this->db->get();
        return $query->result();

    }


    public function user_inspection_request($uid){
        $query = $this->db->get_where("inspection_request", array("uid" => $uid));
        return $query->result();
    }
    
    public function get_inspection_request_byId($id) {
        
            $query = $this->db->get_where("inspection_request", array("id" => $id));
            return $query->row();
      
    }


    public function get_inspection_request_count_bycampaignId($cid) {
        
            $query = $this->db->get_where("inspection_request", array("campaign_id" => $cid));
            return $query->num_rows();
      
    }
    
    
    public function set_donation($uid, $name, $campaignid, $email, $amount, $country, $refcode, $paymentgatway, $ananymous, $comment){  
        $this->uid = $uid; 
        $this->full_name = $name; 
        $this->campaign_id = $campaignid;
        $this->email = $email; 
        $this->amount = $amount;
        $this->country = $country;
        $this->reference = $refcode;
        $this->payment_gateway = $paymentgatway;
        $this->Ananymous = $ananymous;
        $this->comment = $comment;
        $this->datecreated = new DateTime();
       
        $this->db->insert('inspection_request', $this);
        return $this->db->insert_id();
    }
    
    

}
