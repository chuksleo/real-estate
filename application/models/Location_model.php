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
        
        $query = $this->db->get();
        return $query->result();
    }


    public function getAllParentLocations(){
        $pid = 0;
        $this->db->select()->from('locations AS l')->where('l.parentid =',$pid);   
        
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

    public function getLocationByTitleKey($title) {

            $this->db->select()->from('locations AS l')->where('l.title_key', $title);
            
            $query = $this->db->get();
            
            return $query->row();
    
    }


    public function getLocationByParentId($id) {

            $this->db->select()->from('locations AS l')->where('l.parentid =',$id);
            
            
            $query = $this->db->get();
            
            return $query->result();
    
    }
    


     public function getFeturedLocation() {

            $this->db->select()->from('locations AS l')->where('l.featured =', 'Yes');
            
            
            $query = $this->db->get();
            
            return $query->result();
    
    }
    

    
    
    public function setLocation($title,$title_key, $banner, $parentid, $description, $featured, $status){  
        $this->parentid = $parentid; 
        $this->location_title = $title; 
        $this->title_key = $title_key; 
        $this->description = $description;
        $this->featured = $featured; 
        $this->status = $status; 
        $this->banner_image = $banner;        
        $this->date_created = new DateTime();
       
        $this->db->insert('locations', $this);
        return $this->db->insert_id();
    }
    





     public function updateLocation($lid, $title, $title_key, $banner, $parentid, $description, $featured, $status, $date_val){  
         $data = array(

                'parentid' => $parentid,
                'location_title' =>$title,
                'title_key' => $title_key,
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



    public function getLocationIdWithTitle($title){

        $locid = $this->getLocationByTitleKey($title);
        print("THISIS ");
        print_r($locid);
        // return $locid->id;
    }



    public function mapLocation(){
        $data = array();
        $locations = $this->getAllParentLocations();
        $i = 0;
        foreach ($locations as $location) {
            $toplocation =  null;
            
            $toplocation['location'] = $location->location_title;
            
            $sublocations = $this->getLocationByParentId($location->lid);
            $toplocation['sublocation'] = "";
            if($sublocations){
                $l = 0;
                foreach ($sublocations as  $sublocation) {

                    $lastsublocations = $this->getLocationByParentId($sublocation->lid);

                    $toplocation['sublocation'][$l] = $sublocation->location_title;
                    $toplocation['lastsublocations'] = "";
                    if($lastsublocations){
                        $m = 0;
                        foreach ($lastsublocations as  $lsublocation) {
                            $toplocation['lastsublocations'][$m] = $lsublocation->location_title;

                        $m++;
                        }
                    }
                    
                    
                $l++; 
                } 
            }
            
            // array_push($data, $toplocation) ; 
            $data[$i] = $toplocation;
        
         $i++;
        }      
    // print_r($data);

    return $data;
    }


    

}
