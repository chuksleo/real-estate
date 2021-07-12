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
class Property_facility_model extends CI_Model {

        
    public function getAllFacilities(){
        $query = $this->db->get("property_facilities");
        $query = $this->db->get();
            
        return $query->result();
    }





    
    public function getTotalFacilities(){

        $query = $this->db->get("property_facilities");
        return $query->num_rows();

    }



     public function getFacilityById($id) {

            $this->db->select()->from('property_facilities AS l')->where('l.facility_id =',$id);
            
            
            $query = $this->db->get();
            
            return $query->row();
      
    }
    

    
    
    public function setFacility($title, $status){  
      
        $this->name = $title; 
        $this->status = $status;      
       
        $this->db->insert('property_facilities', $this);
        // return $this->db->insert_id();
    }
    





     public function updateFacility($fid, $title, $status){  
         $data = array(

                
                'name' =>$title,                
                'status' => $status,              
               

            );

            $where = "facility_id = ".$fid."";

            return $this->db->update('property_facilities', $data, $where);
    }
    



    public function deleteFacility($fid){  
         
            $where = "facility_id = ".$fid."";

            return $this->db->delete('property_facilities', $where);
    }

}
