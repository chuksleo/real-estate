<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banner_model
 *
 * @author CHUKWUKA CHIME
 */
class Message_model extends CI_Model {

        
    public function getAllMessages(){
        $this->db->select()->from('messages AS fb');  
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllContactMessages(){
        $this->db->select()->from('contact_us AS fb');  
        $query = $this->db->get();
        return $query->result();
    }

    public function getCountUnreadContactMessages(){
        $stat = 0;
        $this->db->select()->from('contact_us AS ms')->where('ms.view_status =', $stat);  
        $query = $this->db->get();
        return $query->num_rows();
    }

     public function getMessageById($mid){
        $this->db->select()->from('messages AS ms')->where('ms.mid =', $mid);  
        $query = $this->db->get();
        return $query->row();
    }


    public function getAllUnreadMessages(){
        $this->db->select()->from('messages AS fb');  
        $query = $this->db->get();
        return $query->result();
    }


    public function getCountUnreadMessages(){
        $this->db->select()->from('messages AS ms')->where('ms.status =', 'Unread');  
        $query = $this->db->get();
        return $query->num_rows();
    }


    
    
    public function createMessage($fullname,$email,$phone,$propertyid,$message){  
        $this->name = $fullname; 
        $this->email = $email;
        $this->phone = $phone;
        $this->propertyid = $propertyid;       
        $this->message = $message;
        $this->status = "Unread";   
        $this->db->insert('messages', $this);
        return $this->db->insert_id();
    }
    





     public function updateMessage($mid){  
         $data = array(

                'status' => "Read",
                
               

            );

            $where = "mid = ".$mid."";

            return $this->db->update('messages', $data, $where);
    }
    



    public function deleteMessage($mid){  
         
            $where = "mid = ".$mid."";

            return $this->db->delete('messages', $where);
    }



   
    

}
