

// Wait for window load
$(window).load(function () {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");

});
$(document).ready(function () {
    $(document).foundation();
});

function previewVideoFile() {
    if (document.getElementById('pro_vid') != null) {
        //var preview = document.getElementById('Pro_prev_vid'); //selects the query named img
        var file = document.getElementById('pro_vid').files[0]; //sames as here
        var reader = new FileReader();

//        reader.onloadend = function () {
//            preview.src = reader.result;
//        };

        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
            $('#video_name').html('<i class="fa fa-video-camera" aria-hidden="true"></i> ' + file.name);
        } else {
            $('#video_name').text("No Video Uploaded");
            
        }
  
    }
}









function previewFile() {
    if (document.querySelector('input[type=file]') != null) {
        var preview = document.getElementById('Pro_prev'); //selects the query named img
        var file = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            $('#Pro_prev').removeClass('hide');
        };

        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
        } else {
            preview.src = "";
        }
    }
}

previewVideoFile();
previewFile();

