<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of property_types_model
 *
 * @author CHUKWUKA CHIME
 */
class Property_types_model extends CI_Model {

        
    public function getAllPropertyTypes(){
        $query = $this->db->get("property_types");
        return $query->result();
    }

    
    public function getTotalPropertyTypes(){

        $query = $this->db->get("property_types");
        return $query->num_rows();

    }



     public function getPropertyTypesById($id) {

            $this->db->select()->from('property_types AS l')->where('l.ptype_id =',$id);
            
            
            $query = $this->db->get();
            
            return $query->row();
      
    }
    

    
    
    public function setPropertyTypes($title, $status){  
      
        $this->title = $title; 
        $this->status = $status;      
       
        $this->db->insert('property_types', $this);
        // return $this->db->insert_id();
    }
    





     public function updatePropertyTypes($pid, $title, $status){  
         $data = array(

                
                'title' =>$title,                
                'status' => $status,              
               

            );

            $where = "ptype_id = ".$pid."";

            return $this->db->update('property_types', $data, $where);
    }
    



    public function deletePropertyTypes($pid){  
         
            $where = "ptype_id = ".$pid."";

            return $this->db->delete('property_types', $where);
    }

}
