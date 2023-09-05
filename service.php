<?php
include ("includes/config.php");
$page='service';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - Services</title>
    <!--
    Mobile Specific Metas
    ==================================================
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--
    CSS
    ==================================================
    -->

    <link href="images/icon/favicon.ico" rel="icon">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animation-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Morris CSS -->
    <link rel="stylesheet" href="css/morris.css">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon font-->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Owl Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Colorbox-->
    <link rel="stylesheet" href="css/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.-->
    <!--if lt IE 9
    script(src='js/html5shiv.js')
    script(src='js/respond.min.js')
    -->
</head>

<body>

    <div class="body-inner">

        <div class="site-top-2">
            <?php include('includes/navbar.php') ?>
            <!-- Header end-->
        </div>


        <div class="banner-area" id="banner-area" style="background-image:url(images/banner/banner5.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">Our Services</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="service.php">Services</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Row end-->
            </div>
            <!-- Container end-->
        </div>
        <!-- Banner area end-->

        <section class="main-container no-padding" id="main-container">
            <div class="ts-services " id="ts-services">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h2 class="section-title"><span>Providing reliable high quality
                                    solutions for global engineering problems</span>Our Services</h2>
                        </div>
                    </div>
                    <!-- Title row end-->
                    <div class="row">
                        <?php
	                        $sql=mysqli_query($con,"SELECT * FROM services limit 3");
	                        while($row=mysqli_fetch_array($sql)){
	                    ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="ts-service-box">
                                <div class="ts-service-image-wrapper">
                                    <img class="img-fluid"
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                        style="height: 300px; width: 100%;" alt="">
                                </div>
                                <div class="ts-service-content text-center">
                                    <h3 class="service-title"><?php echo $row["name"]; ?></h3>
                                    <p><a class="link-more" href="service-single.php?id=<?php echo $row["id"]?>">Read
                                            More<i class="icon icon-right-arrow2"></i></a></p>
                                </div>
                            </div>
                            <!-- Service1 end-->
                        </div>
                        <?php } ?>
                        <!-- Col 1 end-->
                    </div>
                    <!-- Content 1 row end-->
                    <div class="gap-60"></div>
                </div>
                <!-- Container end-->
            </div>
        </section>

        <!-- Footer start-->

        <?php include ("includes/footer.php")?>

        <!-- Footer end-->

        <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i>
                <!-- icon end-->
            </button>
            <!-- button end-->
        </div>
        <!-- End Back to Top-->

        <!--
      Javascript Files
      ==================================================
      -->
        <!-- initialize jQuery Library-->
        <script type="text/javascript" src="js/jquery.js"></script>


        <!-- Bootstrap jQuery-->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- Owl Carousel-->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <!-- Counter-->
        <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints-->
        <script type="text/javascript" src="js/waypoints.min.js"></script>
        <!-- Color box-->
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>


        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
    <!--Body Inner end-->
</body>

</html>