<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author Green Lenovo
 */
class Project extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('project_model');
        $this->load->model('campaign_model');
//        if (!$this->ion_auth->logged_in()) {
//            $data['is_loggedin'] = $this->ion_auth->logged_in();
//            $this->load->view("auth/login", $data);
//        }
    }

    /**
     * Index Controller
     */
    public function index($category = "") {

        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['category'] = $category;
        // Checking if user is logged in
        //if ($this->ion_auth->logged_in()) {
        $this->load->view("project/index", $data);
        //}
    }

    public function details_public($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['projectId'] = $id;
        $data['project'] = $this->project_model->get_project($id);
        $data['campaigns'] = $this->campaign_model->get_project_campaigns($id);
       
        // Checking if user is logged in
        //if ($this->ion_auth->logged_in()) {
        $this->load->view("project/details", $data);
        // }
    }

    public function details($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['projectId'] = $id;
        $data['project'] = $this->project_model->get_user_project($this->ion_auth->user()->row()->id);
        // Checking if user is logged in
        //if ($this->ion_auth->logged_in()) {
        $this->load->view("project/details", $data);
        // }
    }

    /**
     * Create project controller
     */
    public function create() {
        $data['is_loggedin'] = $this->ion_auth->logged_in();

        $path = './js/ckfinder';
        $width = '850px';
        $this->editor($path, $width);
        //Setting validation rules
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Project Name',
                'rules' => 'required|is_unique[projects.title]|max_length[30]|min_length[5]',
                array(
                    'required' => 'You hav not entered %s',
                    'is_unique' => 'This %s already exists'
                )
            ),
            array(
                'field' => 'description',
                'label' => 'Project Description',
                'rules' => 'required|min_length[1]|max_length[10000]'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|min_length[5]|max_length[100]'
            ),
            array(
                'field' => 'telephone',
                'label' => 'Contact Number',
                'rules' => 'required|min_length[5]|max_length[50]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|min_length[15]|max_length[50]'
            ),
            array(
                'field' => 'category',
                'label' => 'Project Category',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        $data['create_form'] = $config;
        $data['user'] = $this->ion_auth->user()->row();
        if ($this->input->post() != NULL && $this->form_validation->run()) {

//            print_r($this->input->post());
//            die();
            // print_r($_FILES);
            //Image upload
            $config['upload_path'] = './uploads/Projects/Profile/';
            $config['allowed_types'] = 'gif|jpg|png|mp4';
            $config['max_size'] = 20048; // Need to define properly           
            $this->load->library('upload', $config);
            // if
            $this->upload->do_upload('Profile_Picture');
            $pic = $this->upload->data();
            //if
            $this->upload->do_upload('Profile_Video');
            $vid = $this->upload->data();
            print_r($this->upload->display_errors());
            echo $this->project_model->create_project($this->input->post('title'), $this->input->post('description'), $this->input->post('userId'), $this->input->post('address'), $this->input->post('email'), $this->input->post('telephone'), $pic['file_name'], $vid['file_name'], $this->input->post('category'));
            // Adding user to Projects group.
            $this->ion_auth->add_to_group(3, $this->input->post('userId'));
            //$this->load->view("");
        } else {
            $this->load->view("project/create", $data);
        }
    }

    /**
     * Edit project controller
     * @param int $id ProjectId
     */
    public function edit($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();


        $data['project'] = $this->project_model->get_project($id);
        $data['projectId'] = $id;
        $path = './js/ckfinder';
        $width = '850px';
        $this->editor($path, $width);
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Project Name',
                'rules' => 'required|max_length[30]|min_length[5]',
                array(
                    'required' => 'You hav not entered %s',
                    'is_unique' => 'This %s already exists'
                )
            ),
            array(
                'field' => 'description',
                'label' => 'Project Description',
                'rules' => 'required|min_length[5]'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|min_length[5]|max_length[100]'
            ),
            array(
                'field' => 'telephone',
                'label' => 'Contact Number',
                'rules' => 'required|min_length[8]|max_length[50]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|min_length[8]|max_length[50]'
            ),
            array(
                'field' => 'category',
                'label' => 'Project Category',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        $data['user'] = $this->ion_auth->user()->row();
        //print_r($this->input->post());die();
        if ($this->input->post() != NULL && $this->form_validation->run()) {

            
            // print_r($_FILES);
            //Image upload
//            $config['upload_path'] = './uploads/Projects/Profile/';
//            $config['allowed_types'] = 'gif|jpg|png|mp4';
//            $config['max_size'] = 20048; // Need to define properly           
//            $this->load->library('upload', $config);
//            $this->upload->do_upload('Profile_Picture');
//            $pic = $this->upload->data();
//            $this->upload->do_upload('Profile_Video');
//            $vid = $this->upload->data();
//            print_r($this->upload->display_errors());
              $this->project_model->update_project($id, $this->input->post());
              redirect("project/details/" . $id);
            
        } else {
            
            $this->load->view("project/edit", $data);
        }
    }

    /**
     * Deletes/Deactive project controller
     * @param int $int
     */
    public function delete($id) {
        $data['is_loggedin'] = $this->ion_auth->logged_in();
        $data['projectId'] = $id;
        $this->load->view("project/delete", $data);
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
