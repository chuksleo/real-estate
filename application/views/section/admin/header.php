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


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <script type="text/javascript">
        
  
$(document).ready(function(){  
$('#upload_form').on('submit', function(e){  
e.preventDefault();  
if($('#image_file').val() == '')  
{  
alert("Please Select the File");  
}  
else 
{  
var form_data = new FormData();
var ins = document.getElementById('image_file').files.length;
for (var x = 0; x < ins; x++) {
form_data.append("files[]", document.getElementById('image_file').files[x]);
}
$.ajax({  
url:"<?php echo base_url(); ?>ajax/multipleImageStore",   
method:"POST",  
data:form_data,  
contentType: false,  
cache: false,  
processData:false,  
dataType: "json",
success:function(res)  
{  
console.log(res.success);
if(res.success == true){
$('#image_file').val('');
$('#uploadPreview').html('');   
$('#msg').html(res.msg);   
$('#divMsg').show();   
}
else if(res.success == false){
$('#msg').html(res.msg); 
$('#divMsg').show(); 
}
setTimeout(function(){
$('#msg').html('');
$('#divMsg').hide(); 
}, 3000);
}  
});  
}  
});  
}); 
// var url = window.URL || window.webkitURL; // alternate use
function readImage(file) {
var reader = new FileReader();
var image  = new Image();
reader.readAsDataURL(file);  
reader.onload = function(_file) {
image.src = _file.target.result; // url.createObjectURL(file);
image.onload = function() {
var w = this.width,
h = this.height,
t = file.type, // ext only: // file.type.split('/')[1],
n = file.name,
s = ~~(file.size/1024) +'KB';
$('#uploadPreview').append('<img src="' + this.src + '" class="thumb">');
};
image.onerror= function() {
alert('Invalid file type: '+ file.type);
};      
};
}
$("#image_file").change(function (e) {
if(this.disabled) {
return alert('File upload not supported!');
}
var F = this.files;
if (F && F[0]) {
for (var i = 0; i < F.length; i++) {
readImage(F[i]);
}
}
});


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
                    <a href="<?php echo base_url() ?>campaign"><i class="fas fa-file-alt"></i> Campigns</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>donation"><i class="fas fa-table"></i> Donation</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>withdrawal"><i class="fas fa-chart-bar"></i> Withdrawals</a>
                </li>
               <!--  <li>
                    <a href="<?php echo base_url() ?>#"><i class="fas fa-cog"></i>Account Settings</a>
                </li>
 -->
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
                            <a href="<?php echo base_url() ?>admin/properties/categories"><i class="fas fa-file"></i> Property Categories</a>
                        </li>


                         <li>
                            <a href="<?php echo base_url() ?>admin/properties/types"><i class="fas fa-file"></i>Property Types</a>
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