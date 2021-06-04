<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campaign_model
 *
 * @author Green Lenovo
 */
class Report_campaign_model extends CI_Model {

    //put your code here
    public $repid; 
    public $campaign_id;
    public $comment;
    public $date_created;    
   
    
    public function get_all_reported(){



        $this->db->select()->from('reported_campaigns AS r');
        $this->db->join('campaigns AS c', 'c.CampaignId = r.campaign_id');
          
        $query = $this->db->get();
            
        return $query->result();
    }


    public function create_campaign_report($campaign_id, $comment){  
        $this->campaign_id = $campaign_id; 
        $this->comment = $comment;
        $this->date_created = new DateTime();
        
        $this->db->insert('reported_campaigns', $this);
        return $this->db->insert_id();
    }
    
   
}
