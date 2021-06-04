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
class Location_model extends CI_Model {

        
    public function getAllLocations(){
        $this->db->select()->from('locations AS l')->order_by('l.parentid', 'title');    
        // $query = $this->db->get("locations AS lo")->group_by('lo.parentid');; 
        $query = $this->db->get();
        return $query->result();
    }

    
    public function getTotalLocations(){

        $query = $this->db->get("locations");
        return $query->num_rows();

    }



     public function getLocationById($id) {

            $this->db->select()->from('locations AS l')->where('l.lid =',$id);
            
            
            $query = $this->db->get();
            
            return $query->row();
    
    }
    


     public function getFeturedLocation() {

            $this->db->select()->from('locations AS l')->where('l.featured =', 'Yes');
            
            
            $query = $this->db->get();
            
            return $query->result();
    
    }
    

    
    
    public function setLocation($title, $banner, $parentid, $description, $featured, $status){  
        $this->parentid = $parentid; 
        $this->location_title = $title; 
        $this->description = $description;
        $this->featured = $featured; 
        $this->status = $status; 
        $this->banner_image = $banner;        
        $this->date_created = new DateTime();
       
        $this->db->insert('locations', $this);
        return $this->db->insert_id();
    }
    





     public function updateLocation($lid, $title, $banner, $parentid, $description, $featured, $status, $date_val){  
         $data = array(

                'parentid' => $parentid,
                'location_title' =>$title,
                'description' => $description,
                'featured' => $featured,
                'status' => $status,
                'banner_image' => $banner,
                'date_created' => $date_val,
               

            );

            $where = "lid = ".$lid."";

            return $this->db->update('locations', $data, $where);
    }
    



    public function deleteLocation($lid){  
         
            $where = "lid = ".$lid."";

            return $this->db->delete('locations', $where);
    }

}
