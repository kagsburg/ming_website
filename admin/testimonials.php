<?php
include("edit_testimonial_code.php");

$servername = "localhost";
$username = "d0008";
$password = "ufanisi@d0008";
$dbname = "d0008";
     
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

      if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM testimonials WHERE id=$id");
        $_SESSION['message'] = "Testimonial deleted!"; 
        header('location: testimonials.php');
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
    <title>Testimonials</title>

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
                        <div class="row" style="padding-bottom = 10px;">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Client Testimonials</h2>
                                </div>
                            </div>
                        </div>
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
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($conn,"SELECT * FROM testimonials");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                    <tr>
                                        <td class="text-center"> <?php 
                                            if(empty(($row["image"]))){ ?>
                                            <img src="images/profile.jpg"
                                                style="border-radius: 50%; height: 60px; width: 60px;" /> <?php
                                            }else {
                                            ?> <img
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                                alt="" style="border-radius: 50%; height: 60px; width: 60px;">
                                            <?php }
                                            ?>
                                        </td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_testimonial.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_testimonial.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="testimonials.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this Testimonial?')">
                                                    <i class="zmdi zmdi-delete" style="color : red"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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