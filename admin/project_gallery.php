<?php
include("db/config.php");
if(!isset($_SESSION['user'])){
   header('Location:login');
      }
$page = "gallery";
      if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM gallery WHERE id=$id");
        $_SESSION['message'] = "Photo Deleted from Gallery!"; 
        header('location: project_gallery');
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
    <title>Project Gallery</title>
    <link href="images/icon/favicon.ico" rel="icon">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">



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
                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Photo Gallery for this Project</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
                            <?php
	                        $sql=mysqli_query($conn,"SELECT gallery.*, projects.title from gallery left join projects on gallery.project_id=projects.id WHERE projects.id={$_GET['id']}");
                            while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="col-md-4">
                                <div class="card" style="height: 350px; margin-bottom: 20px; box-shadow: 10px;">
                                    <?php 
                                    if(empty(($row["image"]))){ ?>
                                    <img class="card-img-top" src="images/placeholder.png" style="height: 220px;" /> <?php
                                    }else {
                                    ?> <img class="card-img-top"
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                        alt="" style="height: 220px;">
                                    <?php }
                                    ?>
                                    <div class="card-body">
                                        <h4 class="card-title mb-3"><?php echo $row["title"]; ?></h4>
                                        <p><?php echo $row["caption"]; ?></p>
                                        <div class="row">
                                            <div class="col-md-3 ml-auto">
                                                <div class="card-body text-secondary"><a
                                                        href="news.php?del=<?php echo $row['id'];?>" class="item"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                        <i class="zmdi zmdi-delete" style="color : red"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
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