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
class Property_category_model extends CI_Model {

        
    public function getAllCategories(){
        $stat = "On";
        $this->db->select()->from('property_categories AS l')->where('l.status =',$stat);
        $query = $this->db->get();
        return $query->result();
    }


    public function getAdminAllCategories(){
        
        $this->db->select()->from('property_categories');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function getTotalCategories(){

        $query = $this->db->get("property_categories");
        return $query->num_rows();

    }



     public function getCategoryById($id) {

            $this->db->select()->from('property_categories AS l')->where('l.catId =',$id);
            
            
            $query = $this->db->get();
            
            return $query->row();
      
    }
    

    
    
    public function setCategory($title, $status){  
      
        $this->title = $title; 
        $this->status = $status;      
       
        $this->db->insert('property_categories', $this);
        // return $this->db->insert_id();
    }
    





     public function updateCategory($catid, $title, $status){  
         $data = array(

                
                'title' =>$title,                
                'status' => $status,              
               

            );

            $where = "catId = ".$catid."";

            return $this->db->update('property_categories', $data, $where);
    }
    



    public function deleteCategory($cid){  
         
            $where = "catId = ".$cid."";

            return $this->db->delete('property_categories', $where);
    }

}
