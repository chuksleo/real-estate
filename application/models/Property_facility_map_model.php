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
class Property_facility_map_model extends CI_Model {

        
    public function getAllPropertyFacilityMaps($pid){
        $this->db->select()->from('property_facility_map AS pcm')->where('pcm.pcategory_id =',$cid);        
        $this->db->join('property_facilities AS t', 't.ptype_id = pcm.ptypeid');
        $query = $this->db->get();
        return $query->result();
    }

    
    



     public function checkFacilityMap($propertyid, $facilityid) {

        $this->db->select()->from('property_facility_map AS pcm')->where('pcm.pcategory_id =',$catid);
        $this->db->where('pcm.ptypeid =',$type_id);
            
        $query = $this->db->get();
            
        return $query->row();
      
    }
    

    
    
    public function setFacilityMap($propertyid, $facilityid){  
      
        $this->pcategory_id = $propertyid; 
        $this->ptypeid = $facilityid;      
       
        $this->db->insert('property_facility_map', $this);
        // return $this->db->insert_id();
    }
    





     


    public function deletetypeFromCategory($typeid, $catid){  
         
            $where = "ptypeid = ".$typeid." and pcategory_id = ".$catid."";

            return $this->db->delete('property_category_type_map', $where);
    }

}
