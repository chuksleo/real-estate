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
class Property_images extends CI_Model {

        
    public function getImagesByPropertyId($id) {

        $this->db->select()->from('property_images AS l')->where('l.property_id =',$id);
            
            
        $query = $this->db->get();
            
        return $query->result();
      
    }



    public function getImagesCountByPropertyId($id) {

        $this->db->select()->from('property_images AS l')->where('l.property_id =',$id);
            
            
        $query = $this->db->get();
            
        return $query->num_rows();
      
    }
    

    
    
    public function setPropertyImage($filename, $pid){  
      
        $this->filename = $filename; 
        $this->property_id = $pid;      
       
        return $this->db->insert('property_images', $this);
        
    }
    





     public function updateFacility($fid, $title, $status){  
         $data = array(

                
                'name' =>$title,                
                'status' => $status,              
               

            );

            $where = "facility_id = ".$fid."";

            return $this->db->update('property_facilities', $data, $where);
    }
    



    public function deletePropertyImage($imgid){  
         
            $where = "imgid = ".$imgid."";

            return $this->db->delete('property_images', $where);
    }

}
