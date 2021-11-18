<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Main extends CI_Controller {
      //functions
      function image_upload()
      {
           $data['title'] = "Upload Image";
           $this->load->view('image_upload', $data);
      }
      function ajax_upload()
      {
        $uid = $this->ion_auth->get_user_id();


           if(isset($_FILES["image_file"]["name"]))
           {
                $config['upload_path'] = './assets/uploads/property/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 20048; // Need to define properly
                $config['file_name'] = time().$uid;

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('image_file'))
                {
                     echo $this->upload->display_errors();
                }
                else
                {
                     $data = $this->upload->data();
                     $myObj = new \stdClass();
                     $myObj->filename = $data["file_name"];
                     $myObj->image = '<img src="'.base_url().'assets/uploads/property/'.$data["file_name"].'" class="img-thumbnail col-sm-2" />';

                    $myJSON = json_encode($myObj);
                    echo $myJSON;
                }
           }

           // print($_FILES["image_file"]["name"]);
      }




      function project_ajax_upload()
      {
        $uid = $this->ion_auth->get_user_id();


           if(isset($_FILES["image_file"]["name"]))
           {
                $config['upload_path'] = './assets/uploads/projects/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 20048; // Need to define properly
                $config['file_name'] = time().$uid;

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('image_file'))
                {
                     echo $this->upload->display_errors();
                }
                else
                {
                     $data = $this->upload->data();
                     $myObj = new \stdClass();
                     $myObj->filename = $data["file_name"];
                     $myObj->image = '<img src="'.base_url().'assets/uploads/projects/'.$data["file_name"].'" class="img-thumbnail col-sm-2" />';

                    $myJSON = json_encode($myObj);
                    echo $myJSON;
                }
           }

           // print($_FILES["image_file"]["name"]);
      }

      // function resize_image($data){

      //    $configer =  array(
      //           'image_library'   => 'gd2',
      //           'source_image'    =>  $data['full_path'],
      //           'maintain_ratio'  =>  TRUE,
      //           'height'           =>  500,

      //   );
      //   $this->image_lib->clear();
      //   $this->image_lib->initialize($configer);
      //   $this->image_lib->resize();


      // }
 }
