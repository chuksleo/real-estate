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
class Project_model extends CI_Model {

        
    public function getAllProjects(){
        $this->db->select()->from('projects AS l')->order_by('l.project_id', 'asc');    
       
        $query = $this->db->get();
        return $query->result();
    }


    




     public function getProjectById($pid) {

            $this->db->select()->from('projects AS l')->where('l.project_id =',$pid);
            $query = $this->db->get();
            
            return $query->row();
    
    }

    
   
    

    





    public function setProject($title, $titlekey, $description){  

                
        $this->project_title = $title;         
        $this->description = $description;
        $this->formated_text = $titlekey;
       
        $this->db->insert('projects', $this);
        return $this->db->insert_id();
    }
    








     public function updateProject($pid, $title, $titlekey, $description){  
         $data = array(               
                'project_title' => $title,
                'formated_text' => $titlekey,               
                'description' => $description,

            );

            $where = "project_id = ".$pid."";

            return $this->db->update('projects', $data, $where);
    }
    



    public function deleteProject($pid){  
         
            $where = "project_id = ".$pid."";

            return $this->db->delete('projects', $where);
    }



    

}
