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
class Property extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model("property_model");
        $this->load->model("location_model");
        $this->load->model('Property_facility_model');
        $this->load->model('property_facility_map_model');
        $this->load->model('property_category_model');
        $this->load->model('inspection_request_model');
        
    }
    
    public function index () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['properties'] = $this->property_model->user_properties($uid);
            $this->load->view("property/index" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }



    public function allPropertyAdmin () {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $data['is_loggedin'] = $this->ion_auth->logged_in();       
            $data['properties'] = $this->property_model->get_all_properties();
            $this->load->view("property/index" , $data);


        }
       
    }



    public function locationView($title, $locationid){

        $data['cat_title'] = $title;  
        $data['is_loggedin'] = $this->ion_auth->logged_in();       
        $data['properties'] = $this->property_model->getPropertyByLocation($locationid);
        
        $this->load->view("property/list" , $data);



    }


    public function searchProperty () {

            

       
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $location = ""; 
            if($this->input->post("plocation")){
                $title = $this->property_model->cleanTitle($this->input->post("plocation"));
                $result = $this->location_model->getLocationByTitleKey($title);
                $location = $result->lid;
            }      
            
           
            $s_data = array(

               'category' => $this->input->post("propery-category"), 
               'type' => $this->input->post("types"),     
               'location' => $location, 
               'condition' => $this->input->post("condition"),
               'bedroom' => $this->input->post("beds"), 
               'bathroom' => $this->input->post("baths"),       
               'maxprice' => $this->input->post("maxprice"),
               'minprice' => $this->input->post("minprice"),
               

            );

            $data['properties'] = $this->property_model->getPropertySearchResult($s_data);

            // print_r($data);
            $this->load->view("property/list" , $data);
            


        
       
    }





     public function listProperties () {
      
      
        $data['is_loggedin'] = $this->ion_auth->logged_in();       
        $data['properties'] = $this->property_model->get_all_properties();
        
        $this->load->view("property/list" , $data);
        // $this->load->view("property/sidebar" , $data);
    }





    public function category ($title, $catid) {
        $data['cat_title'] = $title;  
        $data['is_loggedin'] = $this->ion_auth->logged_in();       
        $data['properties'] = $this->property_model->getPropertyByCategory($catid);
        
        $this->load->view("property/list" , $data);
    }



   

    public function view ($title, $propertyid) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();  
        $data['property'] = $this->property_model->getPropertyById($propertyid);
        
       
        $this->load->view("property/view" , $data);
    }







    public function getFormatedDate ($mydate) {
        $formatedDate = DateTime::createFromFormat('m/d/Y', $mydate)->format('Y-m-d h:i:s');
        $newdate = DateTime::createFromFormat('d/m/Y', $mydate);
        echo "thIS IS daTE";
        echo $formatedDate;
        $formatedDate = $newdate->format('Y-m-d H:i:s');
            
        return $formatedDate;

    }



    public function uploadFile() {

        $config['upload_path'] = base_url().'/assets/property/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
        $config['max_size'] = 20048; // Need to define properly 
        $uid = $this->ion_auth->get_user_id();             
        $config['file_name'] = time().$uid;       
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile1');
        $pic = $this->upload->data();
        print("THIS IS FILE");
        print($pic);
    }

     
    public function create () {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['action'] = "create";
        if($this->ion_auth->logged_in()){
             if($this->input->post()){
                $title = $this->property_model->cleanTitle($this->input->post("location"));
               
                $location = $this->location_model->getLocationByTitleKey($title);
                
                $uid = $this->ion_auth->get_user_id();
                
               
               

                $title = $this->input->post("title");            
                $image= "file.jpg";
                $end_date = new DateTime();
                $category = $this->input->post("category");
                $price = $this->input->post('price');
                $description = $this->input->post("description");
                $location_id = $location->lid;
                $address = $this->input->post("address");
                $property_type_id = $this->input->post("type");
                $property_condition = $this->input->post("condition");
                $furnishing = $this->input->post("furnishing");
                $size_sqm = $this->input->post("size");
                $bedrooms = $this->input->post("bedroom");
                $bathrooms = $this->input->post("bathroom");
                $pets = $this->input->post("pets");
                $property_use = $this->input->post("use");
                $smoking = $this->input->post("smoke");
                $parties = $this->input->post("parties");
                $negotiable = $this->input->post("negotiate");
                $parking_space = $this->input->post("parkin_space");
                $agent_fee = $this->input->post("agentfee");
                $agreement_fee = $this->input->post("agfee");
                $capacity = $this->input->post("capacity");
                $video_link = $this->input->post("video");
                $duration = $this->input->post("duration");
                $property_option = $this->input->post("options");
                 
                $status = "Unpublished";
                $propertyid = $this->property_model->create_property($title, $uid, $image, $end_date, $category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing='Unfurnished', $size_sqm, $bedrooms, $bathrooms, $pets='No Pets', $property_use='Residential', $smoking='No Smoking', $parties='No Parties', $negotiable, $parking_space='20', $agent_fee='No', $agreement_fee='No', $capacity="100", $video_link='thisisi.mp3', $duration='None', $status);


                if($propertyid){
                    $data['facilities'] = $this->Property_facility_model->getAllFacilities();
                    foreach ($data['facilities'] as $facility) {
                    $clean_title = $this->property_model->cleanTitle($facility->name);
                    if($this->input->post($clean_title)){
                        
                        $facilityid = $this->input->post($clean_title);
                        if(!$this->property_facility_map_model->checkFacilityMap($propertyid, $facilityid)){

                            $this->property_facility_map_model->setFacilityMap($propertyid, $facilityid);

                        }
                     
                    }
                    
                      
                }

                }
                if($this->ion_auth->is_admin()){ 
                    redirect('/admin/properties', 'refresh');
                }else{
                    redirect('/properties', 'refresh');
                }
              
                
            }else{

                    $path = './js/ckfinder';
                    $width = '850px';
                    $data['categories'] = $this->property_category_model->getAllCategories();
                    $this->editor($path, $width);
                    $data['locations'] = $this->location_model->mapLocation();
                    $data['facilities'] = $this->Property_facility_model->getAllFacilities();

        
                    $this->load->view("property/create" , $data);
            }
        


        }else{
            redirect('/auth/login', 'refresh');
        }
       
    }



      /**
     * Sets up the CkEditior
     * @param type $path Relative path to the ckeditor files
     * @param type $width Width of the editor o view
     */
    function editor($path, $width) {
        //Loading Library For Ckeditor
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        //configure base path of ckeditor folder 
        $this->ckeditor->basePath = base_url() . 'js/ckeditor/';
        $this->ckeditor->config['toolbar'] = 'Full';
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = $width;
        //configure ckfinder with ckeditor config 
        $this->ckfinder->SetupCKEditor($this->ckeditor, $path);
        
    }





    public function edit($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['action'] = "edit";
        $data['categories'] = $this->project_category_model->getCategories();
        $data['property'] = $this->property_model->get_property_byId($id);
        $EndDate = $data['property']->EndDate;
       
        $image = $data['property']->image;
        if($this->input->post()){          
            
            $uid = $this->input->post('user');
            
            $config['upload_path'] = './uploads/property/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
            $config['max_size'] = 20048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');
            $pic = $this->upload->data();
            if($_FILES['userfile1']['size'] == 0){
                $image = $image;
            }else{
                $image = $pic['file_name'];
            }            
            
            if(!$EndDate or $EndDate == "0000-00-00 00:00:00" ){
                $EndDate = $this->getFormatedDate($this->input->post("EndDate"));
            }
           
            
            $propertyId = $this->property_model->update_property($this->input->post('title'), $this->input->post('Category'), $this->input->post('Amount'), $EndDate, $this->input->post('FullName'), $this->input->post('description'), 5, $uid, $image, $id );
            if($this->ion_auth->is_admin()){
               
                redirect('/admin/all-property', 'refresh');
            }else{
               
                redirect('/property', 'refresh');
            }
        }
        $path = './js/ckfinder';
        $width = '850px';
        
        // print_r($data['property']);
        $this->editor($path, $width);
        $this->load->view("property/edit" , $data);
    }




    public function publish($id) {
          
            $propertyId = $this->property_model->publish_property($id);
            redirect('/admin/all-property', 'refresh');
       
      
    }





    public function reported_property () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['reports'] = $this->report_property_model->get_all_reported();
            $this->load->view("property/report_list" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }


    public function createreport ($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['action'] = "create";
        if($this->input->post()){          
           
            $reportId = $this->report_property_model->create_property_report($id, $this->input->post('comment') );
            redirect('/property/index', 'refresh');
        }
        $path = './js/ckfinder';
        $width = '850px';
        $data['categories'] = $this->project_category_model->getCategories($num=10);
        $this->editor($path, $width);
        $this->load->view("property/report_property" , $data);
    }







     

}
