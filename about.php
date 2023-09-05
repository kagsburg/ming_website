
<?php
include('includes/config.php');
$page="about";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - About</title>
    <!--
   Mobile Specific Metas
   ==================================================
   -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <!-- CSS
   ================================================== -->

    <link href="images/icon/favicon.ico" rel="icon">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon font -->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Owl Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="css/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
   <script src="js/html5shiv.js"></script>
   <script src="js/respond.min.js"></script>
   <![endif]-->

</head>

<body>
    <div class="body-inner">

        <div class="site-top-2">
            <?php include("includes/navbar.php") ?>
            <!-- Header end-->
        </div>


        <div class="banner-area" id="banner-area" style="background-image:url(images/banner/banner1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">About Us</h1>
                            <ol class="breadcrumb">
                                <li>Home</li>
                                <li><a href="#">About Us</a></li>
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

            <div class="about-pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 about-desc">
                            <h2 class="column-title"><span>We provide</span>Quickest Response Time in the Industry </h2>
                            <p class="bold-text" style="text-align: justify;">Our Mission is to provide our customers
                                with valued reliable
                                high quality
                                solutions for
                                global engineering problems, always ensuring that <a>INTEGRITY</a>, <a>SAFETY</a>
                                and
                                <a>SUSTAINABILITY</a>
                                are of the heart of everything we do.</a>
                            </p>
                            <a href="services.php" class="top-right-btn btn btn-primary">Services</a>
                            <a href="projects" class="top-right-btn btn btn-secondary">Our Projects</a>
                        </div>
                        <!-- Col end-->
                        <div class="col-lg-6 text-md-center mrt-40">
                            <img class="img-fluid" src="images/pages/W004.jpeg" alt="">
                        </div>
                        <!-- Col end-->
                    </div>
                    <!-- Main row end-->
                </div>
                <!-- Container 1 end-->
            </div>
            <!-- About pattern End-->
        </section>

        <section id="ts-features-light" class="ts-features-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>Don't Miss a Thing</span>Our Objectives</h2>
                    </div>
                </div>
                <!-- Title row end -->
                <div class="row row-cols-5">
                    <div class="col text-center">
                        <div class="ts-feature-box">
                            <div class="ts-feature-info">
                                <img src="images/icon/why-1.png" alt="">
                                <h6 class="ts-feature-title">To conduct business with integrity and fairness</h6>
                            </div>
                        </div>
                        <!-- feature box-1 end-->
                    </div>
                    <!-- col-1 end-->
                    <div class="col text-center">
                        <div class="ts-feature-box">
                            <div class="ts-feature-info">
                                <img src="images/icon/why-3.png" alt="">
                                <h6 class="ts-feature-title">To focus on our customers needs</h6>
                            </div>
                        </div>
                        <!-- feature box-2 end-->
                    </div>
                    <!-- col-2 end-->
                    <div class="col text-center">
                        <div class="ts-feature-box">
                            <div class="ts-feature-info">
                                <img src="images/icon/why-2.png " alt="">
                                <h6 class="ts-feature-title">To maintain safe,friendly, cost effective & healthy working
                                    environment</h6>
                            </div>
                        </div>
                        <!-- feature box-2 end-->
                    </div>
                    <!-- col-3 end-->
                    <div class="col  text-center">
                        <div class="ts-feature-box">
                            <div class="ts-feature-info">
                                <img src="images/icon/why-3.png " alt="">
                                <h6 class="ts-feature-title">To provide quality products and services</h6>
                            </div>
                        </div>
                        <!-- feature box-2 end-->
                    </div>
                    <!-- col-3 end-->
                    <div class="col  text-center">
                        <div class="ts-feature-box">
                            <div class="ts-feature-info">
                                <img src="images/icon/why-1.png " alt="">
                                <h6 class="ts-feature-title">To continuously train our employee and improve our
                                    services
                                </h6>
                            </div>
                        </div>
                        <!-- feature box-2 end-->
                    </div>
                    <!-- col-3 end-->
                </div>
            </div>
        </section>
        <!-- feature light end -->

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
        <!-- Easy Pie Chart -->
        <script src="js/easy-pie-chart.js"></script>
        <!-- Color box-->
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>


        <!-- Google Map API Key-->
        <script type="text/javascript"
            src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>
        <!-- Google Map Plugin-->
        <script type="text/javascript" src="js/gmap3.js"></script>
        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
    <!--Body Inner end-->
</body>

</html>