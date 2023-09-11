
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Faqs</h2>
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
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($conn,"SELECT * FROM faqs");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                    <tr>
                                        <td><?php echo $row["question"]; ?></td>
                                        <td><?php echo $row["answer"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_faq.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_faq.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="faqs.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this Faq?')">
                                                    <i class="zmdi zmdi-delete" style="color : red"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Our Partners</h2>
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
                                        <th>Logo</th>
                                        <th>Company</th>
                                        <th>Website</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($conn,"SELECT * FROM partners");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                    <tr>
                                        <td class="text-center"><img
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["logo"]); ?>"
                                                alt="" style="height: 60px; width: 120px;"></td>
                                        <td><?php echo $row["company"]; ?></td>
                                        <td><?php echo $row["website"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_partner.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_partner.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="partners.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete?')">
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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">YouTube Videos</h2>
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
                        $sql=mysqli_query($conn,"SELECT * FROM youtube_links order by created_at desc");
                        while($row=mysqli_fetch_array($sql)){
	                ?>
                            <div class="col-md-4">
                                <div style="max-height: 450px; margin-bottom: 20px;">
                                    <iframe height="315" src="<?php echo $row["link"]."?autoplay=1&mute=1"; ?>">
                                    </iframe>
                                    <div class="col-lg-4">
                                        <a href="youtube_videos.php?del=<?php echo $row['id'];?>"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            class=" btn btn-danger" title="Delete Entry"><i
                                                class="menu-icon fa fa-trash"></i>
                                            Delete </a>
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Videos</h2>
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
                        ?> <?php
	                        $fetchVideos = mysqli_query($conn, "SELECT * FROM videos ORDER BY id DESC");
                            while($row = mysqli_fetch_assoc($fetchVideos)){
                              $location = $row['location'];
                              $name = $row['name'];
	                    ?>
                            <div class="col-md-4">
                                <div style="max-height: 450px; margin-bottom: 20px;">
                                    <video src='<?php echo $location;?>' controls width='320px' height='320px'></video>
                                    <div class="col-lg-8">
                                        <h6 class="card-title mb-3"><?php echo $row["caption"]; ?></h6>
                                        <p class="card-text"><?php echo $row["description"]; ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="videos.php?del=<?php echo $row['id'];?>"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            class=" btn btn-danger" title="Delete Entry"><i
                                                class="menu-icon fa fa-trash"></i>
                                            Delete </a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Gallery</h2>
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
	                            $sql=mysqli_query($conn,"SELECT DISTINCT projects.id, projects.title,projects.image  from gallery left join projects on gallery.project_id=projects.id");
	                            while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="col-md-4">
                                <a href="project_gallery.php?id=<?php echo $row["id"]?>"
                                    title="Click to view project Gallery">
                                    <div class="card" style="height: 320px; margin-bottom: 20px; box-shadow: 10px;">
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
                                        </div>
                                    </div>
                                </a>
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">News</h2>
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
	                            $sql=mysqli_query($conn,"SELECT * from news");
	                            while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="col-md-4">
                                <div class="card" style="height: 420px; margin-bottom: 20px; box-shadow: 10px;">
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
                                        <p class="card-text"><?php echo $row["summary"]; ?>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 ml-auto">
                                                <div class="card-body text-secondary">
                                                    <a href="view_news_details.php?id=<?php echo $row["id"]; ?>"
                                                        class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View Details">
                                                        <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                    </a>&nbsp;&nbsp;
                                                    <a href="edit_news_feed.php?id=<?php echo $row["id"]; ?>"
                                                        class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit" style="color : green"></i>
                                                    </a>&nbsp;&nbsp;<a href="news.php?del=<?php echo $row['id'];?>"
                                                        class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete"
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


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Our Team</h2>
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
                                        <th class="text-center">Image</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Role</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($conn,"SELECT * FROM staff");
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
                                        <td><?php echo $row["role"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_staff.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_staff.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="team.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete?')">
                                                    <i class="zmdi zmdi-delete" style="color : red"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Slider Images</h2>
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
	                        $sql=mysqli_query($conn,"SELECT * FROM slider_images order by created_at desc");
	                        while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="col-md-4">
                                <div class="card" style="max-height: 450px; min-height: 400px; margin-bottom: 20px;">
                                    <?php 
                                    if(empty(($row["image"]))){ ?>
                                    <img class="card-img-top" src="images/placeholder.png" style="height: 300px;" /> <?php
                                    }else {
                                    ?> <img class="card-img-top"
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                        alt="" style="height: 300px;">
                                    <?php }
                                    ?>
                                    <div class="card-body">
                                        <div class="col-lg-8">
                                            <h5 class="card-title mb-3"><?php echo $row["title"]; ?></h5>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="media.php?del=<?php echo $row['id'];?>"
                                                onclick="return confirm('Are you sure you want to delete?')"
                                                class=" btn btn-danger" title="Delete Entry"><i
                                                    class="menu-icon fa fa-trash"></i>
                                                Delete </a>
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
  
  
  
  <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Our Services</h2>
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
                                        <th class="text-center">Image</th>
                                        <th>Service</th>
                                        <th class="text-right">price</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($conn,"SELECT * FROM services");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                    <tr>
                                        <td class="text-center"><img
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                                alt="" style="border-radius: 50%; height: 60px; width: 60px;"></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td class="text-right"><?php echo $row["price"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_service.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_service.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="services.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete?')">
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

<!-- MAIN CONTENT-->
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Our Portfolio</h2>
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
                        <div class="table-responsive table--no-card m-b-10">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Client</th>
                                        <th>Service</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	                                        $sql=mysqli_query($db,"SELECT * FROM projects order by date_added desc");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                    <tr>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><?php echo $row["client"]; ?></td>
                                        <td><?php echo $row["service"]; ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="view_project.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="View Details">
                                                    <i class="zmdi zmdi-eye" style="color : blue"></i>
                                                </a>
                                                <a href="edit_project.php?id=<?php echo $row["id"]; ?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit" style="color : green"></i>
                                                </a>
                                                <a href="projects.php?del=<?php echo $row['id'];?>" class="item"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete?')">
                                                    <i class="zmdi zmdi-delete" style="color : red"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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


            <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Our Projects</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Client</th>
                                                <th>Service</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	                                        $sql=mysqli_query($db,"SELECT * FROM projects order by date_added desc");
	                                        while($row=mysqli_fetch_array($sql)){
	                                    ?>
                                            <tr>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["client"]; ?></td>
                                                <td><?php echo $row["service"]; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">Our Services</h2>
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <?php
                                                        $sql=mysqli_query($db,"SELECT * FROM services");
                                                        while($row=mysqli_fetch_array($sql)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["name"]; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>