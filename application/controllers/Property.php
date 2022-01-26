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
        // $this->load->model('property_images');
         $this->load->model('message_model');

        $this->load->model('inspection_request_model');


    }

    public function index () {



        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['page_header'] = "All Properties";
            $data['properties'] = $this->property_model->user_properties($uid);
            $this->load->view("property/index" , $data);


        }else{

            redirect('/', 'refresh');
        }

    }



    public function allPropertyAdmin () {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $data['properties'] = $this->property_model->get_all_properties_admin();
            $data['page_header'] = "All Properties";
            $this->load->view("property/index" , $data);


        }

    }


    public function allUnPublishedPropertyAdmin () {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $data['properties'] = $this->property_model->get_all_unpublished_properties();
            $data['page_header'] = "Pending Properties";
            $this->load->view("property/index" , $data);


        }else{
            redirect('/');
        }

    }



    public function locationView($title, $locationid, $start=0){

        $data['title'] = "Properties in ".$title;
        $data['is_loggedin'] = $this->ion_auth->logged_in();



        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];

        $data['cat_title'] = $title;
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['properties'] = $this->property_model->getPropertyByLocation($locationid,$num,$start);
        $totalByLocation = $this->property_model->getTotalPropertyForLocation($locationid);
        $config['base_url'] = base_url().'property/location/'.$title.'/'.$locationid;
        $config['total_rows'] = $totalByLocation;

        $config['per_page'] = $num;
        $config['uri_segment'] = 5;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        // $config['cur_tag_open'] = '<li class="active">';
        // $config['cur_tag_close'] = '</a></li>';
        $config['display_pages'] = TRUE;

        $cur_page = $this->pagination->cur_page;
        $total = $totalByLocation;
        $data['s_val'] = $start + 1;
        $check = $start + $num;
        if($check > $total ){
            $data['num'] = $total;
        }else{
        $data['num'] = $start + $num;
        }


        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $data['total'] = $totalByLocation;
        $data['per_page'] = $num;
        $this->load->view("property/list" , $data);



    }

    public function setSearchValues(){
        $s_data = array(

               'category' => $this->input->get('category', TRUE),
               'type' => $this->input->get('type', TRUE),
               'location' => $this->input->get('location', TRUE),
               'condition' => $this->input->get('condition', TRUE),
               'bedroom' => $this->input->get('bedroom', TRUE),
               'bathroom' => $this->input->get('bathroom', TRUE),
               'maxprice' => $this->input->get('maxprice', TRUE),
               'minprice' => $this->input->get('minprice', TRUE));
        return $s_data;

    }

    public function search ($start=0) {


        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];


        if(!$this->input->post("ptitle")){


            $location = "";
            if($this->input->post("plocation")){
                $title = $this->property_model->cleanTitle($this->input->post("plocation"));
                $result = $this->location_model->getLocationByTitleKey($title);
                $location = $result->lid;
            }

            $s_data = array();

            if($this->input->get('category', TRUE) or $this->input->get('type', TRUE) or $this->input->get('location', TRUE) or $this->input->get('condition', TRUE) or $this->input->get('bedroom', TRUE) or $this->input->get('maxprice', TRUE) or $this->input->get('minprice', TRUE)){

                $s_data = $this->setSearchValues();

            }else if($start == 0){
                $s_data = array(

               'category' => $this->input->post("propery-category"),
               'type' => $this->input->post("types"),
               'location' => $location,
               'condition' => $this->input->post("condition"),
               'bedroom' => $this->input->post("beds"),
               'bathroom' => $this->input->post("baths"),
               'maxprice' => $this->input->post("maxprice"),
               'minprice' => $this->input->post("minprice"));

                if(!array_filter($s_data)){

                    $s_data = $this->setSearchValues();

                }

            }

            $data['properties'] = $this->property_model->getPropertySearchResult($num, $start, $s_data);
            $searchchResultCount = $this->property_model->getPropertySearchResultCount($s_data);
            //$config['base_url'] = base_url().'properties/search';
            $config['enable_query_strings'] = TRUE;
            $config['base_url'] = base_url('properties/search');
            $config['suffix'] = '?'.http_build_query($s_data,'',"&amp;");

            $config['total_rows'] = $searchchResultCount;

            $config['per_page'] = $num;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['display_pages'] = TRUE;
            $cur_page = $this->pagination->cur_page;
            $total = $searchchResultCount;
            $data['s_val'] = $start + 1;
            $check = $start + $num;
            if($check > $total ){
                $data['num'] = $total;
            }else{
            $data['num'] = $start + $num;
            }
            $this->pagination->initialize($config);
            $data['title'] = "Properties Search Result";
            $data['pages'] = $this->pagination->create_links();
            $data['total'] = $searchchResultCount;
            $data['per_page'] = $num;

            $this->load->view("property/list", $data);


       }else{

            $s_data = array(

               'title' => $this->input->post("ptitle"),


                );
            $data['properties'] = $this->property_model->getPropertySearchResult($num, $start, $s_data);
            $searchchResultCount = $this->property_model->getPropertySearchResultCount($s_data);
            $type = "titleSearch";
            $config['base_url'] = base_url('properties/search');
            $config['suffix'] = '?'.http_build_query($s_data,'',"&amp;");
            $config['total_rows'] = $searchchResultCount;

            $config['per_page'] = $num;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['display_pages'] = TRUE;
            $cur_page = $this->pagination->cur_page;
            $total = $searchchResultCount;
            $data['s_val'] = $start + 1;
            $check = $start + $num;
            if($check > $total ){
                $data['num'] = $total;
            }else{
            $data['num'] = $start + $num;
            }
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
            $data['total'] = $searchchResultCount;
            $data['title'] = "Properties Search Result";
            $data['per_page'] = $num;

            $this->load->view("property/list" , $data);

       }


            // print_r($data);










    }



    public function listPopularProperties () {

        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];
        $data['is_loggedin'] = $this->ion_auth->logged_in();
         $data['properties'] = $this->property_model->get_popular_properties();


        $data['title'] = "Properties";




        $data['pages'] = "";
        $data['total'] = "";
        $data['per_page'] = "";


        $this->load->view("property/popular" , $data);

    }



     public function listProperties ($start=0) {

        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['properties'] = $this->property_model->get_all_properties($num,$start);
        $data['title'] = "Properties";
        $totalProperties = $this->property_model->getTotalProperties();
        $config['base_url'] = base_url('all-properties') ;

        $config['total_rows'] = $totalProperties;
        $config['per_page'] = $num;
        $config['uri_segment'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['display_pages'] = TRUE;

        $cur_page = $this->pagination->cur_page;
        $total = $totalProperties;
        $data['s_val'] = $start + 1;
        $check = $start + $num;
        if($check > $total ){
            $data['num'] = $total;
        }else{
        $data['num'] = $start + $num;
        }


        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $data['total'] = $total;
        $data['per_page'] = $num;

        $this->load->view("property/list" , $data);

    }





     public function featuredProperties ($start=0) {

        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['properties'] = $this->property_model->getFeaturedProperty($num,$start);
        $data['title'] = "Properties";
        $totalProperties = $this->property_model->getTotalFeaturedProperties();
        $config['base_url'] = base_url('featured-properties') ;

        $config['total_rows'] = $totalProperties;
        $config['per_page'] = $num;
        $config['uri_segment'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['display_pages'] = TRUE;

        $cur_page = $this->pagination->cur_page;
        $total = $totalProperties;
        $data['s_val'] = $start + 1;
        $check = $start + $num;
        if($check > $total ){
            $data['num'] = $total;
        }else{
        $data['num'] = $start + $num;
        }


        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $data['total'] = $total;
        $data['per_page'] = $num;

        $this->load->view("property/list" , $data);

    }







    public function category ($title, $catid, $start=0) {
        $settings = $this->settings_model->get_all_settings();
        $num = $settings['content_per_page'];

        $data['title'] = $title;
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['properties'] = $this->property_model->getPropertyByCategory($catid,$num,$start);
        $totalByCategory = $this->property_model->getTotalPropertiesByCategory($catid);
        $config['base_url'] = base_url().'property-category/'.$title.'/'.$catid;
        $config['total_rows'] = $totalByCategory;

        $config['per_page'] = $num;
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        // $config['cur_tag_open'] = '<li class="active">';
        // $config['cur_tag_close'] = '</a></li>';
        $config['display_pages'] = TRUE;

        $cur_page = $this->pagination->cur_page;
        $total = $totalByCategory;
        $data['s_val'] = $start + 1;
        $check = $start + $num;
        if($check > $total ){
            $data['num'] = $total;
        }else{
        $data['num'] = $start + $num;
        }


        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $data['total'] = $totalByCategory;
        $data['per_page'] = $num;
        $this->load->view("property/list" , $data);
    }





    public function viewproperty ($title, $propertyid) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['property'] = $this->property_model->getPropertyById($propertyid);

        $data['images'] = $this->property_images->getImagesByPropertyId($propertyid);
        $data['facilities'] = $this->property_facility_map_model->getPropertyFacilities($propertyid);

        $categoryid = $data['property']->category_id;
        $type = $data['property']->property_type_id;
        $data['realated_properties'] = $this->property_model->getRelatedProperty($categoryid, $type, $limit=3);
        if(!$data['property']){
            if($this->ion_auth->logged_in()){
                $this->session->set_flashdata('message', "Property ".$title.' is not listed or published');
                 redirect('/user/properties', 'refresh');

            }else{
                $this->session->set_flashdata('message', "Property ".$title.' is not listed or published');
                redirect('/all-properties', 'refresh');
            }

        }else{
            $data['settings_content'] = $this->settings_model->get_all_settings();
            $data['settings'] = $data['settings_content'];
            $data['link'] = 'property/'.$title.'/'.$propertyid;

            $this->load->view("property/view" , $data);
        }

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
             if($this->input->post() && isset($_POST['result'])){
                $title = $this->property_model->cleanTitle($this->input->post("location"));

                $location = $this->location_model->getLocationByTitleKey($title);

                $uid = $this->ion_auth->get_user_id();
                $pImages = $_POST['result'];
                $main_image = $pImages[0];



                $title = $this->input->post("title");
                $image= $main_image;
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
                $propertyid = $this->property_model->create_property($title, $uid, $image,$category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing='Unfurnished', $size_sqm, $bedrooms, $bathrooms, $pets='No Pets', $property_use='Residential', $smoking='No Smoking', $parties='No Parties', $negotiable, $parking_space='20', $agent_fee='No', $agreement_fee='No', $capacity="100", $video_link='thisisi.mp3', $duration='None', $status);


                if($propertyid){
                    $data['facilities'] = $this->Property_facility_model->getAllFacilities();
                    foreach ($data['facilities'] as $facility) {
                    $clean_title = $this->property_model->cleanTitle($facility->name);
                    if($this->input->post($clean_title) != null){

                        $facilityid = $this->input->post($clean_title);
                        if(!$this->property_facility_map_model->checkFacilityMap($propertyid, $facilityid)){
                            try {
                                $this->property_facility_map_model->setFacilityMap($propertyid, $facilityid);
                            } catch (Exception $e) {
                                echo 'Message: ' .$e->getMessage();
                            }


                        }

                    }


                }

                if($pImages){
                    foreach($pImages as $image){
                        try {
                            $this->property_images->setPropertyImage($image, $propertyid);

                        } catch (Exception $e) {
                            echo 'Message: ' .$e->getMessage();

                        }
                    }
                }


                }



                if($this->ion_auth->is_admin()){
                    redirect('/admin/properties/unpublished', 'refresh');
                }else{
                    redirect('/user/properties', 'refresh');
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





    public function edit ($pid) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['action'] = "edit";
        $data['property'] = $this->property_model->getPropertyByIdForEdit($pid);

        if($this->ion_auth->logged_in()){
             if($this->input->post()){


                $title = $this->property_model->cleanTitle($this->input->post("location"));

                $location = $this->location_model->getLocationByTitleKey($title);

                $uid = $this->ion_auth->get_user_id();
                if(isset($_POST['result'])){
                    $pImages = $_POST['result'];
                    $main_image = $pImages[0];

                }else{
                    $main_image = $data['property']->image;
                }




                $title = $this->input->post("title");
                $image= $main_image;
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
                $propertyid = $this->property_model->update_property($pid, $title, $uid, $image, $category, $price, $description, $location_id, $address, $property_type_id, $property_condition, $furnishing='Unfurnished', $size_sqm, $bedrooms, $bathrooms, $pets='No Pets', $property_use='Residential', $smoking='No Smoking', $parties='No Parties', $negotiable, $parking_space='20', $agent_fee='No', $agreement_fee='No', $capacity="100", $video_link='thisisi.mp3', $duration='None', $status);




                    $data['facilities'] = $this->Property_facility_model->getAllFacilities();
                    foreach ($data['facilities'] as $facility) {
                        $clean_title = $this->property_model->cleanTitle($facility->name);
                        if($this->input->post($clean_title)){

                            $facilityid = $this->input->post($clean_title);
                            if(!$this->property_facility_map_model->checkFacilityMap($pid, $facilityid)){
                                try {
                                    $this->property_facility_map_model->setFacilityMap($pid, $facilityid);
                                } catch (Exception $e) {
                                    echo 'Message: ' .$e->getMessage();
                                }


                            }

                        }


                    }

                if(isset($pImages)){
                    foreach($pImages as $image){
                        try {
                            $this->property_images->setPropertyImage($image, $pid);

                        } catch (Exception $e) {
                            echo 'Message: ' .$e->getMessage();

                        }
                    }
                }


                if($this->ion_auth->is_admin()){
                    redirect('/admin/properties/unpublished', 'refresh');
                }else{
                   redirect('/user/properties', 'refresh');
                }


            }else{

                $path = './js/ckfinder';
                $width = '850px';
                $data['categories'] = $this->property_category_model->getAllCategories();
                $this->editor($path, $width);
                $data['locations'] = $this->location_model->mapLocation();
                $data['facilities'] = $this->Property_facility_model->getAllFacilities();

                $data['images'] = $this->property_images->getImagesByPropertyId($pid);
                $data['property_facilities'] = $this->property_facility_map_model->getPropertyFacilities($pid);



                    $this->load->view("property/edit" , $data);
            }



        }else{
            redirect('/auth/login', 'refresh');
        }

    }


    public function markFeatured(){

            $pid = $this->input->post("pid");
            $status = $this->input->post("status");

            if($this->property_model->markFeaturedProperty($pid, $status)){
                echo '<div class="alert-info">Property has been successfully Marked as Featured! </div>';
            }else{
                echo ' <div class="alert-danger"> Oops! An error occured when setting as featured property</div>';
            }
    }

    public function publish() {

            $pid = $this->input->post("pid");

            if($this->property_model->publish_property($pid)){
                echo '<div class="alert-info">Property has been successfully published! </div>';
            }else{
                echo ' <div class="alert-danger"> Oops! An error occured when publishing property</div>';
            }



    }


    public function marksold() {

            $pid = $this->input->post("pid");

            if($this->property_model->markPropertySold($pid)){
                echo '<div class="alert-info">Property has been successfully marked sold! </div>';
            }else{
                echo ' <div class="alert-danger"> Oops! An error occured when changing statusif property</div>';
            }



    }

    public function unpublish() {

        $pid = $this->input->post("pid");


        if($this->property_model->unpublish_property($pid)){
                echo '<div class="alert-info">Property has been successfully unpublished!</div>';
            }else{
                echo '<div class="alert-danger">Oops! An error occured when unpublishing property</div>';
        }


    }



    public function delete() {

        $pid = $this->input->post("pid");


        if($this->property_model->deleteProperty($pid)){
            $propertyImages = $this->property_images->getImagesByPropertyId($pid);
            if($propertyImages){
                foreach ($propertyImages as $images) {

                    $this->deleteImage($images->filename);
                }
                $this->property_images->deletePropertyImage($pid);

            }
            
            echo '<div class="alert-info">Property has been successfully Deleted!</div>';
        }else{
            echo '<div class="alert-danger">Oops! An error occured when deleting property</div>';
        }


    }


 public function deleteImage($image_name) {
            
       if($this->ion_auth->logged_in() == true){ 
           
               $fpath = realpath($_SERVER["DOCUMENT_ROOT"]).'/assets/uploads/property/'.$image_name;
               
               unlink($fpath);

        }


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



    public function sendMessage () {
       $this->form_validation->set_rules('name_val', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email_val', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone_val', 'Phone', 'trim|required');
        $this->form_validation->set_rules('message_val', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_error_delimiters('<div class="alert-box alert radius" data-alert="">', '<a class="close" href="#"><small>&times;</small></a></div>');
            $name_error = form_error('name_val');
            $email_error = form_error('email_val');
            $phone_error = form_error('phone_val');
            $messsage_error = form_error('message_val');
            echo validation_errors();


        }else
        {
            $fullname = $this->input->post('name_val');
            $email = $this->input->post('email_val');
            $phone = $this->input->post('phone_val');
            $propertyid = $this->input->post('property_val');
            $message = $this->input->post('message_val');

            $message_resp="";
            $message_sent = $this->message_model->createMessage($fullname,$email,$phone,$propertyid,$message);

            if($message_sent){
                $message_resp = '<div class="alert alert-success fade in"> <a class="close" data-dismiss="alert" href="#">x</a> <strong>Your message has been sent
successfully!</strong> Our online representative will reach out to you shortly. </div>';

            }else{
                $message_resp = '<div class="alert alert-danger fade in"> <a class="close" data-dismiss="alert" href="#">x</a> <strong>Error Sending Contact site administrator!! </div>';

            }
         echo($message_resp);

        }

    }


   



    // function add_count($slug)
    // {
    // // load cookie helper
    //     $this->load->helper('cookie');
    // // this line will return the cookie which has slug name
    //   $check_visitor = $this->input->cookie(urldecode($slug), FALSE);
    // // this line will return the visitor ip address
    //     $ip = $this->input->ip_address();
    // // if the visitor visit this article for first time then //
    //  //set new cookie and update article_views column  ..
    // //you might be notice we used slug for cookie name and ip 
    // //address for value to distinguish between articles  views
    //     if ($check_visitor == false) {
    //         $cookie = array(
    //             "name"   => urldecode($slug),
    //             "value"  => "$ip",
    //             "expire" =>  time() + 7200,
    //             "secure" => false
    //         );
    //         $this->input->set_cookie($cookie);
    //         $this->news->update_counter(urldecode($slug));
    //     }
    // }


     // public function paginate($start, $num, $url, $totalRow) {

     //    $config['base_url'] = $url;
     //    $config['total_rows'] = $totalRow

     //    $config['per_page'] = $num;
     //    $config['uri_segment'] = $uri_seg;
     //    $config['full_tag_open'] = '<ul class="pagination">';
     //    $config['full_tag_close'] = '</ul>';

     //    $config['display_pages'] = TRUE;

     //    $cur_page = $this->pagination->cur_page;
     //    $total = $totalRow;

     //    $check = $start + $num;
     //    if($check > $total ){
     //        $data['num'] = $total;
     //    }else{
     //    $data['num'] = $start + $num;
     //    }


     //    return $config;

     // }

}
