<?php
include ("includes/config.php");
$page='faq';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>Minagrico - FAQs</title>
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
    <!-- Morris -->
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

        <div class="banner-area" id="banner-area" style="background-image:url(images/faq.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="banner-heading">
                            <h1 class="banner-title">FAQs</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">FAQs</a></li>
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
                    <div class="col-lg-8">
                        <div class="accordion-title">
                            <h3 class="column-title"><span>Our FAQs</span> Frequently Asked Questions</h3>
                        </div>
                        <div id="accordion" class="accordion-area">
                            <?php
	                        $sql=mysqli_query($con,"SELECT * FROM faqs where status='1'order by id desc ");
	                        while($row=mysqli_fetch_array($sql)){
	                        ?>
                            <div class="card">
                                <div class="card-header" id="headingOne<?php echo $row["id"]?>">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapseOne<?php echo $row["id"]?>" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <?php echo $row["question"]?>
                                        </a>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne<?php echo $row["id"]?>"
                                    aria-labelledby="headingOne<?php echo $row["id"]?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php echo $row["answer"]?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Accordion end -->
                    </div>
                    <!-- col end-->
                    <div class="col-lg-4">
                        <div class="help-box text-center">
                            <div class="help mrb-40 ">
                                <h2 class="column-title title-white">Want to Know More?</h2>
                                <a class="btn btn-primary" href="contact.php">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Row end-->
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