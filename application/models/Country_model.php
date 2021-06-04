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
class Country_model extends CI_Model {

    //put your code here
        public $id; 
        public $iso; 
        public $name;
        public $nicename;
        public $iso3; 
        public $numcode;
        public $phonecode;
    

    public function get_all_countries(){
        $query = $this->db->get("countries");
        return $query->result();
    }


}
