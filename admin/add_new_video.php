<?php
include("config.php");
 
if(isset($_POST['but_upload'])){
   $maxsize = 5242880; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];
       $caption = $_POST["caption"];
       $description = $_POST["description"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,caption,description,location) VALUES('".$name."','".$caption."','".$description."','".$target_file."')";

               mysqli_query($con,$query);
               $_SESSION['message'] = "New Video Uploaded successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension."; 
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   header('location: add_new_video.php');
   exit;
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Add Video</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">


    <link href="images/icon/favicon.ico" rel="icon">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"
        integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    tinymce.init({
        selector: 'textarea'
    });
    </script>

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <?php include ("includes/sidebar.html")?>

        <!-- END MENU SIDEBAR-->
        <?php include ("includes/header.html")?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <?php
                                if(isset($_SESSION['message'])){
                                ?>
                                <div class="col-sm-12">
                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        <?php echo $_SESSION['message']; unset($_SESSION['message']);?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="card">
                                    <div class="card-header">Add Video to Gallery</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Video Details</h3>
                                        </div>
                                        <hr>
                                        <form method="post" action="add_new_video.php" enctype='multipart/form-data'>
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="caption"
                                                        class=" form-control-label">Caption:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="caption"
                                                        name="caption" placeholder="Caption for the Video"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="description"
                                                        class=" form-control-label">Description:</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <textarea id="description"
                                                        name="description" rows="4" cols="100"
                                                        style="margin-left: 20px; border-color: lightgray; border-radius: 4px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="file"
                                                        class=" form-control-label">Select Video</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="file">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class=" btn btn-success w-100" type="submit"
                                                    name="but_upload">Upload New
                                                    Video</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->