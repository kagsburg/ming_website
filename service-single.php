<?php
include ("includes/config.php");
$page='service';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title> Minagrico - Service Details</title>
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
    <!-- Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animation-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon font-->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Owl theme -->
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
            <?php include("includes/navbar.php")?>
            <!-- Header end-->
        </div>

        <div class="banner-area" id="banner-area" style="background-image:url(images/servicesbanner.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">Service</h1>
                            <ol class="breadcrumb">
                                <li><a href="index">Home</a></li>
                                <li><a href="service">Services</a></li>
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
        <section class="main-container" id="main-container">

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="list-column-title">More Services</h4>
                        <div class="sidebar ">
                            <div class="widget no-padding no-border">
                                <ul class="service-menu">
                                    <?php
	                                    $sql=mysqli_query($con,"SELECT * FROM services where status='1' and id !='$id' limit 6");
	                                    while($row=mysqli_fetch_array($sql)){
	                                 ?>
                                    <li><a
                                            href="service-single?id=<?php echo $row["id"]?>"><?php echo $row["name"]?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="widget no-padding testimonial-static">
                                <?php
	                                    $sql=mysqli_query($con,"SELECT * FROM testimonials where status ='1' ORDER BY RAND() limit 1");
	                                    while($row=mysqli_fetch_array($sql)){
	                                 ?>
                                <div class="quote-item quote-classic"><span
                                        class="quote-text faq-quote-text"><?php echo $row["testimony"]?></span>
                                    <div class="quote-item-footer quote-footer-classic">
                                        <?php 
                                            if(empty(($row["image"]))){ ?>
                                        <img class="testimonial-thumb" src="image/profilejpg" /> <?php
                                            }else {
                                            ?> <img class="testimonial-thumb"
                                            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>"
                                            alt="testimonial">
                                        <?php }
                                            ?>
                                        <div class="quote-item-info">
                                            <p class="quote-author"><?php echo $row["name"]?></p><span
                                                class="quote-subtext"><?php echo $row["title"]?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quote item end-->
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <!-- Col end -->
                    <?php 

                        $sql=mysqli_query($con,"SELECT * FROM services where id='$id'");
                        $row=mysqli_fetch_array($sql);
                        $data = $row;
                    ?>
                    <div class="col-lg-8">
                        <div class="single-service-img">
                            <img src="
                            images/services/<?php echo md5($data['id']) ?>.<?php echo $data['image'] ?>"
                                style="height: 470px; width: 690px;" />
                        </div>
                        <div class="service-content">
                            <h2><?php echo $data['name']; ?></h2>

                            <div class="text-block mrb-40">
                                <?php echo $data['description']; ?>
                            </div>

                        </div>
                        <div id="call-to-action" class="call-to-action-bg service-call-to-action ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 align-self-center">
                                        <h3 class="call-to-action-title service-call-to-action">Get in touch with Us
                                        </h3>
                                        <p>
                                            We would love to hear from you, tell us little bit about your project
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a class="btn btn-box" href="contact">Contact Us</a>
                                    </div>
                                </div>
                            </div>
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


        <!-- Template custom-->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
    <!--Body Inner end-->
</body>

</html>