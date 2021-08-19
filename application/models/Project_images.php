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
class Project_images extends CI_Model {

        
    public function getImagesByProjectId($id) {

        $this->db->select()->from('project_images AS l')->where('l.projectid =',$id);
            
            
        $query = $this->db->get();
            
        return $query->result();
      
    }
    

    
    
    public function setProjectImage($images, $pid){  
      
        
        $this->projectid = $pid; 
        $this->image = $images;      
       
        return $this->db->insert('project_images', $this);
        
    }


    public function deleteProjectImages($pid){  
         
            $where = "projectid = ".$pid."";

            return $this->db->delete('project_images', $where);
    }



}
