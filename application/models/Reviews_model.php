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
class Reviews_model extends CI_Model {

    





    public function getTotalProperties(){

       $this->db->select()->from('property_reviews');

        $query = $this->db->get();
        return $query->num_rows();

    }


    public function create_review_report($propid, $comment, $uid){  
        $this->property_id = $propid; 
        $this->review = $comment;
        $this->userid = $uid;
        
        $this->db->insert('property_reviews', $this);
        return $this->db->insert_id();
    }
    
   
}
