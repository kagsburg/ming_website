<?php

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

    $sql=mysqli_query($conn,"SELECT * FROM testimonials WHERE id={$_GET['id']}");
    $data=mysqli_fetch_array($sql);
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
    <title>Edit Testimonial</title>

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
                                <div class="card">
                                    <div class="card-header">Edit Testimonial</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Client Testimonial</h3>
                                        </div>
                                        <hr>
                                        <form id="edit_testimonial" action="edit_testimonial_code.php" method="post"
                                            enctype="multipart/form-data">

                                            <input type="hidden" name="id" id="id"
                                                value=<?php echo isset($data['id'])==true?$data['id']:""; ?> />

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="name"
                                                        class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name"
                                                        <?php echo "value='".$data['name']."'"; ?> class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="title"
                                                        class=" form-control-label">Profession</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title"
                                                        <?php echo "value='".$data['title']."'"; ?>
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="testimony">Testimony</label>

                                                <textarea id="testimony" name="testimony" rows="4" cols="100"
                                                    style="margin-left: 20px; border-color: lightgray;"><?php echo $data['testimony']; ?></textarea>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="image"
                                                        class=" form-control-label">
                                                        Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9"> <input type="file" name="image">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button class=" btn btn-success w-100" type="submit" name="submit">Add
                                                    New
                                                    Testimonial</button>
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