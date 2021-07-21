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

    
    public function get_all_properties($num, $start){
                
        $pub ="Published";
         
        $this->db->select()->from('properties AS p')->limit($num, $start)->where('p.property_status =',$pub)->order_by('last_updated','desc');
        $this->db->join('users AS u', 'u.id = p.uid');
        $this->db->join('locations AS l', 'l.lid = p.location_id','left');
        $this->db->join('property_images AS im', 'im.property_id = p.pid','left')->group_by('p.pid');
        $query = $this->db->get();
        return $query->result();
    }



     public function getTotalProperties(){
        $pub ="Published";
       $this->db->select()->from('properties as p')->where('p.property_status =',$pub);

        $query = $this->db->get();
        return $query->num_rows();

    }



     public function get_all_unpublished_properties(){
       
        $pub ="Unpublished";
         
        $this->db->select()->from('properties AS p')->where('p.property_status =',$pub)->order_by('last_updated','desc');
        $this->db->join('users AS u', 'u.id = p.uid');
        $this->db->join('locations AS l', 'l.lid = p.location_id','left');
        $this->db->join('property_images AS im', 'im.property_id = p.pid','left')->group_by('p.pid');
        $query = $this->db->get();
        return $query->result();
    }


   

    public function getTotalPropertyForLocation($lid){
        $status = "Published";
        $this->db->select()->from('properties AS p')->where('p.location_id =',$lid);
        $this->db->where('p.property_status =',$status);

        $query = $this->db->get();
        return $query->num_rows();

    }


    
 

    public function getTotalUserproperties($uid){

       $this->db->select()->from('properties AS c')->where('c.uid =',$uid);

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
         $this->db->select()->from('properties AS p')->where('p.uid =',$uid);
         $this->db->join('users AS u', 'u.id = p.uid');
        $this->db->join('locations AS l', 'l.lid = p.location_id','left');
        $this->db->join('property_images AS im', 'im.property_id = p.pid','left')->group_by('p.pid');
        
         $query = $this->db->get();
        return $query->result();
    }
    
    public function getPropertyById($id) {
            $status = "Published";
            $this->db->select()->from('properties AS p')->where('p.pid =',$id);
            $this->db->where('p.property_status =',$status);
            $this->db->join('users AS u', 'u.id = p.uid');
            $this->db->join('locations AS l', 'l.lid = p.location_id','left');

            // $this->db->join('categories AS ca', 'ca.catId = c.CategoryId','left');
            $query = $this->db->get();
            
            return $query->row();
      
    }
    
    public function getPropertyByCategory($catId, $num, $start) {
        $sid = 1;
        $status = "Published";
        $this->db->select()->from('properties AS p')->limit($num, $start)->where('p.category_id =',$catId);
        $this->db->where('p.property_status =',$status);
                $this->db->join('users AS u', 'u.id = p.uid');
                $this->db->join('locations AS l', 'l.lid = p.location_id','left')->group_by('p.pid');
        $query = $this->db->get();
        return $query->result();
    }


    public function getTotalPropertiesByCategory($catId){
       $pub ="Published";
       $this->db->select()->from('properties as p')->where('p.category_id =',$catId);
       $this->db->where('p.property_status =',$pub);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function getPropertyByLocation($locationid) {
        $sid = 1;
        $status = "Published";
        $this->db->select()->from('properties AS p')->where('p.location_id =',$locationid);
        $this->db->where('p.property_status =',$status);
                $this->db->join('users AS u', 'u.id = p.uid');
                $this->db->join('locations AS l', 'l.lid = p.location_id','left')->group_by('p.pid');
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


    
    public function create_property($title, $uid, $image, $end_date, $category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing, $size_sqm, $bedrooms, $bathrooms, $pets, $property_use, $smoking, $parties, $negotiable, $parking_space, $agent_fee, $agreement_fee, $capacity, $video_link, $duration, $status){ 



        $this->title = $title; 
        $this->uid = $uid; 
        $this->image = $image; 
        $this->end_date = new DateTime();
        $this->category_id = $category; 
        $this->price = $price;       
        $this->description = $description;
        $this->location_id = $location_id;
        $this->property_address = $address;
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
        $this->date_created = new DateTime();
        $this->last_updated = new DateTime();
        $this->property_status = $status;
     




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
           'property_address' => $address,
           'proproperty_perty_type_id' => $property_type_id,
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
           'property_status' => $fullname,

            );

            $where = "pid = ".$pid."";

            return $this->db->update('properties', $data, $where);
    }







    public  function getPropertySearchResult($s_data)  
    {  

       


        $this->db->select('p.*, l.*, u.*');
        $this->db->from('properties as p');        
        $this->db->join('users as u', 'u.id = p.uid','left');
        $this->db->join('locations as l', 'l.lid = p.location_id','left'); 
        $this->db->join('property_images AS im', 'im.property_id = p.pid', 'left')->group_by('p.pid');

        if(isset($s_data['title'])){
            $this->db->like('p.title',$s_data['title']);
        }else{
            if($s_data['category'])
               $this->db->where('p.category_id',$s_data['category']);
            if($s_data['type'])
               $this->db->where('p.property_type_id',$s_data['type']);
            if($s_data['location'])
               $this->db->where('p.location_id', $s_data['location']);
            if($s_data['condition'] != "Any")
               $this->db->where('p.property_condition', $s_data['condition']);
            if($s_data['bedroom'] !="Any")
               $this->db->where('p.bedrooms', $s_data['bedroom']);
            if($s_data['bathroom'] !="Any")
               $this->db->where('p.bathrooms', $s_data['bathroom']);
            
            if($s_data['minprice'] =="" and $s_data['maxprice'] !=""  )
               $this->db->where('p.price <=', $s_data['maxprice']);
            if($s_data['minprice'] !="" and $s_data['maxprice'] ==""  )
               $this->db->where('p.price >=', $s_data['minprice']); 

            if($s_data['minprice'] !="" and $s_data['maxprice'] !=""){
                $this->db->where('p.price >=', $s_data['minprice']); 
               $this->db->where('p.price <=', $s_data['maxprice']); 

            }
               

        }   
        

        
        $query = $this->db->get();
        return $query->result();
    }







     public function publish_property($pid){


      

            $publish_val = "Published";
            $data = array(

                'property_status' => $publish_val
                

            );

       
        $where = "pid = ".$pid."";
        return $this->db->update('properties', $data, $where);
       
    }



    public function unpublish_property($pid){


        

            $publish_val = "Unpublished" ;
            $data = array(

                'property_status' => $publish_val
                

            );

       
        $where = "pid = ".$pid."";
        return $this->db->update('properties', $data, $where);
       
    }





   public  function cleanTitle($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        $string =  strtolower($string); // return lower case string

        return $string;
    }





    public  function getMoneyFormat($price) {
        
        setlocale(LC_MONETARY,"de_DE");
        $formated_price = number_format(($price), 2, '.', ',');

        return $formated_price;
    }

}
