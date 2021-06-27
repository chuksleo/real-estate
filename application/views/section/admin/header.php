<?php 
      $settings = $this->settings_model->get_all_settings();

?>
<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.0
* Author: Alexis Luna
* Copyright 2020 Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">
<?php  $firstname =  $this->session->userdata('firstname'); 



?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Realestate9ja</title>
    <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/master.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
     <link href="<?php echo base_url() ?>assets/admin/vendor/datatables/datatables.min.css" rel="stylesheet">
     <link href="<?php echo base_url() ?>assets/admin/vendor/airdatepicker/dist/css/datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/vendor/mdtimepicker/mdtimepicker.min.css" rel="stylesheet">
       <style>
        /* inline style for mdtimepicker demo */
        .mdtp__wrapper.inline {display: block !important;position: relative;box-shadow: none;border: 1px solid #E0E0E0;max-width: 300px;margin: 0 !important;padding: 0 !important;transform: inherit;left: 0;top: 0;}
        .mdtp__wrapper.inline .mdtp__time_holder {width: auto;}
    </style>



<script type="text/javascript">


$(document).ready(function(){
console.log("hhh");
    $("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        console.log(fd);
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           // $.ajax({
           //    url: 'upload.php',
           //    type: 'post',
           //    data: fd,
           //    contentType: false,
           //    processData: false,
           //    success: function(response){
           //       if(response != 0){
           //          $("#img").attr("src",response); 
           //          $(".preview img").show(); // Display image element
           //       }else{
           //          alert('file not uploaded');
           //       }
           //    },
           // });
        }else{
           alert("Please select a file.");
        }
    });
});
       


     

// 
var page;
function getCategoryTypes(page){
    console.log(page);

    var page_val = page;
    var catId = $('select#select-category').val();
       
    
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>category/get_types',
        data: {'catid':catId,'page_val':page_val},
        success: function(resp) {
          //Activate and fill in the model list
          // $('#select-subcategory').html(resp); //With the ".html()" method we include the html code returned by AJAX into the matches list
          document.getElementById('types').innerHTML = resp
        }
      });


}

var typeid;
function deleteType(typeid){


      var catId = $('select#select-category').val();
        console.log(typeid);
        console.log(catId);
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>category/delete_type',
         data: {'typeid_val':typeid,'catid_val':catId},
        success: function(resp) {
         
          document.getElementById('response').innerHTML = resp
        }
      });
}



function subCatList()
    {

      var make_id = $('select#select-category').val();
       console.log("GEtting subcat");
        console.log(make_id);
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>category/get_subcat',
        data: 'catid='+make_id,
        success: function(resp) {
          //Activate and fill in the model list
          $('select#select-subcategory').html(resp); //With the ".html()" method we include the html code returned by AJAX into the matches list
        }
      });
    }



function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {

      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}




function imgUpload() {
    console.log("all data");
    var fd = new FormData();
        var files = $('#userfile')[0];
        console.log(fd);
    console.log(files);
    // $.ajax({
    //     type: 'POST',
    //     url: '<?php echo base_url(); ?>image/uploadFile',
    //     data:formData,
    //     success: function(resp) {
    //       console.log(resp);
    //       document.getElementById('response').innerHTML = resp
    //     }
    //   });
    
   


}










    </script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img style="width: 30%" src="<?php echo base_url()?>assets/uploads/files/<?php echo($settings['logo']); ?>" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
            <?php if(!$this->ion_auth->is_admin()){?>
                <li>
                    <a href="<?php echo base_url() ?>dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>


                 
                <li>
                    <a href="#pagesmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-home"></i> My Properties</a>
                    <ul class="collapse list-unstyled" id="pagesmenu3">
                        <li>
                            <a href="<?php echo base_url() ?>admin/properties"><i class="fas fa-file"></i> List My Properties</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Add Property</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Inspection Request</a>
                        </li>


                    </ul>
                </li>

               <li>
                    <a href="#pagesmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-cog"></i>Account Settings</a>

                    <ul class="collapse list-unstyled" id="pagesmenu4">
                        <li>
                            <a href="<?php echo base_url() ?>admin/properties"><i class="fas fa-file"></i> Contact Details</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Company Details</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Change Password</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i>About Realestate9ja</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i>FAQs</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/dashboard"><i class="fas fa-home"></i> FAQs</a> 
                </li>


                <?php }else{?>
               <li>
                    <a href="<?php echo base_url() ?>admin/dashboard"><i class="fas fa-home"></i> Dashboard</a> 
                </li>


                <li>
                    <a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-map-marker-alt"></i> Location</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                        <li>
                            <a href="<?php echo base_url() ?>admin/locations"><i class="fas fa-file"></i> List All Location</a>
                        </li>
                        
                    </ul>
                </li>




                <li>
                    <a href="#pagesmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-home"></i> Manage Property</a>
                    <ul class="collapse list-unstyled" id="pagesmenu3">
                        <li>
                            <a href="<?php echo base_url() ?>admin/properties"><i class="fas fa-file"></i> List All Properties</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/add"><i class="fas fa-file"></i> Add Property</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/facilities"><i class="fas fa-file"></i> Property Facilities</a>
                        </li>

                         <li>
                            <a href="<?php echo base_url() ?>admin/properties/categories"><i class="fas fa-file"></i> Property Categories</a>
                        </li>


                         <li>
                            <a href="<?php echo base_url() ?>admin/properties/types"><i class="fas fa-file"></i>Property Types</a>
                        </li>


                        <li>
                            <a href="<?php echo base_url() ?>admin/properties/category-type-map"><i class="fas fa-file"></i>Category Mapping</a>
                        </li>


                        
                        
                    </ul>
                </li>

               

                <li>
                    <a href="<?php echo base_url() ?>admin/members"><i class="fas fa-chart-bar"></i> Members</a>
                </li>

                  <li>
                    <a href="#pagesmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Settings</a>
                    <ul class="collapse list-unstyled" id="pagesmenu2">
                        <li>
                            <a href="<?php echo base_url() ?>admin/settings"><i class="fas fa-cog"></i>Site Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>admin/static_languages"><i class="fas fa-info-circle"></i> Static Languages</a>
                        </li>
                        <!-- <li>
                            <a href="500.html"><i class="fas fa-info-circle"></i> 500 Error page</a>
                        </li> -->
                    </ul>
                </li>
                

                <?php } ?>
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li  ><a href="<?php echo base_url()?>" class="btn btn-outline-secondary mb-2 set-btn"><i class="fas fa-home"></i> Back To Site</a></li>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span><?php echo $firstname ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                       
                                        <li><a href="<?php echo base_url() ?>#" class="dropdown-item"><i class="fas fa-envelope"></i> Notification</a></li>
                                        <li><a href="<?php echo base_url() ?>#" class="dropdown-item"><i class="fas fa-cog"></i> Account Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="<?php echo base_url() ?>auth/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>