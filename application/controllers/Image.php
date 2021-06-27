<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of property
 *
 * @author Green Lenovo
 */
class Image extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
       
    }
    
    









    public function uploadFile() {

       
        $uid = $this->ion_auth->get_user_id();
        $config['upload_path'] = './assets/uploads/property/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 20048; // Need to define properly              
        $config['file_name'] = time().$uid;       
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $image = "";
        $pic = $this->upload->data();
        if($_FILES['userfile']['size'] == 0){
            $image = $image;
        }else{
            $image = $pic['file_name'];
        }

        return $image;


    }

     
    





   
     

}
