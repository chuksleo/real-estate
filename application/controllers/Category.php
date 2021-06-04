 <?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Campaign
 *
 * @author Green Lenovo
 */
class Category extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
      
        $this->load->model('project_category_model');
    }
    
    public function index () {
        
       

        if($this->ion_auth->logged_in() == true){
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['categories'] = $this->project_category_model->getCategories();
            $this->load->view("category/index" , $data);


        }else{

            redirect('/', 'refresh');
        }
       
    }



    public function public_list() {
        
       

       
            $data['is_loggedin'] = $this->ion_auth->logged_in();
            $uid = $this->ion_auth->get_user_id();
            $data['categories'] = $this->project_category_model->getCategories();
            $this->load->view("category/list" , $data);


       
       
    }




    public function view ($title, $campaignid) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();  
        $data['categories'] = $this->project_category_model->getCategories();     
        $data['campaign'] = $this->campaign_model->get_campaign_byId($campaignid);
        $this->load->view("campaign/view" , $data);
    }








    
    public function create () {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['action'] = "create";
        if($this->input->post()){
            $uid = $this->ion_auth->get_user_id();
            $config['upload_path'] = './assets/uploads/files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 3048; // Need to define properly              
            $config['file_name'] = time().$uid;       
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile1');

            $pic = $this->upload->data();
                    
            
          $this->project_category_model->create_category($this->input->post('title'), $this->input->post('status'), $pic['file_name'] );
            redirect('/admin/all-categories', 'refresh');
        }
       
        $this->load->view("category/create" , $data);
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
        $data['category'] = $this->project_category_model->get_category_byId($id);
        $image = $data['category']->icon;
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
           
            
            if($this->project_category_model->update_category($this->input->post('title'), $this->input->post('status'), $image, $id)){

                redirect('/admin/all-categories', 'refresh');
            }else{
                echo "Error savong";
            }
            //
        }
       
        
        $data['category'] = $this->project_category_model->get_category_byId($id);
        
        $this->load->view("category/edit" , $data);
    }



     public function delete($id) {
     	 if($this->project_category_model->delete_category($id)){
     	 	redirect('/admin/all-categories', 'refresh');


     	 }else{
     	 	echo "Error Deleting Contact site admin";
     	 }



     }
     

}
