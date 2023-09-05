<?php
 include("db/config.php");


// If file upload form is submitted 

$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $website = $_POST["website"];
    $company = $_POST["company"];

   

    $status = 'error'; 
    if(!empty($_FILES["logo"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["logo"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['logo']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT INTO `partners`(`website`, `company`, `logo`) VALUES ('".$website."','".$company."','".$imgContent."')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "New partner added successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
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
    <title>Add Partner</title>

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
                                    if(strlen($statusMsg)>1){
                                ?>
                                <div class="col-sm-12">
                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        <?php echo $statusMsg;?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="card">
                                    <div class="card-header">Add New Partner</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Partner Details</h3>
                                        </div>
                                        <hr>
                                        <form action="add_partner.php" method="post" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="company"
                                                        class=" form-control-label">Company:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="company"
                                                        name="company" placeholder="Company Name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="website"
                                                        class=" form-control-label">Website:</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="website"
                                                        name="website" placeholder="Company Website"
                                                        class="form-control"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="logo"
                                                        class=" form-control-label">Company
                                                        Logo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="logo">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class=" btn btn-dark w-100" type="submit" name="submit">Add New
                                                    Partner</button>
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