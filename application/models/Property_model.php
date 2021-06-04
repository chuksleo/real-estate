<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campaign_model
 *
 * @author Green Lenovo
 */
class Property_model extends CI_Model {

    //put your code here
    // public $CampaignId; 
    // public $image;
    // public $Title;
    // public $UserId;    
    // public $EndDate;
    // public $Description;
    // public $StatusId;
    // public $Amount;
    // public $Beneficiary;
    // public $Current;
    // public $DateCreated;
    // public $DateModified;

    
    public function get_all_properties(){
         $this->db->select()->from('properties AS p');
         $this->db->join('users AS u', 'u.id = p.uid');
        $this->db->join('locations AS l', 'l.lid = p.location_id','left')->group_by('p.location_id');
         // $this->db->join('property_statuses AS cs', 'cs.propertystatusId = c.StatusId');
         // $this->db->join('property_categories AS ca', 'ca.catId = c.CategoryId','left')->group_by('c.CampaignId');
         $query = $this->db->get();
        return $query->result();
    }


    public function getTotalProperties(){

       $this->db->select()->from('properties');

        $query = $this->db->get();
        return $query->num_rows();

    }


    public function getTotalUserproperties($uid){

       $this->db->select()->from('properties AS c')->where('c.UserId =',$uid);

        $query = $this->db->get();
        return $query->num_rows();

    }


    


 
    public function get_properties_limit($num=9,$start=0)
        {

                

                $this->db->select()->from('properties AS c')->limit($num, $start);
                $this->db->join('users AS u', 'u.id = c.uid');
                $this->db->join('locations AS l', 'l.lid = c.location_id','left')->group_by('c.location_id');

                $query = $this->db->get();
                return $query->result();
        }


    public function getFeaturedProperty($num=9,$start=0)
        {

                

                $this->db->select()->from('properties AS c')->where('c.featured', 'Yes')->limit($num, $start);
                $this->db->join('users AS u', 'u.id = c.uid');
                $this->db->join('locations AS l', 'l.lid = c.location_id','left')->group_by('c.location_id');

                $query = $this->db->get();
                return $query->result();
        }



     public function user_properties($uid){
         $this->db->select()->from('properties AS c')->where('c.UserId =',$uid);
         $this->db->join('campaign_statuses AS cs', 'cs.CampaignStatusId = c.StatusId');
         $this->db->join('categories AS ca', 'ca.catId = c.CategoryId','left')->group_by('c.CampaignId');
         $query = $this->db->get();
        return $query->result();
    }
    
    public function getPropertyById($id) {

            $this->db->select()->from('properties AS c')->where('c.id =',$id);
            $this->db->join('users AS u', 'u.id = c.uid');
            $this->db->join('locations AS l', 'l.lid = c.location_id','left');
            // $this->db->join('categories AS ca', 'ca.catId = c.CategoryId','left');
            $query = $this->db->get();
            
            return $query->row();
      
    }
    
    public function getPropertyByCategory($catId) {
        $sid = 1;
        $this->db->select()->from('properties AS c')->where('c.category_id =',$catId);
                $this->db->join('users AS u', 'u.id = c.uid');
                $this->db->join('locations AS l', 'l.lid = c.location_id','left')->group_by('c.location_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_project_properties_current($projectId) {
        $query = $this->db->get_where("properties", array("ProjectId" => $projectId));
        return $query->row();
    }



    public function getDaysLeft($enddate){
        $today = time();        
        $datetime2 = strtotime($enddate);

        $secs = ($datetime2 - $today);
        // $days = $secs / 86400;
        $days = round($secs / (60 * 60 * 24));

        return $days;
    }


    
    public function create_property($title, $uid, $image, $end_date, $category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing, $size_sqm, $bedrooms, $bathrooms, $pets, $property_use, $smoking, $parties, $negotiable, $parking_space, $agent_fee, $agreement_fee, $capacity, $video_link, $duration, $property_option, $status){ 



        $this->title = $title; 
        $this->uid = $uid; 
        $this->image = $image; 
        $this->end_date = new DateTime();
        $this->category_id = $category; 
        $this->price = $price;       
        $this->description = $description;
        $this->location_id = $location_id;
        $this->address = $address;
        $this->property_type_id = $property_type_id;
        $this->property_condition = $property_condition;
        $this->furnishing = $furnishing;
        $this->size_sqm = $size_sqm;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
        $this->pets = $pets;
        $this->property_use = $property_use;
        $this->smoking = $smoking;
        $this->parties = $parties;
        $this->negotiable = $negotiable;
        $this->parking_space = $parking_space;
        $this->agent_fee = $agent_fee;
        $this->agreement_fee = $agreement_fee;
        $this->capacity = $capacity;
        $this->video_link = $video_link;

        $this->duration = $duration;
        $this->property_option = $property_option;
        $this->date_created = new DateTime();
        $this->last_updated = new DateTime();
        $this->status = $status;
     




        $this->db->insert('properties', $this);
        return $this->db->insert_id();
    }
    
    public function update_property($title, $uid, $image, $end_date, $category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing, $size_sqm, $bedrooms, $bathrooms, $pets, $property_use, $smoking, $parties, $negotiable, $parking_space, $agent_fee, $agreement_fee, $capacity, $video_link, $duration, $property_option, $date_created, $last_updated, $status){


        $datestring = "%Y-%m-%d %h:%i:%a";

            // get stytem current time
            $time = time();
            $cur_date = mdate($datestring, $time);
         

        $data = array(

           'title' => $title, 
           'uid' => $uid,     
           'image' => $image, 
           'end_date' => $end_date, 
           'price' => $price,       
           'description' => $description,
           'location_id' => $location_id,
           'address' => $address,
           'property_type_id' => $property_type_id,
           'property_condition' => $property_condition,
           'furnishing' => $furnishing,
           'size_sqm' => $size_sqm,
           'bedrooms' => $bedrooms,
           'bathrooms' => $bathrooms,
           'pets' => $pets,
           'property_use' => $property_use,
           'smoking' => $smoking,
           'parties' => $parties,
           'negotiable' => $negotiable,
           'parking_space' => $parking_space,
           'agent_fee' => $agent_fee,
           'agreement_fee' => $agreement_fee,
           'capacity' => $capacity,
           'video_link' => $video_link,

           'duration' => $duration,
           'property_option' => $property_option,
           'date_created' => $date_created,
           'last_updated' => new DateTime(),
           'status' => $fullname,

            );

            $where = "id = ".$pid."";

            return $this->db->update('properties', $data, $where);
    }




     public function updateAmountRaised($campaignid, $amount){


        $this->db->where('CampaignId', $campaignid);
        $this->db->set('Current', 'Current+'.$amount.'', FALSE);
        return $this->db->update('properties');

       //      $data = array(

               
       //          'Current' => $amount

       //      );

       //  $carid = $this->input->post('car_val');
       //  $where = "car_id = ".$carid."";
       // return $this->db->update('car', $data, $where);
    }







     public function publish_campaign($cid){


        $cur_date = date('Y-m-d H:i:s');

            $publish_val = 1;
            $data = array(

                'StatusId' => $publish_val,
                'DateModified' => $cur_date

            );

       
        $where = "CampaignId = ".$cid."";
        return $this->db->update('properties', $data, $where);
       
    }



    public function unpublish_campaign($cid){


        $cur_date = date('Y-m-d H:i:s');

            $publish_val = 4 ;
            $data = array(

                'statusId' => $publish_val,
                'DateModified' => $cur_date

            );

       
        $where = "CampaignId = ".$cid."";
        return $this->db->update('properties', $data, $where);
       
    }





   public  function cleanTitle($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        $string =  strtolower($string); // return lower case string

        return $string;
    }

}
