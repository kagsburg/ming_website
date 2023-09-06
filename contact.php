
<?php
include ("includes/config.php");
$page='contact';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - Contact</title>
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
            <?php include ("includes/navbar.php")?>
            <!-- Header end-->
        </div>


        <div class="banner-area" id="banner-area" style="background-image:url(images/contactbanner.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">Contact Us</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="">Contact</a></li>
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

        <section class="main-container contact-area" id="main-container">
            <div class="ts-form form-boxed" id="ts-form">
                <div class="container">
                    <div class="row">
                        <div class="contact-wrapper full-contact">
                            <div class="col-lg-6">
                                <h3 class="column-title">Contact Us</h3>
                                <p class="contact-content">Our vision is to have quickest response time in the industry
                                    by dedicating
                                    to not only achieving, but exceeding client expectations in diversified,
                                    multinational customer and supplier base with total collaboration with marketplace.
                                </p>
                                <div class="contact-info-box contact-box info-box ">
                                    <div class="contact-info">
                                        <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-map-marker2"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Postal Address</h3>
                                                <p>P.O BOX 96265 Dar es salaam</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                        <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-phone3"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Call Us</h3>
                                                <p>+255-767-145-678</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                        <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i
                                                    class="icon icon-envelope"></i></span>
                                            <div class="ts-contact-content">
                                                <h3 class="ts-contact-title">Mail Us</h3>
                                                <p>info@minagricoengineering.com</p>
                                            </div>
                                            <!-- Contact content end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact info end -->
                            <div class="col-lg-6">
                                <h3 class="column-title">Contact Now</h3>
                                <div class="contact-submit-box contact-box form-box">
                                    <form action="contact-form.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-name" id="name" name="name"
                                                        placeholder="Full Name" type="text" required="">
                                                </div>
                                            </div>
                                            <!-- Col end-->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-website" id="website" name="website"
                                                        placeholder="Subject" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control form-email" id="email" name="email"
                                                        placeholder="Email" type="email" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control form-message required-field"
                                                        id="message" name="message" placeholder="Your Message"
                                                        rows="8"></textarea>
                                                </div>
                                            </div>
                                            <!-- Col 12 end-->
                                        </div>

                                        <!-- Form row end-->
                                        <button class="btn btn-primary tw-mt-30" type="submit"><i
                                                class="fa fa-paper-plane-o"></i>
                                            Send Message</button>
                                    </form>
                                    <!-- Form end-->
                                </div>
                            </div>
                            <!-- Contact form end -->
                        </div>
                    </div>
                </div>
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


        <!-- Google Map API Key-->
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
        </script>
        <!-- Google Map Plugin-->
        <script type="text/javascript" src="js/gmap3.js"></script>
        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
    <!--Body Inner end-->
</body>

</html>