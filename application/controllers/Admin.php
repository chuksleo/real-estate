<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Green Lenovo
 */
class Admin extends CI_Controller {

    //put your code here
    public function __construct() {
        
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('reviews_model');
        $this->load->model('banners_model');
        $this->load->model('location_model');
        $this->load->model('inspection_request_model');
        $this->load->model('property_category_model');
        $this->load->model('property_types_model');
        $this->load->model('Property_facility_model');
                $this->load->model('message_model');


        $this->load->model('property_category_map_model');

        if (!$this->ion_auth->logged_in() && !$this->ion_auth->is_admin()) {
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $data['message'] = !$this->ion_auth->is_admin() ? "You must be an administrator to access dashboard":  "You must be logged in";
            !$this->ion_auth->is_admin() ? $this->load->view('home/index', $data) : $this->load->view("auth/login", $data);
        }
    }

    public function index() {


        $data['total_members'] = 20;
        $data['total_properties'] = $this->property_model->getTotalProperties();
        $data['total_reviews'] = $this->reviews_model->getTotalProperties();
        $data['total_inspection_request'] = $this->inspection_request_model->getTotalInspectionRequest();


       
        $this->load->view("section/admin/header");
        $this->load->view("admin/index", $data);
        $this->load->view("section/admin/footer");
    }





    public function static_languages() {


        $data['langs'] = $this->settings_model->getStaticLang();
    
        $this->load->view("admin/static_lang", $data);
    }





    public function edit_lang($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        
       
        if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();           
           
            $this->settings_model->updateStaticLang(
                    $this->input->post('field'), 
                    $this->input->post('value'), 
                    $this->input->post('status'), 
                    $id );

            redirect('/admin/static_languages', 'refresh');
        }
        $path = './js/ckfinder';
        $width = '850px';
       
        $data['lang'] = $this->settings_model->getStaticLangById($id);
        // print_r($data['campaign']);
        $this->editor($path, $width);
        $this->load->view("admin/edit_static_lang" , $data);
    }


    public function settings() {


        $data['settings'] = $this->settings_model->get_all_settings();
    
        $this->load->view("admin/settings", $data);
    }

     public function edit_settings() {
            
        $data['settings'] = $this->settings_model->get_all_settings();
        $image = $data['settings']['logo'];
        if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
            
           
            $this->settings_model->update_settings(
                $this->input->post('site'), 
                $image, 
                $this->input->post('email'), 
                $this->input->post('address'), 
                $this->input->post('phone'), 
                $this->input->post('phone2'), 
                $this->input->post('work'), 
                $this->input->post('twitter'), 
                $this->input->post('facebook'), 
                $this->input->post('linkedin'), 
                $this->input->post('webmail') );
            redirect('/admin/settings', 'refresh');
        }
        
        
        $this->load->view("admin/edit_settings", $data);
    }



    public function contactmessages () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            
            
            $data['messages'] = $this->message_model->getAllContactMessages();

            $data['total_unread'] = $this->message_model->getCountUnreadContactMessages();
            $this->load->view("messages/contact_message" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }


     public function messages () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            
            
            $data['messages'] = $this->message_model->getAllMessages();

            $data['total_unread'] = $this->message_model->getCountUnreadMessages();
            $this->load->view("messages/inbox" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }



     public function messagesView () {
        
       

      
            $mid = $this->input->post('mid');
            $data['message'] = $this->message_model->getMessageById($mid);

            if($data['message']){
                $this->load->view("messages/message_view" , $data);
            }else{

                echo "Error No Item found for message";
            }
            


    }








      public function bannerlist () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['banners'] = $this->banners_model->getAllBanners();
            $this->load->view("banners/list" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }



     public function banneradd() {
            
       if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/banners/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 20048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');
            $image = "";
            $pic = $this->upload->data();
            if($_FILES['userfile1']['size'] == 0){
                $image = $image;
            }else{
                $image = $pic['file_name'];
            }
            

            
            $this->banners_model->setBanner(
                $this->input->post('title'), 
                $this->input->post('slug'), 
                $image,
                $this->input->post('status'));

            redirect('/admin/banners', 'refresh');
        }else{
            $data['action'] = "add"; 
            $this->load->view("banners/add", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }



     public function banneredit($bid) {
            
       if($this->ion_auth->logged_in() == true){
            $data['banner'] = $this->banner_model->getLocationById($lid);

            if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/banners/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 20048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');
            $image = "";
            $pic = $this->upload->data();
            if($_FILES['userfile1']['size'] == 0){
                $image = $data['loc']->banner_image;
            }else{
                $image = $pic['file_name'];
            }



           $this->banners_model->updateBanner(
                $this->input->post('title'), 
                $this->input->post('slug'), 
                $image);
            

            redirect('/admin/front-banners', 'refresh');
        }else{
            $data['action'] = "edit";            
                      
            $this->load->view("banners/edit", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }


   }
        



   public function bannerdelete($bid) {
            
       if($this->ion_auth->logged_in() == true){ 


            if($this->banners_model->deleteBanner($bid)){ 

                redirect('/admin/banners', 'refresh');

            }
            


        }


    }


     public function locationlist () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['locations'] = $this->location_model->getAllLocations();
            $this->load->view("location/list" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }

     public function locationadd() {
            
       if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/location/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 20048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');
            $image = "";
            $pic = $this->upload->data();
            if($_FILES['userfile1']['size'] == 0){
                $image = $image;
            }else{
                $image = $pic['file_name'];
            }
            

            $title_key = $this->property_model->cleanTitle($this->input->post('title'));
           
            $this->location_model->setLocation(
                $this->input->post('title'), 
                $title_key,
                $image, 
                $this->input->post('parentid'), 
                $this->input->post('description'),
                $this->input->post('featured'), 
                $this->input->post('status') );

            redirect('/admin/locations', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $data['locations'] = $this->location_model->getAllLocations();
            $this->load->view("location/add", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }






    public function locationedit($lid) {
            
       if($this->ion_auth->logged_in() == true){
            $data['loc'] = $this->location_model->getLocationById($lid);

            if($this->input->post()){
           
            
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/location/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 20048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');
            $image = "";
            $pic = $this->upload->data();
            if($_FILES['userfile1']['size'] == 0){
                $image = $data['loc']->banner_image;
            }else{
                $image = $pic['file_name'];
            }
            $title_key = $this->property_model->cleanTitle($this->input->post('title'));
           
            $this->location_model->updateLocation(
                $lid,
                $this->input->post('title'), 
                $title_key,
                $image, 
                $this->input->post('parentid'), 
                $this->input->post('description'),
                $this->input->post('featured'), 
                $this->input->post('status'),
                $this->input->post('dateval'));

            redirect('/admin/locations', 'refresh');
        }else{
            $data['action'] = "edit";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $data['locations'] = $this->location_model->getAllLocations();
            
            $this->load->view("location/edit", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }


   }
        



   public function locationdelete($lid) {
            
       if($this->ion_auth->logged_in() == true){ 


            if($this->location_model->deleteLocation($lid)){ 

                redirect('/admin/locations', 'refresh');

            }
            


        }


    }







      public function categorylist () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['categories'] = $this->property_category_model->getAllCategories();
            $this->load->view("category/index" , $data);

        }else{

            redirect('/auth/login', 'refresh');
        }
       
    }





     public function categoryadd() {
            
        if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->property_category_model->setCategory(
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/categories', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $this->load->view("category/create", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }






    public function categoryedit($cid) {
            
       if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->property_category_model->updateCategory(
                    $cid,
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/categories', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $data['category'] = $this->property_category_model->getCategoryById($cid);
            $this->load->view("category/edit", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }


   }
        



   public function categorydelete($cid) {
            
       if($this->ion_auth->logged_in() == true){ 


            if($this->property_category_model->deleteCategory($cid)){ 

                redirect('/admin/properties/categories', 'refresh');

            }
            


        }


    }




 public function facilitylist () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['facilities'] = $this->Property_facility_model->getAllFacilities();
            $this->load->view("facility/index" , $data);

        }else{

            redirect('/auth/login', 'refresh');
        }
       
    }

 public function facilityadd() {
            
        if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->Property_facility_model->setFacility(
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/facilities', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $this->load->view("facility/create", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }






    public function facilityedit($fid) {
            
       if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->property_category_model->updateCategory(
                    $fid,
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/facilities', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $data['facility'] = $this->Property_facility_model->getFacilityById($fid);
            $this->load->view("facility/edit", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }


   }
        



   public function facilitydelete($fid) {
            
       if($this->ion_auth->logged_in() == true){ 


            if($this->Property_facility_model->deleteFacility($fid)){ 

                redirect('/admin/properties/facilities', 'refresh');

            }
            


        }


    }





     public function propertyTypeList () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['ptypes'] = $this->property_types_model->getAllPropertyTypes();
            $this->load->view("property_types/index" , $data);

        }else{

            redirect('/auth/login', 'refresh');
        }
       
    }





     public function propertyTypeAdd() {
            
        if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->property_types_model->setPropertyTypes(
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/types', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $this->load->view("property_types/create", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }






    public function propertyTypeEdit($pid) {
            
       if($this->ion_auth->logged_in() == true){
            if($this->input->post()){
           
            
                $uid = $this->ion_auth->get_user_id();
           
            
           
                $this->property_types_model->updatePropertyTypes(
                    $pid,
                    $this->input->post('title'), 
                    $this->input->post('status'));

            redirect('/admin/properties/types', 'refresh');
        }else{
            $data['action'] = "add";
             $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);
            $data['property'] = $this->property_types_model->getPropertyTypesById($pid);
            $this->load->view("property_types/edit", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }


   }
        



   public function propertyTypeDelete($pid) {
            
       if($this->ion_auth->logged_in() == true){ 


            if($this->property_types_model->deletePropertyTypes($pid)){ 

                redirect('/admin/properties/types', 'refresh');

            }
            


        }


    }



    public function categoryMap() {
            
        if($this->ion_auth->logged_in() == true){
            $data['types'] = $this->property_types_model->getAllPropertyTypes();
            if($this->input->post()){
                $catid = $this->input->post('category');
            
                $uid = $this->ion_auth->get_user_id();
                foreach ($data['types'] as $typs) {
                    $clean_title = $this->property_model->cleanTitle($typs->title);
                    if($this->input->post($clean_title)){
                        
                        $typeid = $this->input->post($clean_title);
                        if(!$this->property_category_map_model->checkCatMap($catid, $typeid)){

                            $this->property_category_map_model->setMap($catid, $typeid);

                        }
                     
                    }
                    
                      
                }
            
           
           
            redirect('/admin/properties/category-type-map', 'refresh');

        }else{
            $data['action'] = "add";
            $path = './js/ckfinder';
            $width = '850px';
            $this->editor($path, $width);

            $data['categories'] = $this->property_category_model->getAllCategories();

            $this->load->view("category/map", $data);

        }

       }else{

            redirect('/auth/login', 'refresh');
        }

    }




     public function locationMap() {


        $this->location_model->mapLocation();
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




}
