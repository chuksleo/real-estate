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
class Banners_model extends CI_Model {

        
    public function getAllBanners(){
        $this->db->select()->from('front_banners AS fb')->order_by('fb.banner_id', 'desc');  
        $query = $this->db->get();
        return $query->result();
    }



    public function getBannerById($bid){
       
        $this->db->select()->from('front_banners AS fb')->where('fb.banner_id =',$bid);
       
        $query = $this->db->get();
        return $query->row();

    }


    
    
    public function setBanner($title,$slug,$banner,$status){  
        $this->title = $title;
        $this->slug = $slug;        
        $this->banner_image = $banner;
        $this->active = $status;
        $this->db->insert('front_banners', $this);
        return $this->db->insert_id();
    }
    





     public function updateBanner($bid, $title,$slug,$banner,$status){  
         $data = array(

                'title' => $title,  
                'slug' => $slug,              
                'banner_image' => $banner,
                'active' => $status,
               
               

            );

            $where = "banner_id = ".$bid."";

            return $this->db->update('front_banners', $data, $where);
    }
    



    public function deleteBanner($bid){  
         
            $where = "banner_id = ".$bid."";

            return $this->db->delete('front_banners', $where);
    }



   
    

}
